<?php
include '../conn.php';

$email = $_POST['userEmail'];
$pass = $_POST['userPass'];

$sql = "SELECT * FROM users WHERE email = '$email' and password = '$pass'";

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    if (!isset($_SESSION)) {
        session_start();
    }

    while ($reg = mysqli_fetch_array($query)) {
        $_SESSION['logado'] = true;
        $_SESSION['userId'] = $reg['id'];
        $_SESSION['userName'] = $reg['name'];
        $_SESSION['userEmail'] = $reg['email'];
        $admin = $reg['admin'];
    }

    if ($admin == 1) {
        $_SESSION['userAdmin'] = true;
        
        mysqli_free_result($query);
        mysqli_close($conn);

        header('location: adminPanel.php');
    } else {
        mysqli_free_result($query);
        mysqli_close($conn);

        echo " <script language=javascript>
        window.alert('Você está logado no sistema ;)');
        window.location='../../index.php';
        </script>";
    }
} else {
    mysqli_free_result($query);
    mysqli_close($conn);

    echo " <script language=javascript>
        window.alert('Usuário ou senha incorretos!');
        window.history.back()
        </script>";
}
