<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    $_SESSION['logado'] = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Juice Shop</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;900&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="grey darken-3">
    <?php
    include '../conn.php';
    include 'navbar.php';
    ?>
    <div class="container">
        <div class="row center-align">
            <form action="validateLogin.php" class="grey lighten-2 black-text" method="POST" name="formLogin" id="formLogin">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="userEmail" name="userEmail" type="text" class="validate" required>
                        <label for="userEmail">E-mail</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">key</i>
                        <input id="userPass" name="userPass" type="password" class="validate" required>
                        <label for="userPass">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <a href="formNewUser.php">Criar nova conta</a>
                </div>
                <div class="row">
                    <input type="submit" name="btnLogin" value="Login" class="btn btn-large green darken-3">
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>

</body>

</html>