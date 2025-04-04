<?php
class Corretor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para cadastrar um corretor
    public function cadastrar($nome, $cpf, $creci) {
        try {
            $sql = "INSERT INTO corretores (name, cpf, creci) VALUES (:nome, :cpf, :creci)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':creci', $creci);
            return $stmt->execute(); // Retorna true se o cadastro for bem-sucedido
        } catch (PDOException $e) {
            error_log("Erro ao cadastrar corretor: " . $e->getMessage()); // Registra o erro no log
            return false; // Retorna false em caso de erro
        }
    }

    // Método para verificar se um CPF já existe
    public function cpfExiste($cpf) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM corretores WHERE cpf = ?");
            $stmt->execute([$cpf]);
            return $stmt->fetchColumn() > 0; // Retorna true se já existir
        } catch (PDOException $e) {
            error_log("Erro ao verificar CPF: " . $e->getMessage());
            return false;
        }
    }

    // Método para listar todos os corretores
    public function listar() {
        try {
            $sql = "SELECT * FROM corretores";
            return $this->pdo->query($sql)->fetchAll();
        } catch (PDOException $e) {
            error_log("Erro ao listar corretores: " . $e->getMessage());
            return [];
        }
    }

    // Método para excluir um corretor
    public function excluir($id) {
        try {
            $sql = "DELETE FROM corretores WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Erro ao excluir corretor: " . $e->getMessage());
            return false;
        }
    }

    // Método para editar um corretor
    public function editar($id, $nome, $cpf, $creci) {
        try {
            $sql = "UPDATE corretores SET name = ?, cpf = ?, creci = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$nome, $cpf, $creci, $id]);
        } catch (PDOException $e) {
            error_log("Erro ao editar corretor: " . $e->getMessage());
            return false;
        }
    }

    // Método para validar CPF
    public function validarCPF($cpf) {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11) return false;

        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        // Calcula os dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) return false;
        }
        return true;
    }
}
?>