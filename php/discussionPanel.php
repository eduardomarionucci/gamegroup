<?php
include("connection.php");

if (isset($_GET) && !empty($_GET)) {
    $_SESSION['discussionID'] = $_GET["discussionID"];
}

echo 'Acessando como: ' . $_SESSION["username"] . '</p>';

$sql = "SELECT * FROM discussions WHERE id = '" . $_SESSION['discussionID'] . "'";
$result = $con->query($sql);
$linha = $result->fetch_object();

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

echo '<div class="discussion-part-2">';
echo '<p class="token-message">' . $linha->game . " • Postado por " . $linha3->username . "</p>";
echo '<p class="expose-message">' . $linha->discussion . "</p>";
echo '</div>';

echo '</div>';

echo '<div class="mediateBox">';
echo '<textarea id="receiveMessage" class="submit-message" placeholder="Adicionar um comentário..."></textarea>';
echo '<button onClick="sendComment()" class="display">Comentar </button>';
echo '</div></br>';

echo "Últimos comentários: ";

$sql = "SELECT * FROM comments WHERE discussion = '" . $_SESSION['discussionID'] . "' ORDER BY id DESC";
$result = $con->query($sql);
while ($linha = $result->fetch_object()) {

    $relevance = 0;
    $imageClassUp = "image-icon";
    $imageClassDown = "image-icon";

    echo '<div class="commentBox">';

    $sql2 = "SELECT * FROM relevance WHERE comment_id = '$linha->id'";
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
    echo '<img class="' . $imageClassUp . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'up\', \'comment_id\')" src="./assets/like.png">';
    echo '<p class="expose-relevance">' . $relevance . '</p>';
    echo '<img class="' . $imageClassDown . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'down\', \'comment_id\')" src="./assets/unlike.png">';
    echo '</div>';

    echo '<div>';

    $sql3 = "SELECT username FROM users WHERE id = '$linha->username'";
    $result3 = $con->query($sql3);
    $linha3 = $result3->fetch_object();

    echo '<div class="discussion-upper">';
    echo '<p class="token-message">' . $linha3->username . ' fez um comentário</p>';
    if ($linha3->username == $_SESSION["username"]) {
        echo '<img class="delete-icon" alt="deleteButton" onClick="sendDelete(' . $linha->id . ', \'comment\')" src="./assets/delete.png">';
    }
    echo '</div>';

    echo '<p class="expose-message-cmt">' . $linha->comment . "</p>";
    echo '</div>';

    echo '</div>';
}
$con->close();
