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
    <title>Pesquisa por Usuários</title>
</head>

<body>
    <?php include("./php/naviBar.php");

    $receiveUser = $_GET['receiveUser'];

    echo '<div class="panel">';

    $sql = "SELECT * FROM users WHERE username LIKE '%$receiveUser%' ORDER BY username ASC";
    $result = $con->query($sql);
    while ($linha = $result->fetch_object()) {

        echo '<div class="discussionBox">';
        echo '<div class="discussion-upper">';

        echo '<form class="formBox" action="user.php" method="get">';
        echo '<button type="submit" class="token-icon">';
        echo '<img style="margin-right:10px" src=https://ui-avatars.com/api/?bold=0&background=3e0c5e&color=FFFFFF&name=' . $linha->username . '>';
        echo '</button>';
        echo '<input type="hidden" name="userNOW" value="' . $linha->username . '">';
        echo '</form>';

        echo '<p class="token-search" style="color:black">' . $linha->username . '</p>';

        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</body>

<!-- <script>
    var requestPage = "mainPanel";
    var receiveSecond;
    // var receiveSecond = document.getElementById("receiveSecond").value;
</script>
<script src="./script.js"></script> -->

</html>