<?php

   class Aluno {
       private $cod_aluno;
       private $nome;
       private $idade;
       private $bolsista;
       private $formacao;

       public function __construct($pnome="", $pidade=0, $pbolsista=false, $pformacao="", $pcodigo=0,) {
          $this->cod_aluno = $pcodigo;
          $this->nome = $pnome;
          $this->idade = $pidade;
          $this->bolsista = $pbolsista;
          $this->formacao = $pformacao;
       }

       public function setCod_aluno($pcodigo) {
          $this->cod_aluno = $pcodigo;
       }

       public function getCod_aluno() {
          return $this->cod_aluno;
       }

       public function setNome($pnome) {
        $this->nome = $pnome;
       }

       public function getNome() {
        return $this->nome;
       }

       public function setIdade($pidade) {
        $this->idade = $pidade;
       }

       public function getIdade() {
         return $this->idade;
       }
 
       public function setBolsista($pbolsista) {
        $this->bolsista = $pbolsista;
       }

       public function isBolsista() {
         return $this->bolsista;
       }

       public function setFormacao($pformacao) {
         $this->formacao = $pformacao;
      }

      public function getFormacao() {
         return $this->formacao;
      }
   }
?>