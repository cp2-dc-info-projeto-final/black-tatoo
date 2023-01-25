<header>
    <nav class="navbar navbar-expand-lg navbar-light
    bg-light">
        <a class="navbar-brand" href="Index.php">Black Tatoo Studio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data- target="#conteudoNavbarSuportado" aria- controls="conteudoNavbarSuportado" aria- expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="servicos.php">Tatuagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agendamento.php">Agendamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nós</a>
                </li>

            </ul>
        <?php    
            if (session_status() === PHP_SESSION_NONE){
            session_start();
                if(empty($_SESSION["email"]) == true){
                echo "<form class='form-inline my-2 my-lg-0'>";
                echo "<div class='.caixa'>";
                    echo "<a href='login.php' class='btn btn-outline-primary'>Login</a>";
                    echo "<a href='Formulario.php' class='btn btn-outline-success'>Cadastre-se</a>";
                echo "</div>";
                    echo "</form>";
                }
                else{echo "<a class='navbar-brand' href='perfil.php'>perfil</a>"; }
            }
            else{echo "<a class='navbar-brand' href='perfil.php'>perfil</a>"; } ?>
        </div>
    </nav>
</header>