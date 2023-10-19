<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    $_SESSION['logado'] = false;
}

if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == true) {

    include '../conn.php';
    $password = $_POST['newPassword'];
    // $password = md5($password);
    
    $sql = "UPDATE users SET password='$password' WHERE id = " . $_SESSION['userId'];

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        echo " <script language=javascript>
        window.alert('Senha alterada com sucesso!');
        window.location='../../index.php';
         </script>";
    }else{
        mysqli_close($conn);
        echo " <script language=javascript>
        window.alert('Ocorreu um erro ao redefinir a senha. Tente novamente mais tarde');
        window.location='../../index.php';
         </script>";
    }
} else {
    echo " <script language=javascript>
window.alert('Você não possui permissão para acessar esta página.');
window.location='../../index.php';
 </script>";
}
