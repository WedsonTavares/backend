<?php
class Corretor {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $cpf, $creci) {
        try {
            $sql = "INSERT INTO corretores (name, cpf, creci) VALUES (:nome, :cpf, :creci)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':creci', $creci);
            
            if ($stmt->execute()) {
                echo "✅ Cadastro realizado com sucesso!";
            } else {
                echo "❌ Erro ao cadastrar!";
            }
        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }
    }
    public function cpfExiste($cpf) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM corretores WHERE cpf = ?");
        $stmt->execute([$cpf]);
        return $stmt->fetchColumn() > 0; // Retorna true se já existir
    }
    
    
    public function listar() {
        $sql = "SELECT * FROM corretores";
        return $this->pdo->query($sql)->fetchAll();
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM corretores WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    public function editar($id, $name, $cpf, $creci) {
        $sql = "UPDATE corretores SET name = ?, cpf = ?, creci = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $cpf, $creci, $id]);
    }
}
?>
