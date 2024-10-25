<?php
$host = 'localhost';
$db = 'pocketslocations';
$user = 'root';
$pass = '';

// Conectar ao banco de dados usando mysqli
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Criar uma instância da classe Pocket
// $pocket = new Pocket($conn);

// Exemplo de uso: Criar um novo Pocket
// $pocket->create("Nome", "Descrição", "10.1234", "20.5678", "Líder", "Segunda-feira", "18:00", "@instagram");

// Fechar a conexão
// mysqli_close($conn);
?>
