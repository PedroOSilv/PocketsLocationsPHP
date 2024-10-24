<?php
include_once 'models/Pocket.php';
include_once 'config/dbconnection.php';

$pocket = new Pocket($conn);

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

ini_set('display_errors', 0); // Não exibir erros na saída
ini_set('log_errors', 1); // Habilitar log de erros
ini_set('error_log', __DIR__ . '/error.log'); // Definir o arquivo de log de erros
error_reporting(E_ALL); // Relatar todos os erros

echo "Requisição: $request<br>";

switch ($request) {

    case '/PocketsLocationsPHP/':
        
        if ($method == 'GET') {
            $pockets = $pocket->getAll();
            include_once 'views/index.php'; // Arquivo de visualização
        } else {
        }
        break;

    case '/novo':
        if ($method == 'POST') {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $lider = $_POST['lider'];
            $diaDaSemana = $_POST['diaDaSemana'];
            $horario = $_POST['horario'];
            $instagram = $_POST['instagram'];

            $pocket->create($nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram);
            header("Location: /"); // Redirecionar após adicionar
        }
        break;

    default:
        http_response_code(404);
        echo '404 - Not Found';
        break;
}
