<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCADO</title>

    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="funcoes_lista.js"></script>
    <script type="text/javascript">
console.log("inicio");
var arq_lista_original = "/dados/HTML/Lista/lista_completa.txt";
var lista_linhas = [];

$(document).ready(function() {

    //displayContents("lista_original","<br><b>LISTA COMPLETA</b><br><br>");
    //displayContents("lista_final","<h2>LISTA FINAL</h2>");
    FazerCopiaLista();

});
    </script>
    <style>
        #lista_original { 
            overflow:auto; 
            overflow-y: scroll;
        }
        body {
            background-color: antiquewhite;
        }
        .fundoesquerdo {
            background-color: beige;
        }
        .fundodireito {
            background-color: darkgoldenrod;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
        <a class="navbar-brand mx-4" href="#">MERCADO</a>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">.</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-7 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 fundoesquerdo">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Para Marcar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="lista_original">
                                <form class="form form-inline" action=""> 
                                    <h2>LISTA COMPLETA</h2>
<?php
    $cont = 0;

    // Open your file in read mode
    $input = fopen("./lista_completa.txt", "r");

    // Display a line of the file until the end 
    if ($input) {
        while(!feof($input)) {
            $cont++;
            $linha = fgets($input);

            $id_opcao = "opcao".$cont;
            $pos1 = strpos($linha,"=");
            $texto_item = substr($linha,0,$pos1); //substr(string,start,length) 
            $texto_quant = substr($linha,$pos1+2);
            $checked = "";
            $bgcolor = "";
            if ($pos1>0) {
                if (substr($texto_item,0,1) == "*") {
                    $texto_item = substr($texto_item,1);
                    $checked = ' checked="true" observ="'.$texto_item.'"';
                }
                $linha2 = $texto_item."= ";
            } else {
                $linha2 = $linha;
            }
            
            if ($pos1>0) {
                // Display option
                $linha3 = '<input class="checkbox" type="checkbox" id="'.$id_opcao.'" name="lista" value="'.$texto_item.'" '.$checked.'onchange="FazerCopiaLista()"><label for="'.$id_opcao.'">&nbsp&nbsp</label>';
                // Display input
                $linha3 = $linha3.'<input class="small" type="text" id="'.$id_opcao.'inputA" name="'.$id_opcao.'inputA" value="'.$texto_item.'" size="25" onchange="FazerCopiaLista()">';
                $linha3 = $linha3.' = ';
                $linha3 = $linha3.'<input class="small" type="text" id="'.$id_opcao.'inputB" name="'.$id_opcao.'inputB" value="'.$texto_quant.'" size="25" onchange="FazerCopiaLista()">';
            } else {
                $linha3 = '<label>'.$linha2.'</label>';
            }
            echo $linha3."<br>";
        }
    }
?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 fundodireito">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <button class="btn btn-primary" onclick="Copiar()">CLIQUE AQUI PARA COPIAR</button>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <div><h2>LISTA FINAL</h2></div>
                                <div id="lista_final">...</div>
                            </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>
        <!-- form class="form" action="">    
            <div class="col-6" id="lista_original">
         

        </div>
    </form>

    <div class="col-6" id="lista_final"></div -->
</div>
</body>
</html>
