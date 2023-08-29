<?php
include("connection.php");

echo '<p class="title">BEM-VINDO | ' . $_SESSION["username"] . '!</p>';

echo '<div class="mediateBox">';

echo '<textarea id="receiveMessage" class="submit-message" placeholder="Tema da discussão..."></textarea>';

echo '<select id="receiveGame" class="display">';
echo '<option value="Nenhum jogo específico"> Tópicos</option>';
echo '<option value="Counter-Strike"> Counter-Strike</option>';
echo '<option value="Valorant"> Valorant</option>';
echo '<option value="League Of Legends"> League Of Legends</option>';
echo '<option value="Fortnite"> Fortnite</option>';
echo '<option value="Dota 2"> Dota 2</option>';
echo '</select>';

echo '<span class="image-display">';
echo '<label for="fileInput">Mídia</label>';
echo '<input type="file" name="imagem" id="fileInput" style="display:none" />';
echo '</span>';

echo '<button onClick="sendDiscussion()" class="display">Publicar </button>';
echo '</div></br>';

echo '<p class="title">ÚLTIMAS PLUBLICAÇÕES </p>';

$sql = "SELECT * FROM discussions ORDER BY id DESC";
$result = $con->query($sql);
while ($linha = $result->fetch_object()) {

    $relevance = 0;
    $imageClassUp = "image-icon";
    $imageClassDown = "image-icon";

    echo '<div class="discussionBox">';

    $sql2 = "SELECT * FROM relevance WHERE discussion_id = '$linha->id'";
    $result2 = $con->query($sql2);
    while ($linha2 = $result2->fetch_object()) {

        if ($linha2->situation == true) {
            $relevance++;
        } else if ($linha2->situation == false) {
            $relevance--;
        }

        if ($linha2->username_id == $_SESSION['usernameID']) {

            if ($linha2->situation == 1) {
                $imageClassUp = "image-icon-press";
            } else {
                $imageClassDown = "image-icon-press";
            }
        }
    }

    echo '<div class="relevanceBox">';
    echo '<img class="' . $imageClassUp . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'up\', \'discussion_id\')" src="./assets/like.png">';
    echo '<p class="expose-relevance">' . $relevance . '</p>';
    echo '<img class="' . $imageClassDown . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'down\', \'discussion_id\')" src="./assets/unlike.png">';
    echo '</div>';

    $sql3 = "SELECT username FROM users WHERE id = '$linha->username'";
    $result3 = $con->query($sql3);
    $linha3 = $result3->fetch_object();

    echo '<form class="formBox" action="discussion.php" method="get">';

    echo '<div>';

    echo '<div class="discussion-upper">';
    echo '<p class="token-message">' . $linha->game . " • Postado por " . $linha3->username . "</p>";
    if ($linha3->username == $_SESSION["username"]) {
    echo '<img class="delete-icon" alt="deleteButton" onClick="sendDelete(' . $linha->id . ', \'discussion\')" src="./assets/delete.png">';
    }
    echo '</div>';

    echo '<p class="expose-message">' . $linha->discussion . "</p>";
    echo '<input type="submit" class="display-submit" value="Acessar discussão">';
    echo '</div>';

    echo '<input type="hidden" name="discussionID" value="' . $linha->id . '">';
    echo '</form>';

    echo '</div>';

    
}
$con->close();
?>

<script>

</script>