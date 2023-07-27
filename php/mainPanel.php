<?php
include("connection.php");

echo 'Bem-vindo, ' . $_SESSION["username"] . '!</p>';

echo '<div class="mediateBox">';

echo 'Comente sobre um game!</p>';

echo '<textarea id="receiveMessage" class="message" placeholder="Comente!"></textarea>';

echo '<select id="receiveGame" class="display">';
echo '<option value="nenhum jogo específico"> Selecione um game</option>';
echo '<option value="Counter-Strike"> Counter-Strike</option>';
echo '<option value="Valorant"> Valorant</option>';
echo '<option value="League Of Legends"> League Of Legends</option>';
echo '<option value="Fortnite"> Fortnite</option>';
echo '<option value="Dota 2"> Dota 2</option>';
echo '</select>';

echo '<button onClick="sendComment()" class="display">Comentar </button>';
echo '</div></br>';

echo 'Últimos Comentários: </p>';

$sql = "SELECT * FROM comments ORDER BY id DESC";
$result = $con->query($sql);
while($linha = $result->fetch_object()){

    echo '<div class="commentBox">';
    
    echo $linha->username . " comentou:";
    echo '<textarea class="message" placeholder="' . $linha->comment . '" readonly></textarea>';
    
    echo "Acerca de " . $linha->game;
    echo '</div>';
    }
?>