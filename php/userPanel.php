<?php
include("connection.php");

echo '<div id="banner" class="banner">
        <div class="in-banner">
            <div class="perfil-in-banner" >';

if ($_SESSION['currentUser'] == $_SESSION['username']) {

    echo '<img src=assets/perfil-icons/' . $_SESSION["userICON"] . '>
            </div>
        </div>
    </div>';

    $_SESSION['requirement'] = 'mainPanel'; include('queryMediate.php');
} else {
    $sql = "SELECT icon FROM users WHERE username = '" . $_SESSION['currentUser'] . "'";
    $result = $con->query($sql);
    $linha = $result->fetch_object();
    echo '<img src=assets/perfil-icons/' . $linha->icon . '>
            </div>
        </div>
    </div>';
}
$_SESSION['requirement'] = "userPanel"; 
include("queryDiscussion.php");

$con->close();
