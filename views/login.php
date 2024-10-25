<?php include_once 'cabecalho.php'; ?>
<?php include_once 'navbar.php'; ?>


<div class="principal">
    <div id="lateral-esquerda" class="d-flex lateral-esquerda ">
        <div class="card-body">
            <!-- Formulário de Login -->
            <form action="user/login.php" method="POST">
                <div class="form-group">
                    <label style="color: white;" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                </div>

                <div class="form-group mt-3">
                    <label style="color: white;" for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Entrar</button>
            </form>
        </div>
    </div>

    <div id="map" class="flex-grow-1"></div>

    <button id="btn-change" class="button"></button>
</div>

<script src="public/scripts/leaflet.js"></script>


<?php include_once 'rodape.php'; ?>