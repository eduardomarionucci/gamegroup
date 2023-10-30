<?php
include("connection.php");

echo 
'<div id="banner" class="banner">
    <div class="in-banner">
        <div class="perfil-in-banner">
            <img src=https://ui-avatars.com/api/?bold=0&background=3e0c5e&color=FFFFFF&name=' . $_GET['userNOW'] . '>
        </div>
        <h2>' . $_GET['userNOW'] .'</h2>
    </div>
</div>';
$_SESSION['requirement'] = "userPanel";
include("queryDiscussion.php");

$con->close();
