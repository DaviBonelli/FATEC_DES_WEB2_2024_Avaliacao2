<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .box {
            padding: 20px;
            text-align: center;
        }

        .textlogin {
            font-size: 1.8em;
            color: #1a1a69;
            margin-bottom: 20px;
        }

        img {
            width: 120px;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.1em;
            color: #555;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #1a1a69;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2d2d9c;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_fatec_araras.png" alt="Logo Fatec Araras">
            <h2 class="textlogin">Login</h2>
            <form action="login.php" method="POST">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" placeholder="Insira seu login" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Insira sua senha" required><br><br>
                <input class="botaoentrar" type="submit" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
