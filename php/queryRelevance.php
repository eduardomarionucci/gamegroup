<?php
include("connection.php");
session_start();

$receiveUsername = $_SESSION['usernameID'];
$requestId = $_POST["requestId"];
$requestOperation = $_POST["requestOperation"];
$pageRequired = $_POST["pageRequired"];
$requestRequired = $_POST["requestRequired"];


$sql = "SELECT * FROM relevance WHERE username_id = '$receiveUsername' AND $requestRequired = '$requestId'";
$result = $con->query($sql);
$linha = $result->fetch_object();

if ($linha != null) {

    switch ($requestOperation) {
        case "up":

            if ($linha->situation == 0) {
                $sql = "UPDATE relevance SET situation = '1' WHERE relevance_id = '$linha->relevance_id'";
                $con->query($sql);
            } else {
                $sql = "DELETE FROM relevance WHERE relevance_id = '$linha->relevance_id'";
                $con->query($sql);
            }
            break;

        case "down":
            if ($linha->situation == 1) {
                $sql = "UPDATE relevance SET situation = '0' WHERE relevance_id = '$linha->relevance_id'";
                $con->query($sql);
            } else {
                $sql = "DELETE FROM relevance WHERE relevance_id = '$linha->relevance_id'";
                $con->query($sql);
            }
            break;
    }
} else {
    switch ($requestOperation) {
        case "up":

            $sql = "INSERT INTO relevance (username_id, $requestRequired, situation) VALUES ('$receiveUsername', '$requestId', '1')";
            $con->query($sql);
            break;

        case "down":

            $sql = "INSERT INTO relevance (username_id, $requestRequired, situation) VALUES ('$receiveUsername', '$requestId', '0')";
            $con->query($sql);
            break;
    }
}

$con->close();
include($pageRequired . "Panel.php");