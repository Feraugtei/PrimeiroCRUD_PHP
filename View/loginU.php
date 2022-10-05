<?php
  require_once 'interface.php'; // importação das funções

  getCabec("Aula PHP", "./css/estilo.css"); //cabecalho
  getCorpo(); // container do corpo
  getForm(true, "Aluno", "../Controller/cAluno.php"); //abertura do formulario
  getLinha(true);
  getTextBox("txtCodigo", "Código", 5);
  getLinha(false);
  getLinha(true);
  getMultiTextBox("txtNome", "Nome", 5);
  getNumberBox("txtIdade", "Idade", 1, 100, 4);
  getLinha(false);
  getLinha(true);
  getMultiRadio("Formação", "rdFormacao", "Fundamental", "Médio", "Superior",  5);
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
  
  getLinha(false);
  getFim(); // fechamento da página
?>