<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
        }

        form {
            text-align: left;
            padding: 10px;
        }

        form input {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            padding: 12px;
            width: 100%;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form action="processa_cadastro.php" method="post">
            Nome: <input type="text" name="nome"><br>
            Senha: <input type="password" name="senha"><br>
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já tem uma conta? <a href="index.php">Voltar para o login</a></p>
    </div>
</body>
</html>

