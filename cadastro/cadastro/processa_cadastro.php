<?php
session_start();

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Configurações de conexão (use as mesmas configurações do login.php)
    $config = array(
        'host' => 'localhost',
        'dbname' => 'marcus_vieira',
        'usuario' => 'Marcus-Externo',
        'senha' => '12345678'
    );

    try {
        // Conectar ao servidor MySQL
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $pdo = new PDO($dsn, $config['usuario'], $config['senha']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Criar hash da senha
        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

        // Armazenar os dados no banco de dados
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, senha) VALUES (?, ?)');
        $stmt->execute([$nome, $hashSenha]);

        // Redirecionar de volta para a página de login após o cadastro
        header('Location: index.php');
    } catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage();
    }
} else {
    echo 'Por favor, preencha todos os campos.';
}
?>
