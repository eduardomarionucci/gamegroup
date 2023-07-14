<?php 
    $servidor_bd = "localhost";
    $usuario_bd = "root";
    $senha_bd = "";
    $bd = "gamegroup";

    $con = new mysqli($servidor_bd,
                      $usuario_bd,
                      $senha_bd,
                      $bd);
    
    if($con == false){
        die("Erro na conexão com o banco de dados");
    }

?>