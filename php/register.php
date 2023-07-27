<?php
// Include config file
require_once "connection.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
var_dump($username);
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
                header("location: ./index.php");
            } else {
                echo "Algo deu errado, tente novamente mais tarde";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    var_dump(mysqli_error($con));
    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>


    <style>
        body {
            font: 14px sans-serif;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <script src="script.js"></script>

    <div class="modal fade" id="myModalR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header text-white">
                    <h5 class="modal-title fs-3" id="exampleModalLabel">Cadastro</h5>

                    <button type="button" class="btn button-primary" data-bs-dismiss="modal" aria-label="Fechar">
                        <img src="./assets/marca-cruzada.png" class="img-fluid">
                    </button>
                </div>
                <div class="modal-body text-white">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group mb-3">
                            <label>Usuário</label>
                            <input type="text" name="username" class="form-control mt-2 <?php echo (!empty($username_err)) ?
                                'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback">
                                <?php echo $username_err; ?>
                            </span>
                        </div>
                        <div class="form-group my-3">
                            <label>Senha</label>
                            <input type="password" name="password"
                                class="form-control mt-2<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $password; ?>">
                            <span class="invalid-feedback">
                                <?php echo $password_err; ?>
                            </span>
                        </div>
                        <div class="form-group my-3 ">
                            <label>Confirme sua Senha</label>
                            <input type="password" name="confirm_password"
                                class="form-control mt-2<?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback">
                                <?php echo $confirm_password_err; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" id="submitBtn" value="Enviar">
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </div>
                        <div class="form-group mt-2">
                            <p>Já tem uma conta? <a href="login.php" data-bs-toggle="modal" data-bs-target="#myModal"
                                    data-bs-dismiss="modal">Login aqui</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>