<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'gamegroup');

//VARIAVEL PARA GUARDAR A EXECUÇÃO DA CONEXÃO
$con = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não Conectou');
mysqli_set_charset($con, "utf8");;

?>