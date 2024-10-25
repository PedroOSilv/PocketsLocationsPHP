<?php include_once 'cabecalho.php'; ?>
<?php include_once 'navbar.php'; ?>

<?php if (usuarioEstaLogado()) {
        
    $nome =  $p['nome'];
    $descricao = $p['descricao'];
    $lider = $p['lider'];
    $diaDaSemana = $p['diaDaSemana'];
    $horario = $p['horario'];
    $instagram = $p['instagram'];
    $latitude = $p['latitude'];
    $longitude = $p['longitude']; 
    
    debug_to_console($nome);
    ?>

<div class="principal">
    <div id="lateral-esquerda" class="d-flex lateral-esquerda ">
        <div class="card-body">
            <form action="/PocketsLocationsPHP/novo" method="POST">
                <div class="form-group">
                    <label style="color: white;" for="nome">Nome</label>
                    <input value="<?= $nome?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome do bolso">
                </div>

                <div class="form-group mt-3">
                    <label style="color: white;" for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"
                        placeholder="Descrição do bolso"><?= $descricao?></textarea>
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="lider">Líder</label>
                    <input value="<?= $lider?>" type="text" class="form-control" id="lider" name="lider" placeholder="Líder do bolso">
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="diaDaSemana">Dia da semana</label>
                    <input value="<?= $diaDaSemana?>" type="text" class="form-control" id="diaDaSemana" name="diaDaSemana"
                        placeholder="Dia da semana">
                </div>
                <div class="form-group mt-3">
                    <label style="color: white;" for="horario">Horário</label>
                    <input value="<?= $horario?>" type="text" class="form-control" id="horario" name="horario" placeholder="Horário">
                </div>

                <div class="form-group mt-3">
                    <label style="color: white;" for="instagram">Instagram</label>
                    <input value="<?= $instagram?>" type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                </div>

                <input value="<?= $latitude?>" type="hidden" id="latitude" name="latitude">
                <input value="<?= $longitude?>" type="hidden" id="longitude" name="longitude">

                <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
            </form>
        </div>
    </div>

    <div id="map" class="flex-grow-1"></div>

    <button id="btn-change" class="button"><img src="public/images/menu-aberto.png"></button>
</div>

<script src="public/scripts/leaflet.js"></script>
<script>
    // atribui valores de latitude e longitude do php e converte pra float
    var lat = parseFloat("<?php echo $latitude; ?>");
    var lng = parseFloat("<?php echo $longitude; ?>");
    // Adiciona um marcador no mapa
    var marker = L.marker([lat, lng]).addTo(map)
        .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
        .openPopup();
    marker.title = "cad";

</script>

<?php } else { 

    debug_to_console("Usuário não logado");
    //redireciona para a página de login
    header("Location: /PocketsLocationsPHP/login");
    
    } ?>

<?php include_once 'rodape.php'; ?>