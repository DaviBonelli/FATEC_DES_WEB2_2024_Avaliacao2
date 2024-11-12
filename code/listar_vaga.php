<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

require_once 'classes/Cadastro.php';

$cadastro = new Cadastro("localhost", "vagas", "root", "");
$vagas = $cadastro->listarVagas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vagas</title>
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
            max-width: 900px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #1a1a69;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #1a1a69;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .btn-voltar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c; 
            color: white;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .btn-voltar:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listar Vagas Cadastradas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Empresa</th>
                    <th>WhatsApp</th>
                    <th>E-mail de Contato</th>
                    <th>Descrição da Vaga</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($vagas)) {
                    foreach ($vagas as $vaga) {
                        echo "<tr>";
                        echo "<td>{$vaga['id']}</td>";
                        echo "<td>{$vaga['nome_empresa']}</td>";
                        echo "<td>{$vaga['numero_whatsapp']}</td>";
                        echo "<td>{$vaga['email_contato']}</td>";
                        echo "<td>{$vaga['descritivo_vaga']}</td>";
                        echo "<td>" . ($vaga['curso'] == 1 ? 'DSM' : 'GE') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhuma vaga cadastrada</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="home.php" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>
