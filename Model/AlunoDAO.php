<?php

   class AlunoDAO {
      private $conexao;
      private $aluno;

      public function __construct($paluno=null) {
          // questão de otimização, chama-se os arquivos no construtor
          require_once 'Conexao.php';
          require_once 'Aluno.php';

          // objeto aluno ao atributo aluno
          $this->aluno = $paluno;

          // Abrindo conexão com o SGBD
          $con = new Conexao();
          $this->conexao = $con->getConexao();

      }

      public function insere() {
            try {
                $this->conexao->beginTransaction();

                $sql = "INSERT INTO aluno (NOME, IDADE, BOLSISTA, FORMACAO) VALUES (?,?,?,?)";

                $cmd = $this->conexao->prepare($sql);

                $cmd->execute([$this->aluno->getNome(), $this->aluno->getIdade(), $this->aluno->isBolsista(), $this->aluno->getFormacao()]);

                $this->conexao->commit();

                return true;
            } catch (Exception $ex) {
                $this->getErro($ex, $this->conexao);
            }
      }

      public function atualiza() {
        try {

            $sql = "UPDATE aluno SET NOME = ?, IDADE = ?, BOLSISTA=?, FORMACAO=? WHERE COD_ALUNO = ?";

            $this->conexao->beginTransaction();
            
            $cmd = $this->conexao->prepare($sql);

            $cmd->execute([$this->aluno->getNome(), $this->aluno->getIdade(), $this->aluno->isBolsista(), $this->aluno->getFormacao(), $this->aluno->getCod_aluno()]);

            $this->conexao->commit();

            return true;

        } catch (Exception $ex) {
             $this->getErro($ex, $this->conexao);
        }
      }

      public function apagar() {
        try {

            $sql = "DELETE FROM aluno WHERE COD_ALUNO = ?";

            $this->conexao->beginTransaction();
            
            $cmd = $this->conexao->prepare($sql);

            $cmd->execute([$this->aluno->getCod_aluno()]);

            $this->conexao->commit();

            return true;

        } catch (Exception $ex) {
             $this->getErro($ex, $this->conexao);
        }
      }

      public function listar() {
        try {
            $sql = <<<SQL
              SELECT COD_ALUNO AS CODIGO,
                     NOME,
                     IDADE,
                     BOLSISTA,
                     FORMACAO
              FROM aluno 
SQL;

            //$cmd = $this->conexao->prepare($sql);

            $cmd = $this->conexao->query($sql);

            $registros= $cmd->fetchAll();

            $html = <<<HTML
            <div class="containerList">
                <h1>Lista de registros no Banco de Dados</h1>
                <div class="row offset-2 firstRowList">
                    <div class="col-sm-1 col-md-1 col-lg-1" >
                        Código
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3" >
                        Nome
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" >
                       Idade
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1" >
                       Bolsista
                    </div>   
                    <div class="col-sm-2 col-md-2 col-lg-2" >
                       Formação
                    </div>   
                    <div class="col-sm-2 col-md-2 col-lg-2" >
                       Ações
                    </div>   
                </div>
HTML;

            //print_r($registros);
            foreach ($registros as $linha) {
                $html .= <<<HTML
                <div class="row offset-2 listRow">
                    <div class="col-sm-1 col-md-1 col-lg-1" >
                        {$linha['CODIGO']}
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3" >
                        {$linha['NOME']}
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1" >
                        {$linha['IDADE']}
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" >
                        {$linha['BOLSISTA']}
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1" >
                        {$linha['FORMACAO']}
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 buttonList" >
                        <form action="../View/loginU.php" method="post" name="form_u">
                            <input type="hidden" name="txtCodigo" value="{$linha['CODIGO']}" />
                            <input type="hidden" name="txtNome" value="{$linha['NOME']}" />
                            <input type="hidden" name="txtIdade" value="{$linha['IDADE']}" />
                            <input type="hidden" name="chkBolsista" value="{$linha['BOLSISTA']}" />
                            <input type="hidden" name="rdFormacao" value="{$linha['FORMACAO']}" />
                            <button type="submit" name="btnAtualiza" class="btn btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </form>
                       <form action="../Controller/cAluno.php" method="post" name="form_d">
                            <input type="hidden" name="txtCodigo" value="{$linha['CODIGO']}" />
                            
                            <button type="submit" name="btnApaga" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </button>
                        </form>
                    </div>   
                </div>
HTML;
            }
                $html .= <<<HTML
                        </div>
HTML;
            echo $html;

            
            
        } catch (Exception $ex) {
            $this->getErro($ex, $this->conexao, true);
        }
      }

      private function getErro($pex, $pcon, $listar = false) {
          echo "ERRO: " . $pex->getMessage();

          $pcon->rollback();

          return (($lista == true)? null: false);

      }
   }
?>