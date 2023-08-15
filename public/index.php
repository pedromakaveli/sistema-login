<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

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

<?php

if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['senha'])) {  
    include_once('config.php');

    $errors = []; // Armazena uma lista de erros no formulário

    if (!($email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
        $errors[] = 'Campo "Email" inválido';
    }

    $name = ucwords(trim($_POST['nome']));

    if ($name === '') {
        $errors[] = 'Campo "Nome" vazio';
    }

    $city = ucwords(trim($_POST['cidade']));

    if ($city === '') {
        $errors[] = 'Campo "Cidade" vazio';
    }

    $state = ucwords(trim($_POST['estado']));

    if ($state === '') {
        $errors[] = 'Campo "Estado" vazio';
    }

    $password = trim($_POST['senha']);
    $password_length = strlen($password);

    if ($password_length < 8 || $password_length > 32) {
        $errors[] = 'A sua senha deve ter no minimo 8 caracteres e no máximo 32 caracteres';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $inject = $connect->prepare('INSERT INTO usuarios(email, cidade, estado, nome, senha) VALUES(?, ?, ?, ?, ?)');
        $inject->bindParam(1, $email);
        $inject->bindParam(2, $city);
        $inject->bindParam(3, $state);
        $inject->bindParam(4, $name);
        $inject->bindParam(5, $hashed_password);

        if ($inject->execute()) {
            echo "<span style='background: green; padding: 5px 15px; color: #ffff'><b>Cadastro realizado com sucesso!</b></span>". PHP_EOL;
        }
        else {
            echo "ERRO: <span style='background: red; padding: 5px 15px; color: #ffff'><b>Falha ao cadastrar. Erro no banco de dados!</b></span>". PHP_EOL;
        }
    }
    else {
        foreach($errors as $error) {
            echo "<span style='background: red; padding: 5px 15px; color: #ffff'><b>{$error}</b></span>". PHP_EOL;
        }
    }
}

?>

    <h1>Faça seu cadastro</h1>

    <form action="index.php" method="POST">
        <label for="">Seu email</label>
        <input placeholder="Seu email" type="text" name="email" id="" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

        <label for="">Sua cidade</label>
        <input required type="text" name="cidade" id="" value="<?php echo isset($_POST['cidade']) ? htmlspecialchars($_POST['cidade']) : '' ?>">
        
        <label for="">Estado</label>
        <input required type="text" name="estado" id="" value="<?php echo isset($_POST['estado']) ? htmlspecialchars($_POST['estado']) : '' ?>">

        <label for="">Seu nome</label>
        <input required type="text" name="nome" id="" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '' ?>">

        <label for="">Senha</label>
        <input type="password" name="senha" id="">


        <input required class="btn-enviar" type="submit" name="submit" value="Enviar">
    </form>
    
    <div>
    <a href="login.php">Login</a>
    </div>
</body>
</html>