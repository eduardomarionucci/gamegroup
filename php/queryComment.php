<?php
include("connection.php");

session_start();

$receiveUsername = $_SESSION['usernameID'];
$receiveDiscussion = $_POST["receiveDiscussion"];
$receiveMessage = $_POST["receiveMessage"];

$sql = "INSERT INTO comments (username, comment, discussion) values ('$receiveUsername', '$receiveMessage', '$receiveDiscussion')";
$result = $con->query($sql);
$con->close();

include("discussionPanel.php");
?>