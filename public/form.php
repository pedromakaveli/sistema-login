<?php
    if(isset($_POST['submit']) && !empty($_POST['e-mail']) && !empty($_POST['name']))
    {
        include_once('index.php');
        $email = $_POST['e-mail'];
        $nome = $_POST['name'];

        echo "<h1>Olá, {$nome} </h1>";
        echo '<br><hr>';
        echo "Seu email é: {$email}";
        echo '<br><hr>';
    }

    else
    {
        echo '<span>Por favor, insira os dados</span>';
        header('Location: index.php');
    }
?>