<?php
    // iniciando sessão

    session_start();
    
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
        {
        // acessou

        include_once('config.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        print_r($email);
        print_r($senha);
        // Verificando se os parametros existem na db

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $connect->query($sql);

        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['email'] = $email; // caso encontre os dados na db, o email é armazenado na sessão
            $_SESSION['senha'] = $senha; // caso encontre os dados na db, a senha é armazenada na sessão

            header('Location: sistema.php'); // redireciona para o sistema.php
        }

        else {
            unset($_SESSION['email']); // destroi o email caso não encontre na db
            unset($_SESSION['senha']); // destroi a senha caso nao encontre na db

            header('Location: login.php');
        }
        
    }

    else {
       // Não acesso

        header('Location: login.php');
        
        
    }

?>