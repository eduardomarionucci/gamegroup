<?php
    include("connection.php");

    session_start();

    $receiveUsername = $_SESSION['usernameID'];
    $receiveDiscussion = $_POST["receiveDiscussion"];
    $receiveMessage = $_POST["receiveMessage"];

    /*
    $sql = "INSERT INTO comments (username, comment, discussion) values ('$receiveUsername', '$receiveMessage', '$receiveDiscussion')";
    $result = $con->query($sql);
    $con->close(); 
    */

    $sql = "INSERT INTO comments (username, comment, discussion) values (?, ?, ?)";
    $stmt = $con->prepare($sql);

    $cleanedMessage = strip_tags($receiveMessage);

    $stmt->bind_param("sss", $receiveUsername, $cleanedMessage, $receiveDiscussion);
    $stmt->execute();
    $stmt->close();
    $con->close();

    include("discussionPanel.php");
?>