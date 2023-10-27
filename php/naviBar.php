<header>
    <a class="logo" href="./main.php">GAMEGROUP</a>
    <?php echo '<p class="title" >' . $_SESSION["username"] . '</p>'; ?>

    <form class="formBox" action="user.php" method="get">
    <button type="submit" class="perfil-icon">
    <?php echo '<img src=assets/perfil-icons/' . $_SESSION["userICON"] . '>'; ?>
    </button>
    <?php echo '<input type="hidden" name="userNOW" value="' . $_SESSION["username"] . '">'; ?>
    </form>'

    <a class="nav-button" href="php/logout.php">Sair</a>
    <!-- <p class="menu login">Menu</p> -->
</header>