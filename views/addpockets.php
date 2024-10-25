<?php include_once 'cabecalho.php'; ?>
<?php include_once 'navbar.php'; ?>

<?php if (usuarioEstaLogado()) { 


    ?>
<div class="principal">
    <div id="lateral-esquerda" class="d-flex lateral-esquerda ">
        <div class="card-body">
            <form action="/PocketsLocationsPHP/novo" method="POST">
                <div class="form-group">
                    <label style="color: white;" for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do bolso">
                </div>

                <div class="form-group mt-3">
                    <label style="color: white;" for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"
                        placeholder="Descrição do bolso"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="lider">Líder</label>
                    <input type="text" class="form-control" id="lider" name="lider" placeholder="Líder do bolso">
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="diaDaSemana">Dia da semana</label>
                    <input type="text" class="form-control" id="diaDaSemana" name="diaDaSemana"
                        placeholder="Dia da semana">
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="horario">Horário</label>
                    <input type="text" class="form-control" id="horario" name="horario" placeholder="Horário">
                </div>

                <div class="form-group mt-3">
                    <label style="color: white;" for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                </div>

                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">

                <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
            </form>
        </div>
    </div>

    <div id="map" class="flex-grow-1"></div>

    <button id="btn-change" class="button"><img src="public/images/menu-aberto.png"></button>
</div>

<script src="public/scripts/leaflet.js"></script>

<?php } else { 

    debug_to_console("Usuário não logado");
    //redireciona para a página de login
    header("Location: /PocketsLocationsPHP/login");
    
    } ?>

<?php include_once 'rodape.php'; ?>