<?php
include("connection.php");

if (isset($_GET) && !empty($_GET)) {
    $_SESSION['discussionID'] = $_GET["discussionID"];
    $_SESSION['discussionUSER'] = $_GET["discussionUSER"];
    $_SESSION['discussionMSG'] = $_GET["discussionMSG"];
    $_SESSION['discussionGAME'] = $_GET["discussionGAME"];
}

echo 'Logado como ' . $_SESSION["username"] . '!</p>';

echo $_SESSION['discussionUSER'] . " inciou uma discussão acerca de " . $_SESSION['discussionGAME'];
echo '<textarea class="messageLarge" placeholder="' . $_SESSION['discussionMSG'] . '" readonly></textarea>';
echo '<textarea id="receiveMessage" class="message" placeholder="Tema da discussão..."></textarea>';
echo '<button type="submit" onClick="sendComment()" class="display">Comentar </button>';
echo "Últimos comentários: ";

$discussion = $_SESSION['discussionID'];
$sql = "SELECT * FROM comments WHERE discussion = '$discussion' ORDER BY id DESC";
$result = $conn->query($sql);
while ($linha = $result->fetch_object()) {

    echo '<div class="commentBox">';

    echo $linha->username . " comentou: ";
    echo '<textarea class="message" placeholder="' . $linha->comment . '" readonly></textarea>';
    echo '<input type="submit" class="display" value="relevante">';
    echo '</div>';
}
$conn->close();
