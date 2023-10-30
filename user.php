<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}

include("./php/connection.php");

$_SESSION['currentUser'] = $_GET["userNOW"];
$sql = "SELECT id FROM users WHERE username = '" . $_SESSION['currentUser'] . "'";
$result = $con->query($sql);
$linha = $result->fetch_object();
$_SESSION['currentUserID'] = $linha->id;
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
    <title>Página de Usuário</title>
</head>

<body>
    
    <?php include("./php/naviBar.php"); ?>

    <div id="userPanel" class="panel">
        <?php include("./php/userPanel.php"); ?>
    </div>
</body>

<script>
    var requestPage = "userPanel";
    var receiveSecond = document.getElementById("receiveSecond").value;
</script>
<script src="./script.js"></script>

</html>