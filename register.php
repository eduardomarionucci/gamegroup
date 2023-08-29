<?php
// Include config file
require_once "php/connection.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor informe seu usuário";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "O usuário deve conter apenas letras, números e underline";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuário já existe";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Algo deu errado, tente novamente mais tarde";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor informe sua senha";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "A senha deve conter pelo menos 6 caracteres";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirme sua senha";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "As senhas não coincidem.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Algo deu errado, tente novamente mais tarde";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // var_dump(mysqli_error($con));
    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<script src="./js/login.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet">
    
    <title>Cadastro</title>
</head>

<body>
    <div class="sections">
        <div class="containerbg">
            <div class="area">
                <div class="logo">
                    <a href="index.html">GAMEGROUP</a>
                </div>
            </div>
            <div class="quote">
                <h1 id="gradient">Conecte-se a melhor comunidade gamer</h1>
            </div>
        </div>

        <div class="area-registro">
            <div class="container-registro">
                <div class="registro">
                    <h1>Registro</h1>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="text" name="username" placeholder="Usuário" required>

                        <input type="password" name="password" placeholder="Senha" required>
                        <span class="invalid-feedback">
                            <?php echo $username_err; ?>
                        </span>
                        <input type="password" name="confirm_password" placeholder="Confirme sua senha" required>
                        <span class="invalid-feedback">
                            <?php echo $password_err; ?>
                        </span>
                        <!-- <span class="invalid-feedback">
                            <?php /* echo $confirm_password_err; */ ?>
                        </span> -->
                        <input type="text" name="telephone" id="telephone" value="" placeholder="Telefone" required>

                        <span class="radio-group">
                                <input type="radio" name="opcao" value="opcao1">
                                <label for="termos">Masculino</label>
                                <input type="radio" name="opcao" value="opcao2">
                                <label for="termos">Feminino</label>
                        </span></br>
                        
                        <div class="termos">
                            <input type="checkbox" name="termos" id="termos" value="termos" required>
                            <label for="termos">Eu aceito os <a href="#">termos de uso</a></label>
                        </div>

                        <button type="submit">Cadastrar-se</button>
                    </form>

                    <p>Já tem conta? <a href="./login.php">Entre</a> </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>