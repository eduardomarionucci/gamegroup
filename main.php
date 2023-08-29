<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}

include("php/connection.php");

$sql = "SELECT id FROM users WHERE username = '" . $_SESSION["username"] . "'";
$result = $con->query($sql);
$linha = $result->fetch_object();

$_SESSION['usernameID'] = $linha->id;
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
    <title>Página principal</title>
</head>

<body>

    <header>
        <a class="logo" href="./main.php">GAMEGROUP</a>
        <a class="nav-button" href="php/logout.php">Sair</a>
        <p class="menu login">Menu</p>
    </header>

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
        }, function(x) {
            $("#mainPanel").html(x);
        }); // fechando o post
    }

    function sendRelevance(id, operation, requestRequired) {

        $.post("./php/queryRelevance.php", {
            requestId: id,
            requestOperation: operation,
            pageRequired: "main",
            requestRequired: requestRequired
        }, function(x) {
            $("#mainPanel").html(x);
        }); // fechando o post
    }

    function sendDelete(id, requestRequired) {

        $.post("./php/queryDelete.php", {
            requestId: id,
            pageRequired: "main",
            requestRequired: requestRequired
        }, function(x) {
            $("#mainPanel").html(x);
        }); // fechando o post
    }
</script>

</html>