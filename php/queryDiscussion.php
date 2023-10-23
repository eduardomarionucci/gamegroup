<?php
    include("connection.php");
    session_start();

    $receiveUsername = $_SESSION['usernameID'];
    $receiveMessage = $_POST["receiveMessage"];
    $receiveGame = $_POST["receiveGame"];

    /*
    $sql = "INSERT INTO discussions (username, discussion, game) values ('$receiveUsername', '$receiveMessage', '$receiveGame')";
    $result = $con->query($sql);
    $con->close();
    */

    $sql = "INSERT INTO discussions (username, discussion, game) values (?, ?, ?)";
    $stmt = $con->prepare($sql);

    $cleanedMessage = strip_tags($receiveMessage);

    $stmt->bind_param("sss", $receiveUsername, $cleanedMessage, $receiveGame);
    $stmt->execute();   
    $stmt->close();
    $con->close();

    include("mainPanel.php");
?>