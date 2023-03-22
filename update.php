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
    <form method="POST" action="">
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
            <input type="submit" name="submit" value="Edit Pokemon" id="editPokemon" class="btn btn-info btn-block">
        </form>
    
</div>
</body>

</html>
