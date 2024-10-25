<?php if (usuarioEstaLogado()) { ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="public/images/fogueira.png" alt="Bootstrap" width="30" height="24">
            </a>
            <a class="nav-link p-2" style="color:white" aria-current="page" href="user/logout.php">Sair</a>
        </div>
    </nav>

<?php } else { ?>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="public/images/fogueira.png" alt="Bootstrap" width="30" height="24">
            </a>
        </div>
    </nav>

<?php } ?>