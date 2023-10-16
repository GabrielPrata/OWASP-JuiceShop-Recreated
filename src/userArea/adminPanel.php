<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
  $_SESSION['logado'] = false;
}

if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == true) {

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
      <div class="row">
        <ul class="collapsible popout">
          <li class="white">
            <div class="collapsible-header">
              <i class="material-icons">shopping_cart</i>
              Cadastrar Novo Produto
            </div>
            <div class="collapsible-body">
              <span>
                <form action="newProduct.php" name="formNewProduct" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="productName" name="productName" type="text" class="validate">
                      <label for="productName">Nome do Produto</label>
                    </div>
                    <div class="input-field col s6">
                      <select name="productCategory">
                        <option value="" disabled selected>Categoria</option>
                        <?php
                        $sql = "SELECT * FROM categories";
                        $query = mysqli_query($conn, $sql);

                        while ($reg = mysqli_fetch_array($query)) {
                        ?>
                          <option value="<?php echo $reg['id']; ?>"><?php echo $reg['categoryname']; ?></option>
                        <?php
                        }

                        ?>
                      </select>
                      <label>Categoria:</label>
                    </div>
                    <div class="input-field col s12">
                      <textarea id="textareaDescription" name="textareaDescription" class="materialize-textarea" maxlength="250" data-length="250"></textarea>
                      <label for="textareaDescription">Descrição:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="file-field input-field">
                      <div class="btn blue-grey">
                        <span>Arquivo</span>
                        <input type="file" name="productImage" required>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Envie a imagem do produto" accept="image/jpeg">
                      </div>
                    </div>
                  </div>
                  <div class="row center-align">
                    <input type="submit" name="btnNewProduct" value="Cadastrar" class="btn green darken-1">
                  </div>
                </form>
              </span>
            </div>
          </li>
          <li class="white">
            <div class="collapsible-header">
              <i class="material-icons">password</i>Alterar senha
            </div>
            <div class="collapsible-body">
              <span>
                <form action="newPassword.php" name="formNewPassword" method="POST">
                  <div class="row">
                    <div class="input-field col s10">
                      <input id="newPassword" name="newPassword" type="password" class="validate">
                      <label for="newPassword">Nova Senha</label>
                    </div>
                    <div class="input-field col s2">
                      <input name="btnNewPassword" type="submit" class="btn green darken-1" value="Alterar">
                    </div>
                  </div>
                </form>
              </span>
            </div>
          </li>
        </ul>
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
<?php
  mysqli_free_result($query);
  mysqli_close($conn);
} else {
  echo " <script language=javascript>
  window.alert('Você não possui permissão para acessar esta página.');
  window.location='../../index.php';
   </script>";
}

?>