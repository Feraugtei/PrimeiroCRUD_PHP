<?php

   require_once '../Model/Aluno.php';
   require_once '../Model/AlunoDAO.php';

   if (isset($_POST['btnInsere'])) {
      $dao = new AlunoDAO(new Aluno($_POST['txtNome'], $_POST['txtIdade'], (isset($_POST['chkBolsista']) == true ? true : false), $_POST['rdFormacao']));

      if ($dao->insere()) {
        header("Location:../View/login.php");
      } else {
        echo "Erro ao inserir Aluno !";
      }
   } else if (isset($_POST['btnAtualiza'])) {
        $dao = new AlunoDAO(new Aluno($_POST['txtNome'], $_POST['txtIdade'], (isset($_POST['chkBolsista']) == true ? true : false), $_POST['rdFormacao'], $_POST['txtCodigo']));

        if ($dao->atualiza()) {
            //echo "Aluno atualizado com sucesso !";
            header("Location:../View/login.php");
        } else {
            echo "Erro ao atualizar Aluno !";
        }
   } else if (isset($_POST['btnApaga'])) {
        $dao = new AlunoDAO(new Aluno($_POST['txtNome'], $_POST['txtIdade'], (isset($_POST['chkBolsista']) == true ? true : false), $_POST['rdFormacao'], $_POST['txtCodigo']));

        if ($dao->apagar()) {
            //echo "Aluno excluido com sucesso !";
            header("Location:../View/login.php");
        } else {
            echo "Erro ao excluir Aluno !";
        }
   }

?>