<header>
    <a class="logo" href="./main.php">GAMEGROUP</a>

    <form class="formBox" action="user-search.php" method="get">
    <div class="mediateBox">
        <textarea name="receiveUser" class="submit-user" placeholder="Pesquisar por usuários..."></textarea>
        <button type="submit" class="display-search">🔍︎ </button>
    </div>
    </form>
    <?php echo '<p class="title-user" >' . $_SESSION["username"] . '</p>'; ?>


    <form class="formBox" action="user.php" method="get">
        <button type="submit" class="perfil-icon">
            <?php echo '<img src=https://ui-avatars.com/api/?bold=0&background=3e0c5e&color=FFFFFF&name=' . $_SESSION["username"] . '>'; ?>
        </button>
        <?php echo '<input type="hidden" name="userNOW" value="' . $_SESSION["username"] . '">'; ?>
    </form>

    <a class="nav-button" href="php/logout.php">Sair</a>
    <!-- <p class="menu login">Menu</p> -->
</header>