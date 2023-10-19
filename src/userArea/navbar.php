<nav class="blue-grey darken-2" role="navigation">
    <div class="nav-wrapper container row">
        <a id="logo-container" href="../../index.php" class="col s3 valign-wrapper">
            <img src="../../img/JuiceShop_Logo.png" alt="OWASP Juice Shop Logo" id="logoNavbar">
            <p>OWASP Juice Shop</p>
        </a>
        <div class="col s6">

            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                        Usuário <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
            ?>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#" class="black-text"><?php echo $_SESSION['userName'] ?></a></li>
                    <?php
                    if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == true) {
                    ?>
                        <li><a href="adminPanel.php">Painel Admin</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            <?php
            } else {
            ?>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="formLogin.php">Fazer Login</a></li>
                </ul>
            <?php
            }
            ?>

            <!-- <ul class="right hide-on-med-and-down">
    <li><a href="#">Navbar Link</a></li>
</ul> -->
        </div>

        <div class="col s3">
            <form method="get" name="frm_busca" action="search.php" id="productSearch">
                <div class="input-field">
                    <input id="search" type="search" name="txt_search" required placeholder="Pesquisar...">
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </div>
</nav>