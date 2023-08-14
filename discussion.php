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
    <link rel="stylesheet" href="./master.css">
    <title>Página de Discussão</title>
</head>
<body>
    
<div id="discussionPanel" class="panel">
    <?php include("./php/discussionPanel.php");?>
</div>

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
</script>

</body>
</html>