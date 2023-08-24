<?php
include("connection.php");
session_start();

$sql = "SELECT id FROM users WHERE username = " . "'" . $_SESSION["username"] . "'";
$result = $con->query($sql);
$linha = $result->fetch_object();

$receiveUsername = $linha->id;
$receiveMessage = $_POST["receiveMessage"];
$receiveGame = $_POST["receiveGame"];

$sql = "INSERT INTO discussions (username, discussion, game) values ('$receiveUsername', '$receiveMessage', '$receiveGame')";
$result = $con->query($sql);
$con->close();

include("mainPanel.php");
?>