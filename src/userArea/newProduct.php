<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    $_SESSION['logado'] = false;
}

if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == true) {
    include '../conn.php';

    $nome = $_POST['productName'];
    $category = $_POST['productCategory'];
    $description = $_POST['textareaDescription'];

    $sql = "INSERT INTO products";
    $sql .= "(name, description, category) ";
    $sql .= " VALUES('$nome', '$description', $category)";

    if (mysqli_query($conn, $sql)) {

        $_UP['folder'] = '../../img/products/';
        // $_UP['tamanho'] = 1024 * 1024 * 4;
        // $extensao = substr($_FILES['fileFoto']['name'], -4);

        // $sql = "SELECT MAX(id) FROM products";
        // $query = mysqli_query($conn, $sql);

        // $fetch = mysqli_fetch_array($query);
        // $newName = $fetch['MAX(id)'] + 1 . ".jpg";


        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $_UP['folder'] . $_FILES['productImage']['name'])) {
            $upload = true;
        } else {
            $upload = false;
        }
        if (!isset($upload) or $upload == "") {
            $upload = false;
        }
        if ($upload == false) {
            mysqli_close($conn);
            echo " <script language=javascript>
                    window.alert('Oops! Ocorreu um erro ao subir sua imagem. O restante do cadastro foi concluído com sucesso!');
                    //window.location='adminPanel.php';
                    </script>";
        } else {
            mysqli_close($conn);
            echo " <script language=javascript>
                    window.alert('Produto cadastrado com sucesso!');
                    window.location='adminPanel.php';
                    </script>";
        }
    } else {
        mysqli_close($conn);
        echo " <script language=javascript>
            window.alert('Oops! Ocorreu um erro ao finalizar seu cadastro, tente novamente mais tarde.');
            window.location='../index.php';
            </script>";
    }
} else {
    echo " <script language=javascript>
    window.alert('Você não possui permissão para acessar esta página.');
    window.location='../../index.php';
     </script>";
}
