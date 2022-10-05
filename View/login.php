<?php
  require_once 'interface.php'; // importação das funções
  require_once '../Model/AlunoDAO.php';
  getCabec("Aula PHP", "./css/estilo.css"); //cabecalho
  getCorpo(); // container do corpo
  getForm(true, "Aluno", "../Controller/cAluno.php"); //abertura do formulario
  getLinha(true);
  getTextBox("txtCodigo", "Código", "number", 5);
  getLinha(false);
  getLinha(true);
  getTextBox("txtNome", "Nome", "text", 5);
  getTextBox("txtIdade", "Idade", "number", 4);
  getLinha(false);
  getLinha(true);
  getRadio("Formação", "rdFormacao", "Fundamental", "Médio", "Superior",  5);
  getCheckbox("chkBolsista", "Bolsista", 2);
  getLinha(false);
  $botoes = array(1=> array('NOME' => "btnInsere",
                            'DESCRICAO' => "Inserir"),
                  2=> array('NOME' => "btnAtualiza",
                            'DESCRICAO' => "Atualizar"),
                  3=> array('NOME' => "btnApaga",
                            'DESCRICAO' => "Apagar"));

  getButton($botoes); // area de botoes
  getForm(false); // fechamento do formulario
  getLinha(false);
  $dao = new AlunoDAO();
  $dao->listar();
  getLinha(false);
  getFim(); // fechamento da página
?>