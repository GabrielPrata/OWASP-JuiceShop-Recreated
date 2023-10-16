<?php
     if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
        echo " <script language=javascript>
            window.alert('Faça login no sistema para continuar navegando.');
            window.location='formLogin.php';
             </script>";
    }

    include '../conn.php';
    $id = $_GET['id'];
    $content = $_POST['textareaComment'];
    $sql = "INSERT INTO comments(userId, productId, content) ";
    $sql .= "VALUES(" . $_SESSION['userId'] . ", " . $id . ", '" . $content . "')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    
        echo " <script language=javascript>
            window.alert('Recebemos seu Comentário! Agradecemos por compartilhar a sua experiência conosco! :D');
            window.location='../../index.php';
             </script>";
    } else {
        mysqli_close($conn);
    
        echo " <script language=javascript>
            window.alert('Ops! Ocorreu um erro ao enviar seu comentário. Tente novamente mais tarde...');
            window.location='../../index.php';
             </script>";
    }
