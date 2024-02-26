<?php
session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    // header('location /);
    http_response_code(403);
    exit();
}

$pais = $_POST['pais'];
$continente = $_POST['continente'];
$idioma = $_POST['idioma'];
$moeda = $_POST['moeda'];

$fp = fopen('paises.csv', 'r');

while (($row = fgetcsv($fp)) !== false) {

    if ($row[0] == $pais) {
        header('location: index.php');
        exit();
    }
}


$fp = fopen('paises.csv', 'a');
fputcsv($fp, [$pais, $continente, $idioma, $moeda]);
header('location: index.php');
