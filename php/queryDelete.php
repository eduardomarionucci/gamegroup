<?php

?><script>console.log("chega aqui")</script><?php
include("connection.php");
session_start();

$requestPage = $_POST["requestPage"];
$requestId = $_POST["requestId"];
// $pageRequired = $_POST["pageRequired"];
$requestRequired = $_POST["requestRequired"];

if ($requestRequired == "discussion") {

    $sql = "SELECT * FROM discussions WHERE id = '$requestId'";
    $result = $con->query($sql);
    $linha = $result->fetch_object();

    
    if ($linha->user_id == $_SESSION['userID']) {

        $sql = "SELECT * FROM comments WHERE discussion_id = '$requestId'";
        $result = $con->query($sql);
        while ($linha = $result->fetch_object()) {

            $sql2 = "DELETE FROM relevance WHERE comment_id = '$linha->id'";
            $con->query($sql2);
        }

        $sql = "DELETE FROM comments WHERE discussion_id = '$requestId'";
        $con->query($sql);

        $sql = "DELETE FROM relevance WHERE discussion_id = '$requestId'";
        $con->query($sql);

        $sql = "DELETE FROM discussions WHERE id = '$requestId'";
        $con->query($sql);
    }
} else if ($requestRequired == "comment") {

    $sql = "SELECT * FROM comments WHERE id = '$requestId'";
    $result = $con->query($sql);
    $linha = $result->fetch_object();

    if ($linha->user_id == $_SESSION['userID']) {

    $sql = "DELETE FROM relevance WHERE comment_id = '$requestId'";
    $con->query($sql);

    $sql = "DELETE FROM comments WHERE id = '$requestId'";
    $con->query($sql);
    }
}
$con->close();

include($requestPage . ".php");