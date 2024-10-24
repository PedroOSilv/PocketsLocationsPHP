<?php
class Pocket {
    private $conn;
    private $table = "pockets";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Função para adicionar um novo Pocket
    public function create($nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram) {
        $sql = "INSERT INTO {$this->table} (nome, descricao, latitude, longitude, lider, diaDaSemana, horario, instagram) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssss", $nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram);
        $stmt->execute();
        $stmt->close();
    }

    // Função para buscar todos os Pockets
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($sql);
        $pockets = [];

        while ($row = $result->fetch_assoc()) {
            $pockets[] = $row;
        }

        return $pockets;
    }

    // Função para buscar um Pocket por ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pocket = $result->fetch_assoc();
        $stmt->close();

        return $pocket;
    }

    // Função para atualizar um Pocket por ID
    public function update($id, $nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram) {
        $sql = "UPDATE {$this->table} 
                SET nome = ?, descricao = ?, latitude = ?, longitude = ?, lider = ?, diaDaSemana = ?, horario = ?, instagram = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $nome, $descricao, $latitude, $longitude, $lider, $diaDaSemana, $horario, $instagram, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Função para deletar um Pocket por ID
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
