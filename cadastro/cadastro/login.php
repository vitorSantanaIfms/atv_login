<?php
session_start();

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Configurações de conexão
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

        // Verificar as credenciais do usuário no banco de dados
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE nome = ?');
        $stmt->execute([$nome]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            header('Location: sucesso.php');
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage();
    }
}

// Login falhou
header('Location: erro.php');
?>
