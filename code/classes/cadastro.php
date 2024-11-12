<?php
class Cadastro {
    private $conn;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso) {
    
        $sql = "INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) 
                VALUES (:nome_empresa, :numero_whatsapp, :email_contato, :descritivo_vaga, :curso)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome_empresa', $nomeEmpresa);
        $stmt->bindParam(':numero_whatsapp', $numeroWhatsapp);
        $stmt->bindParam(':email_contato', $emailContato);
        $stmt->bindParam(':descritivo_vaga', $descritivoVaga);
        $stmt->bindParam(':curso', $curso);
        return $stmt->execute();
    }
    
    public function removerVaga($id) {
        $sql = "DELETE FROM vagas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarVagas() {
        $sql = "SELECT * FROM vagas";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
