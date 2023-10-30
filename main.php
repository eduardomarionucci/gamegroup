<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}

include("php/connection.php");

// $sql = "SELECT icon FROM users WHERE id = '" . $_SESSION["userID"] . "'";
// $result = $con->query($sql);
// $linha = $result->fetch_object();

// $_SESSION['userICON'] = $linha->icon;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/casa.png" type="image/png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./master.css">
    <link rel="stylesheet" href="./style.css">
    <title>Página Principal</title>
</head>

<body>
    <?php include("./php/naviBar.php"); ?>

    <div id="mainPanel" class="panel">
        <?php include("./php/mainPanel.php"); ?>
    </div>
</body>

<script>
    var requestPage = "mainPanel";
    var receiveSecond;
    // var receiveSecond = document.getElementById("receiveSecond").value;
</script>
<script src="./script.js"></script>

</html>