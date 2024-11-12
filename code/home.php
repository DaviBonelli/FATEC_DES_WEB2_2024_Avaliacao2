<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 30px;
            text-align: center; 
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .page-header h1 {
            color: #333;
            font-size: 2em;
            text-align: center;
        }

        .options {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            background-color: #1a1a69;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2d2d9c;
        }

        .btn-logout {
            background-color: #e74c3c; /
            color: white;
            padding: 8px 16px; 
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
        }

        .btn-logout:hover {
            background-color: #c0392b; 
        }

        @media (max-width: 768px) {
            .options {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Olá, Bem-vindo!</h1>
        </div>
        <div class="options">
            <a href="cadastrar_vaga.php" class="btn">Cadastrar Vagas</a>
            <a href="remover_vaga.php" class="btn">Remover Vagas</a>
            <a href="listar_vaga.php" class="btn">Listar Vagas</a>
        </div>
        <a href="login.php" class="btn-logout">Logout</a>
    </div>
</body>
</html>
