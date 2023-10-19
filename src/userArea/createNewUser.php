<?php
include '../conn.php';

$name = $_POST['userName'];
$email = $_POST['userEmail'];
$pass = $_POST['userPass'];

// $name = stripslashes($_POST['userName']);
// $name = mysqli_real_escape_string($conn, $name);

// $email = stripslashes($_POST['userEmail']);
// $email = mysqli_real_escape_string($conn, $email);

// $pass = stripslashes($_POST['userPass']);
// $pass = mysqli_real_escape_string($conn, $pass);
// $pass = md5($pass);


$sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pass')";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);

    echo " <script language=javascript>
        window.alert('Cadastro finalizado com sucesso! :D');
        window.location='formLogin.php';
         </script>";
} else {
    mysqli_close($conn);

    echo " <script language=javascript>
        window.alert('Ops! Ocorreu um erro ao realiazar o seu cadastro. Tente novamente mais tarde... :(');
        window.location='formLogin.php';
         </script>";
}
