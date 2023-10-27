<?php
include("connection.php");
session_start();

$requestPage = $_POST["requestPage"];
$requestId = $_POST["requestId"];
$receiveUsername = $_SESSION['userID'];

$requestOperation = $_POST["requestOperation"];
// $pageRequired = $_POST["pageRequired"];
$requestRequired = $_POST["requestRequired"];


$sql = "SELECT * FROM relevance WHERE user_id = '$receiveUsername' AND $requestRequired = '$requestId'";
$result = $con->query($sql);
$linha = $result->fetch_object();

if ($linha != null) {

    switch ($requestOperation) {
        case "up":

            if ($linha->situation == 0) {
                $sql = "UPDATE relevance SET situation = '1' WHERE id = '$linha->id'";
                $con->query($sql);
            } else {
                $sql = "DELETE FROM relevance WHERE id = '$linha->id'";
                $con->query($sql);
            }
            break;

        case "down":
            if ($linha->situation == 1) {
                $sql = "UPDATE relevance SET situation = '0' WHERE id = '$linha->id'";
                $con->query($sql);
            } else {
                $sql = "DELETE FROM relevance WHERE id = '$linha->id'";
                $con->query($sql);
            }
            break;
    }
} else {
    switch ($requestOperation) {
        case "up":

            $sql = "INSERT INTO relevance (user_id, $requestRequired, situation) VALUES ('$receiveUsername', '$requestId', '1')";
            $con->query($sql);
            break;

        case "down":

            $sql = "INSERT INTO relevance (user_id, $requestRequired, situation) VALUES ('$receiveUsername', '$requestId', '0')";
            $con->query($sql);
            break;
    }
}

$con->close();
include($requestPage . ".php");