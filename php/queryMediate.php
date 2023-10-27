<?php

if ($_SESSION['requirement'] == "discussionPanel") {
    echo '<div class="mediateBox">';
    echo '<textarea id="receiveThird" class="submit-message" placeholder="Adicionar um comentário..."></textarea>';
    echo '<button onClick="sendDiscussion()" class="display">Comentar </button>';
    echo '</div></br>';
} else {

    echo '<p class="title">ESTÁ PENSANDO EM ALGO?</p>';

    echo '<div class="mediateBox">';

    echo '<textarea id="receiveSecond" class="submit-message" placeholder="Tema da discussão..."></textarea>';

    echo '<select id="receiveThird" class="display">';

    echo '<option value="Nenhum jogo específico"> Tópicos</option>';
    $sql = "SELECT topic FROM topics ORDER BY id DESC";
    $result = $con->query($sql);
    while ($linha = $result->fetch_object()) {

        echo '<option value="' . $linha->topic . '">' . $linha->topic . '</option>';
    }

    echo '</select>';

    echo '<span class="image-display">';
    echo '<label for="fileInput">Mídia</label>';
    echo '<input type="file" name="imagem" id="fileInput" style="display:none" />';
    echo '</span>';

    echo '<button onClick="sendDiscussion()" class="display">Publicar </button>';
    echo '</div></br>';
}
