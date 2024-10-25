<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="public/images/shabbinha.png" alt="Bootstrap" width="45" height="45">
        </a>
        <?php if (usuarioEstaLogado()) { ?>
            <div class="d-flex flex-row align-items-center">
                <a href="addpockets"><img src="public/images/novo.png" alt=""></a>
                <a class="nav-link p-2" style="color:white" aria-current="page" href="user/logout.php">Sair</a>
            </div>

        <?php } else { ?>
        <?php } ?>

    </div>
</nav>