<?php
include("connection.php");

session_start();

$receiveUsername = $_SESSION["username"];
$receiveMessage = $_POST["receiveMessage"];
$receiveGame = $_POST["receiveGame"];

$sql = "INSERT INTO comments (username, comment, game) values ('$receiveUsername', '$receiveMessage', '$receiveGame')";
$result = $con->query($sql);



?>