<?php
    $host = "Localhost";
    $user = "root";
    $Pass = "";
    $banco = "hardware";

   if ($conexao = mysqli_connect($host,$user,$Pass,$banco)) {
     //echo "Conectado";
   } //else 
     //   echo "Erro";
    
    function mensagem($texto, $tipo) {
        echo"<div class='alert alert-$texto' role='alert'>
                $texto
            </div>";
    }


