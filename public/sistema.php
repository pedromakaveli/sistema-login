<?php

    /* 
    
    Verifica se não existe a variavel 'email' na sessão com a negação ! acompanhada do isset
    Caso não exista (TRUE) e a senha não exista (TRUE), destrua os dados e redirecione para login.php
    Caso contrário e os dados estejam armazenados e validados, armazene o email na variavel logged 
    e prossiga
    
    **/

    session_start();

    print_r($_SESSION);

    if((!isset($_SESSION['email']) == TRUE) and (!isset($_SESSION['senha']) == TRUE))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logged = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Document</title>

    <style>
        a {
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar is-dark ">
        <ul class="navbar-menu">
            <li class="navbar-link"><a>Home</a></li>
            <li class="navbar-link"><a>Cadastro</a></li>
            <li class="navbar-link"><a>Deletar</a></li>
        </ul>
    </nav>

    <a href="sair.php">Sair</a>
</body>
</html>