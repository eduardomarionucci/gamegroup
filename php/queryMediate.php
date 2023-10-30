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

    echo '<button class="display" onClick="showLinkInput()">Mídia</button>';

    echo '<button onClick="sendDiscussion()" class="display">Publicar </button>';
    echo '</div></br>';

    echo 
    '<div id="linkInput" class="mediateBox" style="display:none">
        <input id="receiveFourth" class="submit-message" placeholder="Link da imagem..."></input>
    </div>';
}
