# Cadastro de Corretores

Este projeto é um sistema de cadastro de corretores desenvolvido com **PHP**, **MySQL**, **JavaScript** e **HTML/CSS**, utilizando uma arquitetura **MVC simplificada**.

## 📌 Funcionalidades

✔ Cadastro de corretores com os campos: **Nome, CPF e CRECI**  
✔ Validação dos campos no **frontend (JavaScript)** e **backend (PHP)**  
✔ Listagem de corretores em uma tabela  
✔ Edição de corretores carregando os dados no formulário  
✔ Exclusão de corretores  
✔ Feedback de operações (sucesso ou erro)  
✔ Persistência de dados no **MySQL**

---

## 🚀 Tecnologias Utilizadas

- **PHP** (para a lógica do backend e integração com MySQL)
- **MySQL** (banco de dados relacional para armazenar os corretores)
- **JavaScript** (validação no frontend e manipulação do DOM)
- **HTML & CSS** (estrutura e estilização do formulário e da tabela)

---

## 🛠 Como Configurar o Projeto

### 1️⃣ Clone o repositório:
```sh
git clone https://github.com/WedsonTavares/backend.git
cd backend
```

### 2️⃣ Configure o banco de dados:
Crie um banco de dados no MySQL e execute o seguinte script SQL:
```sql
CREATE DATABASE corretores_db;
USE corretores_db;

CREATE TABLE corretores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    creci VARCHAR(50) NOT NULL
);
```

### 3️⃣ Configure a conexão com o banco de dados:
No arquivo `config/database.php`, edite as credenciais de acesso ao MySQL:
```php
$host = 'localhost';
$dbname = 'corretores_db';
$username = 'seu_usuario';
$password = 'sua_senha';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
```

### 4️⃣ Inicie o servidor local:
Se estiver usando PHP embutido:
```sh
php -S localhost:8000 -t public
```
Acesse `http://localhost:8000` no navegador.

---

## 🎯 Funcionalidades Implementadas

- [x] Cadastro de corretores
- [x] Listagem de corretores em tabela
- [x] Edição de registros
- [x] Exclusão de registros
- [x] Validação no frontend (JavaScript)
- [x] Validação no backend (PHP)

