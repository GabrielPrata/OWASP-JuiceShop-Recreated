<?php
include '../conn.php';

$name = $_POST['userName'];
$email = $_POST['userEmail'];
$pass = $_POST['userPass'];

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
