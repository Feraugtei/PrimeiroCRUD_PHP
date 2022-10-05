<?php
function getCabec($titulo, $css) {
    echo <<<HTML
       <html>
         <head>
            <title> $titulo </title>
            
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

            <link rel="stylesheet" type="text/css" href="$css" />
        </head>
        <body>

HTML;

}

function getCorpo() {
    echo <<<HTML
       <main>
          <div class="row">
             <div class='col-sm-12 col-md-12 col-lg-12 corpo'>            
HTML;
}

function getForm($inicio=true, $titulo="", $acao="") {
    $html = <<<HTML
               <br>
               <div class='row col-sm-5 col-md-5 col-lg-5 caixa' >
               <div class='titulo'>
                  $titulo
               </div>
                 <hr>
HTML;

    if ($inicio) {
       $html .= <<<HTML
         <form action="$acao" method="post">
HTML;
    } else {
        $html = "</form></div>";
    } 

    echo $html;

}

function getLinha($inicio) {
   $html = ($inicio==true ? "<div class='row'>" : "</div><br>");
   echo $html;
}

function getTextBox($nome, $descricao, $tipo, $tamanho) {
   echo <<<HTML
     <div class="row col-sm-$tamanho col-md-$tamanho col-lg-$tamanho offset-1">
        $descricao
        <br>
        <input type="$tipo" name="$nome" />
     </div>
     <br>
HTML;
}

function getRadio($descricao, $formacao, $radio1, $radio2, $radio3, $tamanho) {
   echo <<<HTML
      <div class="col-sm-$tamanho col-md-$tamanho col-lg-$tamanho offset-1">
         $descricao
         <br>
         <fieldset class='radioArea'>
            <div>
               <input type="radio" name="$formacao" value="F"><span>$radio1</span>
            </div>
            <div>
               <input type="radio" name="$formacao" value="M"><span>$radio2</span>
            </div>
            <div>
               <input type="radio" name="$formacao" value="S"><span>$radio3</span>
            </div>
         </fieldset>
      </div>
HTML;
}

function getCheckbox($nome, $descricao, $tamanho) {
   echo <<<HTML
     <div class="col-sm-$tamanho col-md-$tamanho col-lg-$tamanho checkbox">
        <input type="checkbox" name="$nome" /><span>$descricao</span>
HTML;
}

function getButton($botoes) {
   $html = <<<HTML
       <div class="row text-center containerButton">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
HTML;

    foreach ($botoes as $idx=>$botao) {
        $html .= <<<HTML
            <button class="btn btn-success" type="submit" name= "{$botao['NOME']}"> {$botao['DESCRICAO']} </button>
HTML;
    }

    $html .= <<<HTML
            <button class="btn btn-secondary" type="reset" >Limpar</button>
        </div>
       </div>
HTML;

    echo $html;
}

function getFim() {
    echo <<<HTML
        </main>
     </body>
    </html>
HTML;
} 
?>


