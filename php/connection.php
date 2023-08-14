<?php
$HOST = "localhost";
$USUARIO = "root";
$SENHA = "";
$BD = "gamegroup";

//VARIAVEL PARA GUARDAR A EXECUÇÃO DA CONEXÃO
$conn = mysqli_connect($HOST, $USUARIO, $SENHA, $BD) or die('Não Conectou');
mysqli_set_charset($conn, "utf8");

?>