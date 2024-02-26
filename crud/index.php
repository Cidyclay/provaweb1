<?php
session_start();
if (!isset($_SESSION['auth'])) {
    // header('location: ../');
    http_response_code(403);
    exit();
}
$fp = fopen('paises.csv', 'r');
?>
<html lang="en">
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <style>
        h1 {
            text-align: center;
            margin-top: 50px;
        }

        td,
        th {
            padding: 15px;
            text-align: left;
            border-bottom: 5px solid black;
            border-radius: 10px;
        }

        table {
            margin: 20px auto;


        }

        form {
            text-align: center;
        }

        button {
            color: white;
            background-color: black;
            padding: 10px;
            border-radius: 50px;
        }
        input{
            color: white;
            background-color: black;
            padding: 10px;
            border-radius: 50px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>Países</h1>
    <table>
        <th>Nome</th>
        <th>Continente</th>
        <th>Idioma</th>
        <th>Moeda</th>
        <?php while (($row = fgetcsv($fp)) !== false) : ?>
            <table>

                <tr>
                    <td><?= $row[0] ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td><?= $row[3] ?></td>
                    <td>
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="pais" value="<?= $row[0] ?>">
                            <input type="hidden" name="continente" value="<?= $row[1] ?>">
                            <input type="hidden" name="idioma" value="<?= $row[2] ?>">
                            <input type="hidden" name="moeda" value="<?= $row[3] ?>">
                            <button>Editar País</button>
                        </form>
                    </td>
                    <td>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="pais" value="<?= $row[0] ?>">
                    <button>Excluir País</button>
                </form>
            </td>

            </table>
            </tr>
            </form>
</body>
<?php endwhile ?>
</table>
<form action="create.php" method="POST">
    <input type="text" name="pais" placeholder="pais">
    <input type="text" name="continente" placeholder="continente">
    <input type="text" name="idioma" placeholder="idioma">
    <input type="text" name="moeda" placeholder="moeda">
    <button>Salvar</button>
</form>
<form action="logout.php" method="GET">
    <button>Deslogar</button>
</form>

</html>