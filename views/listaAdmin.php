<?php include_once 'cabecalho.php'; ?>
<?php include_once 'navbar.php'; ?>



<div class="principal">
    <div id="lateral-esquerda" class="d-flex lateral-esquerda">
        <?php if (!empty($pockets)): ?>
            <?php foreach ($pockets as $pocket): ?>
                <div id="card" class="animate__animated animate__fadeIn">
                    <div class="d-flex flex-column align-items-start">
                        <div class="cardHead d-flex flex-column align-items-start">
                            <h2 id="title"><?php echo htmlspecialchars($pocket['nome']); ?></h2>
                            <p id="subtitle"><?php echo htmlspecialchars($pocket['descricao']); ?></p>
                        </div>
                        <p id="leader" class="card-infos">
                            <img src="public/images/pessoa.png" id="icon-leader">
                            <?php echo htmlspecialchars($pocket['lider']); ?>
                        </p>
                        <p id="day" class="card-infos">
                            <img src="public/images/ring-calendar.png" id="icon-day">
                            <?php echo htmlspecialchars($pocket['diaDaSemana']); ?>
                        </p>
                        <p id="time" class="card-infos">
                            <img src="public/images/relogio.png" id="icon-time">
                            <?php echo htmlspecialchars($pocket['horario']); ?>
                        </p>
                    </div>

                    <div class="d-flex mt-1 flex-row">
                        <form class="mx-1" action="del" method="post">
                            <input type="hidden" name="id" value="<?= $pocket['id'] ?>">
                            <button onclick="" class="btn btn-danger">Deletar</button>

                        </form>
                        <form class="mx-1" action="edit" method="post">

                            <input type="hidden" name="id" value="<?= $pocket['id'] ?>">
                            <button onclick="" class="btn btn-primary">Editar</button>

                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div id="card" class="animate__animated animate__fadeIn">
                <div class="d-flex flex-column align-items-start">
                    <div class="cardHead d-flex flex-column align-items-start">
                        <h2 id="title">Nenhum bolso cadastrado</h2>
                        <p id="subtitle">Crie um bolso para começar a compartilhar conhecimento</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="map" class="flex-grow-1"></div>

    <button id="btn-change" class="button">
        <img src="public/images/menu-aberto.png">
    </button>
</div>

<script src="public/scripts/leaflet.js"></script>

<script>
    // Definição do ícone de mapa
    var fireIcon = L.icon({
        iconUrl: 'public/images/fogueira.png',
        shadowUrl: '',
        iconSize: [32, 32],
        shadowSize: [50, 64],
        iconAnchor: [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    });

    <?php if (!empty($pockets)): ?>
        <?php foreach ($pockets as $pocket): ?>
            // Criação do conteúdo do popup
            var popupContent = `
                <div class="cardPoint">
                    <h2 id="h2Point"><?php echo htmlspecialchars($pocket['nome']); ?></h2>
                    <p id="pPoint" class="subtitle"><?php echo htmlspecialchars($pocket['descricao']); ?></p>
                    <p id="pPoint"><strong>Líder:</strong> <?php echo htmlspecialchars($pocket['lider']); ?></p>
                    <p id="pPoint"><strong>Dia:</strong> <?php echo htmlspecialchars($pocket['diaDaSemana']); ?></p>
                    <p id="pPoint"><strong>Horário:</strong> <?php echo htmlspecialchars($pocket['horario']); ?></p>
                    <button class="cta-button">
                        <a style="text-decoration: none; color: white;" href="https://www.instagram.com/<?php echo htmlspecialchars($pocket['instagram']); ?>">
                            Quero conhecer
                        </a>
                    </button>
                </div>
            `;

            <?php
            $latitude = floatval(htmlspecialchars($pocket['latitude']));
            $longitude = floatval(htmlspecialchars($pocket['longitude']));
            ?>

            // Criação do marcador no mapa com o ícone de fogueira
            var marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>], {
                icon: fireIcon
            }).addTo(map);
            marker.bindPopup(popupContent);
        <?php endforeach; ?>
    <?php endif; ?>
</script>



<?php include_once 'rodape.php'; ?>