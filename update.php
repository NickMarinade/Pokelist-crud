<?php
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$card = $cardRepository->find($id);
var_dump($card);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
    <script src="https://kit.fontawesome.com/7479bc5402.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">

    <h2 class="display-4 text-center">Edit a card</h2>
    <form method="POST" action="index.php?action=update">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $card['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" class="form-control" value="<?= $card['type'] ?>" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" name="weight" id="weight" class="form-control" value="<?= $card['weight'] ?>" required>
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" name="height" id="height" class="form-control" value="<?= $card['height'] ?>" required>
            </div>
            <div class="form-group">
                <label for="height">Id:</label>
                <input type="number" name="id" id="id" class="form-control" value="<?= $card['id'] ?>" required>
            </div>
            <input type="submit" value="Edit Pokemon" id="editPokemon" class="btn btn-info btn-block">
        </form>
    
</div>
</body>

</html>
