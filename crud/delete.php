<?php 
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !==true){
    http_response_code(403);
    exit();
}

$pais = $_POST['pais'];

$tempFile = tempnam('.', '');

$fpOriginal = fopen('paises.csv','r');
$fpTemp = fopen($tempFile,'w');

while (($row = fgetcsv($fpOriginal)) !==false){
    if($row[0] !== $pais){
        fputcsv($fpTemp, $row);
    }
}
fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'paises.csv');

header('location: index.php');
