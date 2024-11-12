<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

require_once 'classes/Cadastro.php';

$cadastro = new Cadastro("localhost", "vagas", "root", "");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_vaga'])) {
    $idVaga = $_POST['id_vaga'];

    if ($cadastro->removerVaga($idVaga)) {
        echo "<p>Vaga removida com sucesso!</p>";
    } else {
        echo "<p>Erro ao remover a vaga.</p>";
    }
}

$vagas = $cadastro->listarVagas();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Vaga</title>
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

        select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
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

            select,
            input[type="submit"] {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Remover Vaga</h1>
        <form action="remover_vaga.php" method="POST">
            <label for="id_vaga">Selecione a Vaga para Remover:</label>
            <select id="id_vaga" name="id_vaga" required>
                <option value="">Selecione uma vaga</option>
                <?php
                foreach ($vagas as $vaga) {
                    echo "<option value='{$vaga['id']}'>{$vaga['nome_empresa']} - {$vaga['curso']}</option>";
                }
                ?>
            </select><br><br>

            <input type="submit" value="Remover Vaga">
        </form>

        <br><br>
        <button onclick="window.location.href='home.php';">Voltar</button>
    </div>

</body>
</html>
