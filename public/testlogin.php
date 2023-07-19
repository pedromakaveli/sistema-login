<?php

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
            header('Location: sistema.php');
        }

        else {
            header('Location: login.php');
        }
        
    }

    else {
        // Não acesso

        header('Location: login.php');
        
        
    }

?>