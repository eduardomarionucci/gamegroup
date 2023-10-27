<?php

if ($_SESSION['requirement'] == "mainPanel") {
    echo '<p class="title">ÚLTIMAS PUBLICAÇÕES </p>';
    $sql = 'SELECT * FROM discussions ORDER BY id DESC';
} else if ($_SESSION['requirement'] == "discussionPanel") {
    echo '<p class="title">DISCUSSÃO </p>';
    $sql = "SELECT * FROM discussions WHERE id = '" . $_SESSION['discussionID'] . "'";
} else if ($_SESSION['requirement'] == "userPanel") {
    echo '<p class="title">ÚLTIMAS PUBLICAÇÕES </p>';
    $sql = "SELECT id FROM users WHERE username = '" . $_SESSION['currentUser'] . "'";
    $result = $con->query($sql);
    $linha = $result->fetch_object();
    $sql = "SELECT * FROM discussions WHERE user_id = " . $linha->id . " ORDER BY id DESC";
} else if ($_SESSION['requirement'] == "discussionPanelComment") {
    echo '<p class="title">ÚLTIMOS COMENTÁRIOS ';
    $sql = "SELECT * FROM comments WHERE discussion_id = '" . $_SESSION['discussionID'] . "' ORDER BY id DESC";
}

$result = $con->query($sql);
while ($linha = $result->fetch_object()) {

    $relevance = 0;
    $imageClassUp = "image-icon";
    $imageClassDown = "image-icon";

    echo '<div class="discussionBox">';

    if ($_SESSION['requirement'] == "discussionPanelComment") {
        $sql2 = "SELECT * FROM relevance WHERE comment_id = '$linha->id'";
    } else {
        $sql2 = "SELECT * FROM relevance WHERE discussion_id = '$linha->id'";
    }
    $result2 = $con->query($sql2);
    while ($linha2 = $result2->fetch_object()) {

        if ($linha2->situation == true) {
            $relevance++;
        } else if ($linha2->situation == false) {
            $relevance--;
        }

        if ($linha2->user_id == $_SESSION['userID']) {

            if ($linha2->situation == 1) {
                $imageClassUp = "image-icon-press";
            } else {
                $imageClassDown = "image-icon-press";
            }
        }
    }

    if ($_SESSION['requirement'] == "discussionPanelComment") {
        echo '<div class="relevanceBox">';
        echo '<img class="' . $imageClassUp . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'up\', \'comment_id\')" src="./assets/like.png">';
        echo '<p class="expose-relevance">' . $relevance . '</p>';
        echo '<img class="' . $imageClassDown . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'down\', \'comment_id\')" src="./assets/unlike.png">';
        echo '</div>';
    } else {
        echo '<div class="relevanceBox">';
        echo '<img class="' . $imageClassUp . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'up\', \'discussion_id\')" src="./assets/like.png">';
        echo '<p class="expose-relevance">' . $relevance . '</p>';
        echo '<img class="' . $imageClassDown . '" alt="relevanceButton" onClick="sendRelevance(' . $linha->id . ', \'down\', \'discussion_id\')" src="./assets/unlike.png">';
        echo '</div>';
    }

    $sql3 = "SELECT * FROM users WHERE id = '$linha->user_id'";
    $result3 = $con->query($sql3);
    $linha3 = $result3->fetch_object();

    echo '<div>';
    echo '<div class="discussion-upper">';

    echo '<form class="formBox" action="user.php" method="get">';
    echo '<button type="submit" class="token-icon">';

    echo '<img src=assets/perfil-icons/' . $linha3->icon . '>';

    echo '</button>';
    echo '<input type="hidden" name="userNOW" value="' . $linha3->username . '">';
    echo '</form>';

    if ($_SESSION['requirement'] == "discussionPanelComment") {
        echo '<p class="token-message">' . $linha3->username . ' fez um comentário</p>';
        if ($linha3->username == $_SESSION["username"]) {
            echo '<img class="delete-icon" alt="deleteButton" onClick="sendDelete(' . $linha->id . ', \'comment\')" src="./assets/delete.png">';
        }
        echo '</div>';

        echo '<p class="expose-message-cmt">' . $linha->comment . "</p>";
    } else {
        echo '<p class="token-message">Postado por ' . $linha3->username . '  •  ' . $linha->game . "</p>";
        if ($linha3->username == $_SESSION["username"]) {
            echo '<img class="delete-icon" alt="deleteButton" onClick="sendDelete(' . $linha->id . ', \'discussion\')" src="./assets/delete.png">';
        }
        echo '</div>';

        echo '<p class="expose-message">' . $linha->discussion . "</p>";
    }

    if ($_SESSION['requirement'] == "mainPanel" || $_SESSION['requirement'] == "userPanel") {
        echo '<form class="formBox" action="discussion.php" method="get">';
        echo '<input type="submit" class="display-submit" value="Acessar discussão">';
        echo '<input type="hidden" name="discussionID" value="' . $linha->id . '">';
        echo '</form>';
    }
    echo '</div>';
    echo '</div>';
}
