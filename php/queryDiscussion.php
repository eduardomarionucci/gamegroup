<?php
include("connection.php");
session_start();

$receiveUsername = $_SESSION['usernameID'];
$receiveMessage = $_POST["receiveMessage"];
$receiveGame = $_POST["receiveGame"];

$sql = "INSERT INTO discussions (username, discussion, game) values (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $receiveUsername, $receiveMessage, $receiveGame);
$stmt->execute();   
$stmt->close();
$con->close();

include("mainPanel.php");
?>