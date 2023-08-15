<?php
// iniciando sessão

session_start();

if (isset($_POST['email']) && isset($_POST['senha'])) {
    // acessou

    include_once('config.php');

    $email = trim($_POST['email']);
    $password = trim($_POST['senha']);
    $errors = [];

    // Verificando se os parametros existem na db
    $stmt = $connect->prepare('SELECT email, senha FROM usuarios WHERE email = :email');
    $stmt->bindValue('email', $email, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $user_info = $stmt->fetch(PDO::FETCH_OBJ);
        if (isset($user_info->email) && isset($user_info->senha)) {
            if (password_verify($password, $user_info->senha)) {
                $_SESSION['email'] = $email; // caso encontre os dados na db, o email é armazenado na sessão
                $_SESSION['senha'] = $password; // caso encontre os dados na db, a senha é armazenada na sessão
                header('Location: sistema.php');
                exit;
            }
        }
        $errors[] = 'Email ou senha incorretos';
    }
    else {
        $errors[] = 'Falha ao conectar-se ao banco de dados!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    <form action="login.php" method="POST">
        <label for="">Seu email</label>
        <input required placeholder="Seu email" type="email" name="email" id="" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

        <label for="">Senha</label>
        <input type="password" name="senha" id="">

        <?php
            if (!empty($errors)) {
                foreach($errors as $error) {
                    echo "<span style='background: red; padding: 5px 15px; color: #ffff'><b>{$error}</b></span>" . PHP_EOL;
                }
            }
        ?>

        <input required class="btn-enviar" type="submit" name="submit" value="Enviar">

    </form>

    <a href="index.php">Cadastrar</a>
    
</body>
</html>