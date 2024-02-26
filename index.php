<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="Login">



        <h1>Bem vindo!!</h1>
        <?php if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) : ?>

            <h2> Faça o login</h2>
            <form action="auth.php" method="POST">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="senha" placeholder="senha">
                <button>Enviar</button>
            </form>
        <?php else : ?>
                <h2>Você já está logado!!</h2>
                <a style="color:white" href="crud\logout.php">Sair</a>
            <a style="color:white;margin-left: 5%;" href="crud/">Acessar o CRUD</a>
        <?php endif ?>
    </div>
</body>

</html>