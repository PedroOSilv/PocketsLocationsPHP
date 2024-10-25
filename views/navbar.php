<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="public/images/shabbinha.png" alt="Bootstrap" width="45" height="45">
        </a>
        <?php if (usuarioEstaLogado()) { ?>
            <div class="d-flex flex-row align-items-center gap-3">
                <!-- reduz o tamanho das images -->
                <a href="listaAdmin"><img src="public/images/lista.png" width="45" height="45" alt=""></a>
                <a href="addpockets"><img src="public/images/novo.png" width="45" height="45" alt=""></a>
                <a class="nav-link p-2" style="color:white" aria-current="page" href="user/logout.php">Sair</a>
            </div>

        <?php } else { ?>
            <div class="d-flex flex-row align-items-center gap-3">
                <a href="login"><img src="public/images/entrar.png" width="45" height="45" alt=""></a>
            </div>
        <?php } ?>

    </div>
</nav>