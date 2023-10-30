<?php
include("connection.php");

echo '<div id="banner" class="banner">
        <div class="in-banner">
            <div class="perfil-in-banner" >';

if ($_SESSION['currentUser'] == $_SESSION['username']) {

    echo '<img src=https://ui-avatars.com/api/?bold=0&background=3e0c5e&color=FFFFFF&name=' . $_SESSION['username'] . '>
            </div>
        </div>
    </div>';

    $_SESSION['requirement'] = 'mainPanel';
    include('queryMediate.php');
} else {
    $sql = "SELECT icon FROM users WHERE username = '" . $_SESSION['currentUser'] . "'";
    $result = $con->query($sql);
    $linha = $result->fetch_object();
    echo '<img src=https://ui-avatars.com/api/?bold=0&background=3e0c5e&color=FFFFFF&name=' . $linha->username . '>
            </div>
        </div>
    </div>';
}
$_SESSION['requirement'] = "userPanel";
include("queryDiscussion.php");

$con->close();
