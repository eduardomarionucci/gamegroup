<?php
include("connection.php");
session_start();

$receiveUsername = $_SESSION['usernameID'];
$receiveMessage = $_POST["receiveMessage"];
$receiveGame = $_POST["receiveGame"];

$sql = "INSERT INTO discussions (username, discussion, game) values ('$receiveUsername', '$receiveMessage', '$receiveGame')";
$result = $con->query($sql);
$con->close();

include("mainPanel.php");
?>