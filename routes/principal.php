<?php
require_once '../config/dbconnection.php';
require_once '../models/Pockets.php';

$pocket = new Pocket($conn);

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

ini_set('display_errors', 0); // Não exibir erros na saída
ini_set('log_errors', 1); // Habilitar log de erros
ini_set('error_log', __DIR__ . '/error.log'); // Definir o arquivo de log de erros
error_reporting(E_ALL); // Relatar todos os erros


switch ($request) {

    case '/':
        if ($method == 'GET') {
            $pockets = $pocket->getAll();
            include '../views/index.php'; // Arquivo de visualização
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
}
