<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Juice Shop</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;900&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="grey darken-3">
  <?php
  include 'src/conn.php';
  include 'navbar.php';
  ?>
  <div class="container">
    <div class="row">
      <h3 id="titleHome" class="white-text">Conheça nossos produtos!</h3>
    </div>
    <div class="row">
      <?php
      $sql = "SELECT * FROM products";
      $query = mysqli_query($conn, $sql);

      while ($reg = mysqli_fetch_array($query)) {
      ?>
        <div class="col s12 m6 l4">
          <div class="card grey lighten-3">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" id="productImage" src="img/products/<?php echo $reg["id"] ?>.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><?php echo $reg["name"]; ?><i class="material-icons right">more_vert</i></span>
              <p><a href="#">Clique para ver mais</a></p>
            </div>
            <div class="card-reveal grey lighten-3">
              <span class="card-title grey-text text-darken-4"><?php echo $reg["name"]; ?><i class="material-icons right">close</i></span>
              <p>
                <?php echo $reg['description'] ?>
                <br>
                <a class="modal-trigger" href="#modalComments<?php echo $reg['id'] ?>">Acessar página de comentários</a>
              </p>
            </div>
          </div>
        </div>

        <!-- Modal de comentários -->
        <div id="modalComments<?php echo $reg['id'] ?>" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><?php echo $reg['name'] ?>, comentários:</h4>
            <?php
            $sqlComments = "SELECT * FROM comments 
              INNER JOIN products ON comments.productId = products.id
              WHERE products.id = " . $reg['id'];

            echo "<br>" . $sqlComments . "<br>";

            $queryComments = mysqli_query($conn, $sqlComments);
            while ($regComments = mysqli_fetch_array($queryComments)) {
              echo $regComments['content'] . "<br>";
            }

            ?>
            <p>A bunch of text</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
        <!-- Fim do modal de comentários -->
      <?php
      }

      ?>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>

</html>