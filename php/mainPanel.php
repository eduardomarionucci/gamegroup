<?php
include("connection.php");

echo 'Bem-vindo, ' . $_SESSION["username"] . '!</p>';

echo '<div class="mediateBox">';

echo 'Publique uma discussão!</p>';

echo '<textarea id="receiveMessage" class="message" placeholder="Tema da discussão..."></textarea>';

echo '<select id="receiveGame" class="display">';
echo '<option value="nenhum jogo específico"> Jogo em discussão...</option>';
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
while($linha = $result->fetch_object()){

    echo '<div class="discussionBox">';
    
    echo '<form action="discussion.php" method="get">';
    echo $linha->username . " inciou uma discussão</br> acerca de " . $linha->game;
    echo '<textarea class="message" placeholder="' . $linha->discussion . '" readonly></textarea>';
    echo '<input type="submit" class="display" value="Acessar discussão">'; 
    echo '<input type="hidden" name="discussionID" value="' . $linha->id . '">';
    echo '<input type="hidden" name="discussionUSER" value="' . $linha->username . '">';
    echo '<input type="hidden" name="discussionMSG" value="' . $linha->discussion . '">';
    echo '<input type="hidden" name="discussionGAME" value="' . $linha->game . '">';
    echo '</form>';
    echo '</div>'; 
    }
    $con->close();
?>