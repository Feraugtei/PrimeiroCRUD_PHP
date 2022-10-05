<?php

   class Conexao {
      private $servidor = "localhost";
      private $banco = "controle_alunos";
      private $usuario = "root";
      private $senha = "";

      public function __construct() {

      }

      public function setServidor($ps) {
         $this->servidor = $ps;
      }

      public function getServidor() {
        return $this->servidor;
      }

      public function setBanco($pb) {
        $this->banco = $pb;
      }

      public function getBanco() {
        return $this->banco;
      }

      public function setUsuario($pu) {
        $this->usuario = $pu;
      }

     public function getUsuario() {
       return $this->usuario;
     }

     public function setSenha($ps) {
        $this->senha = $ps;
      }

     public function getSenha() {
       return $this->senha;
     }

  

      public function getConexao() {
          $db = new PDO("mysql:host=" . $this->getServidor() . ";dbname=" . $this->getBanco(), $this->getUsuario(), $this->getSenha());

          return $db;

      }

   }


?>