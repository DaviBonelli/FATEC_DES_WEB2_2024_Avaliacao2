<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

require_once 'classes/Cadastro.php';

$cadastro = new Cadastro("localhost", "vagas", "root", "");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomeEmpresa = $_POST['nome_empresa'];
    $numeroWhatsapp = $_POST['numero_whatsapp'];
    $emailContato = $_POST['email_contato'];
    $descritivoVaga = $_POST['descritivo_vaga'];
    $curso = $_POST['curso'];

    if ($cadastro->cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso)) {
        echo "<p>Vaga cadastrada com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar a vaga.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vaga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #1a1a69;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1.1em;
            color: #555;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #1a1a69;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2d2d9c;
        }

        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d32f2f;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            label {
                font-size: 1em;
            }

            input[type="text"],
            input[type="email"],
            textarea,
            select,
            input[type="submit"] {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cadastro de Vaga</h1>
        <form action="cadastrar_vaga.php" method="POST">
            <label for="nome_empresa">Nome da Empresa:</label>
            <input type="text" id="nome_empresa" name="nome_empresa" required><br>

            <label for="numero_whatsapp">Número do WhatsApp:</label>
            <input type="text" id="numero_whatsapp" name="numero_whatsapp" required><br>

            <label for="email_contato">E-mail de Contato:</label>
            <input type="email" id="email_contato" name="email_contato" required><br>

            <label for="descritivo_vaga">Descrição da Vaga:</label><br>
            <textarea id="descritivo_vaga" name="descritivo_vaga" rows="4" required></textarea><br>

            <label for="curso">Curso:</label>
            <select id="curso" name="curso" required>
                <option value="1">DSM</option>
                <option value="2">GE</option>
            </select><br><br>

            <input type="submit" value="Cadastrar Vaga">
        </form>

        <button onclick="window.location.href='home.php';">Voltar</button>
    </div>

</body>
</html>
