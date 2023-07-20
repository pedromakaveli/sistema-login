<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        $result = mysqli_query($connect, "INSERT INTO usuarios(email, cidade, estado, nome, senha) VALUES('$email', '$cidade', '$estado', '$nome', '$senha')");
        
        // mysqli_query utiliza a conexão da db da variavel $connect do arquivo config.php e insere os valores...
        // nos campos informados através do INSERT INTO
    
    }

    else {
        print_r('Você não preencheu todos os campos');
    }
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: 'arial', sans-serif;
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
            width: 40vw;
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

    <h1>Faça seu cadastro</h1>

    <form action="index.php" method="POST">
        <label for="">Seu email</label>
        <input require placeholder="Seu email" type="email" name="email" id="">

        <label for="">Sua cidade</label>
        <input require type="text" name="cidade" id="">
        
        <label for="">Estado</label>
        <input require type="text" name="estado" id="">

        <label for="">Seu nome</label>
        <input require type="text" name="nome" id="">

        <label for="">Senha</label>
        <input type="password" name="senha" id="">

        <input require class="btn-enviar" type="submit" name="submit" value="Enviar">
    </form>
    
    <div>
    <a href="login.php">Login</a>
    </div>
</body>
</html>