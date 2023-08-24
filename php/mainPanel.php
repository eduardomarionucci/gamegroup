<?php
include("connection.php");

echo 'Bem-vindo, ' . @$_SESSION["username"] . '!</p>';

echo '<div class="mediateBox">';

echo '<textarea id="receiveMessage" class="submit-message" placeholder="Tema da discussão..."></textarea>';

echo '<select id="receiveGame" class="display">';
echo '<option value="nenhum jogo específico"> Tópicos</option>';
echo '<option value="Counter-Strike"> Counter-Strike</option>';
echo '<option value="Valorant"> Valorant</option>';
echo '<option value="League Of Legends"> League Of Legends</option>';
echo '<option value="Fortnite"> Fortnite</option>';
echo '<option value="Dota 2"> Dota 2</option>';
echo '</select>';

echo '<button type="submit" onClick="sendDiscussion()" class="display">Publicar </button>';
echo '</div></br>';

echo 'Últimas publicações: </p>';

$sql = "SELECT * FROM discussions ORDER BY id DESC";
$result = $con->query($sql);
while ($linha = $result->fetch_object()) {


    echo '<form  action="discussion.php" method="get">';

    echo '<div class="discussionBox">';

    echo '<div class="discussion-part-1">';
    echo '<img id="image-icon" src="./assets/like.png">';
    echo '<p class="expose-relevance">15</p>';
    echo '<img id="image-icon" src="./assets/unlike.png">';
    echo '</div>';

    echo '<div class="discussion-part-2">';
    echo '<p class="token-message">' . $linha->game . " • Postado por " . $linha->username . "</p>";
    echo '<p class="expose-message">' . $linha->discussion . "</p>";
    echo '<input type="submit" class="display-submit" value="Acessar discussão">';
    echo '</div>';

    echo '</div>';

    echo '<input type="hidden" name="discussionID" value="' . $linha->id . '">';
    echo '<input type="hidden" name="discussionUSER" value="' . $linha->username . '">';
    echo '<input type="hidden" name="discussionMSG" value="' . $linha->discussion . '">';
    echo '<input type="hidden" name="discussionGAME" value="' . $linha->game . '">';
    echo '</form>';
}
$con->close();
?>

<script>

</script>