<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./master.css">
    <title>Página de Discussão</title>
</head>

<body>

    <nav>
        <a href="./main.php">
            <button class="logo">GG</button>
        </a>

        <div class="links">
            <div class="nav-message">Bem-vindo ao GameGroup</div>
        </div>

        <a href="./php/logout.php">
            <button class="red-button"> Sair</button>
        </a>
    </nav>

    <div id="discussionPanel" class="panel">
        <?php include("./php/discussionPanel.php"); ?>
    </div>

</body>

<script>
    function sendComment() {
        var receiveUser = <?= json_encode($_SESSION["username"]); ?>;
        var receiveDiscussion = <?= json_encode($_SESSION['discussionID']); ?>;
        var receiveMessage = document.getElementById("receiveMessage").value;

        $.post("./php/queryComment.php", {
            receiveUser: receiveUser,
            receiveDiscussion: receiveDiscussion,
            receiveMessage: receiveMessage,
        }, function(x) {
            $("#discussionPanel").html(x);
        }); // fechando o post
    }

    function sendRelevance(id, operation, requestRequired) {

        $.post("./php/queryRelevance.php", {
            requestId: id,
            requestOperation: operation,
            pageRequired: "discussion",
            requestRequired: requestRequired //main ou discussion
        }, function(x) {
            $("#discussionPanel").html(x);
        }); // fechando o post
    }

    function sendDelete(id, requestRequired) {

        console.log("Chegou aqui")

        $.post("./php/queryDelete.php", {
            requestId: id,
            pageRequired: "discussion",
            requestRequired: requestRequired
        }, function(x) {
            $("#discussionPanel").html(x);
        }); // fechando o post
    }
</script>

</html>