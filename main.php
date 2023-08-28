<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/casa.png" type="image/png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./master.css">
    <title>Página principal</title>
</head>

<body>

    <nav>
        <button class="logo" href="./main.php">GG</button>
        <div class="links">
            <div class="nav-message">Bem-vindo ao GameGroup</div>

        </div>
        <a href="./php/logout.php">
            <button class="red-button"> Sair</button>
        </a>
    </nav>

    <div id="mainPanel" class="panel">
        <?php include("./php/mainPanel.php"); ?>
    </div>

</body>

<script>
    function sendDiscussion() {
        var receiveUser = <?= json_encode($_SESSION["username"]); ?>;
        var receiveMessage = document.getElementById("receiveMessage").value;
        var receiveGame = document.getElementById("receiveGame").value;

        $.post("./php/queryDiscussion.php", {
            receiveUser: receiveUser,
            receiveMessage: receiveMessage,
            receiveGame: receiveGame
        }, function (x) {
            $("#mainPanel").html(x);
        }); // fechando o post
    }
</script>

</html>