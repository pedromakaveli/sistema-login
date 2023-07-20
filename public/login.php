<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de cadastro</title>

    <style>
        body {
            font-family: 'arial', sans-serif;
            height: 100vh;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-content: center;
            align-items: center;
            flex-flow: column wrap;
        }

        h1 {
            color: #606060;
            text-transform: uppercase;
            font-size: 1.5rem;
        }

        form {
            display: flex;
            flex-flow: column wrap;

            gap: 5.7px;
        }

        form label {
            font-size: 0.96rem;
            color: #606060;
        }

        form input{
            border-radius: 5px;
            border: 1px solid #d4d4d4;
            padding: 10px 15px;
            margin-bottom: 15px;
        }

        .btn-enviar {
            border: none;
            background: #0080FF;
            color: #ffffff;
            padding: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-enviar:hover {
            background: #8000FF;
        }
    </style>
</head>
<body>

    <h1>Faça seu login</h1>

    <form action="testlogin.php" method="POST">
        <label for="">Seu email</label>
        <input required placeholder="Seu email" type="email" name="email" id="">

        <label for="">Senha</label>
        <input type="password" name="senha" id="">

        <input required class="btn-enviar" type="submit" name="submit" value="Enviar">

    </form>

    <a href="index.php">Cadastrar</a>
    
</body>
</html>