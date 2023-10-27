<script>console.log("TESTE2")</script>

<?php
include("connection.php");
session_start();

$receiveUserID = $_SESSION['userID'];
$requestPage = $_POST["requestPage"];
$receiveSecond = $_POST["receiveSecond"];
$receiveThird = $_POST["receiveThird"];

if ($requestPage == "mainPanel" || $requestPage == "userPanel" ) {
    $sql = "INSERT INTO discussions (user_id, discussion, game) values ('$receiveUserID', '$receiveSecond', '$receiveThird')";
} else if ($requestPage == "discussionPanel") {
    $sql = "INSERT INTO comments (user_id, discussion_id, comment) values ('$receiveUserID', '$receiveSecond', '$receiveThird')";
}

$result = $con->query($sql);
$con->close();

include($requestPage . ".php");