<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
/* if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./index.html");
    exit;
} */

// Include config file
require_once "php/connection.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor insira seu usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor insira sua senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userID"] = $id;
                            $_SESSION["username"] = $username;
                            
                            $sql = "SELECT icon FROM users WHERE id = '" . $id . "'";
                            $result = $con->query($sql);
                            $linha = $result->fetch_object();
                            $_SESSION['userICON'] = $linha->icon;

                            // Redirect user to welcome page
                            header("location: ./main.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Usuário ou senha inválido.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Usuário ou senha inválido.";
                }
            } else {
                echo "Opa! Algo deu errado. Por favor tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./login-register.css" rel="stylesheet">
    <title>Página de Login</title>
</head>

<body>
    <script src="./js/login.js"></script>
    <div class="background">
        <!-- <div class="logo">
            <a href="landing.html">GAMEGROUP</a>
        </div> -->
        <div class="area-login">
            <div class="login">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="loginForm">
                    <h1>Login</h1>
                    <input type="text" name="username" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> id="username" placeholder="Usuário" autofocus required>
                    <input type="password" name="password" id="password <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Senha" required>

                    <button type="submit">Entrar</button>
                    <p>Não tem conta? <a href="./register.php">Cadastre-se</a> </p>
                </form>
                <div id="message">
                    <p id="messageText">
                        <?php

                        if (!empty($login_err)) {
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }
                        ?>
                    </p>
                </div>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>