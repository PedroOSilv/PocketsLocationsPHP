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

$preposition = '/PocketsLocationsPHP/';

switch ($request) {

    case $preposition:
        
        if ($method == 'GET') {
            $pockets = $pocket->getAll();
            // echo "GET";
            include_once 'views/index.php'; // Arquivo de visualização
        } else {
        }
        break;
    
    case "/PocketsLocationsPHP/addpockets":
        if ($method == 'GET') {
            include_once 'views/addpockets.php'; // Arquivo de visualização
        }
        break;

    case '/PocketsLocationsPHP/novo':
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
            header("Location: /PocketsLocationsPHP/"); // Redirecionar após adicionar
        }
        break;

    case '/PocketsLocationsPHP/login':
        if ($method == 'GET') {
            include_once 'views/login.php'; // Arquivo de visualização
        }
        break;

    case '/PocketsLocationsPHP/listaAdmin':
        if ($method == 'GET') {
            $pockets = $pocket->getAll();
            include_once 'views/listaAdmin.php'; // Arquivo de visualização
        }
        break;
    
    case '/PocketsLocationsPHP/del':
        if ($method == 'POST') {
            $id = $_POST['id'];
            $pocket->delete($id);
            header("Location: /PocketsLocationsPHP/listaAdmin"); // Redirecionar após deletar
        }
        break;

    case '/PocketsLocationsPHP/edit':
        if ($method == 'POST') {
            $id = $_POST['id'];
            $p = $pocket->getById($id);
            include_once 'views/editpockets.php'; // Arquivo de visualização
        }
        break;

    case '/PocketsLocationsPHP/update':
        if ($method == 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $lider = $_POST['lider'];
            $diaDaSemana = $_POST['diaDaSemana'];
            $horario = $_POST['horario'];
            $instagram = $_POST['instagram'];

            $pocket->update($id, $nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram);
            header("Location: /PocketsLocationsPHP/listaAdmin"); // Redirecionar após editar
        }
        break;

    default:
        http_response_code(404);
        echo '404 - Not Found';
        break;
}
