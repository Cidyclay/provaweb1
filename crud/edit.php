<?php

session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {

    http_response_code(403);
    exit();
}
$fp = fopen('paises.csv', 'r');

$pais = $_POST['pais'];


$continente = $_POST['continente'];

$idioma = $_POST['idioma'];

$moeda = $_POST['moeda'];

$achou = false;
while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $pais) {
        $achou = true;
        $ano = $row[1];
        $horas = $row[2];
    }
}

if (!$achou) {
    header('location : index.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

input{
            color: white;
            background-color: black;
            padding: 10px;
            border-radius: 50px;
        }
        button {
            color: white;
            background-color: black;
            padding: 10px;
            border-radius: 50px;
        }
       

</style>

<body>

    <form action="update.php" method="POST">
        <input type="text" name="pais" value="<?= $pais ?>" readonly>
        <input type="text" name="continente" value="<?= $continente ?>">
        <input type="text" name="idioma" value="<?= $idioma ?>">
        <input type="text" name="moeda" value="<?= $moeda ?>">
        <button>Salvar</button>
    </form>
    <a href="index.php"> <button>Cancelar</button></a>
</body>

</html>