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

    <h2 class="display-4 text-center">Add a new card</h2>
    <form method="POST" action="?action=create">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" name="weight" id="weight" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" name="height" id="height" class="form-control" required>
            </div>
            <input type="submit" value="Add Pokemon" id="addPokemon" class="btn btn-info btn-block">
        </form>

    <h1 class="display-4 text-center">Pokémon cards collection</h1>

    <div class="row">
    <?php foreach ($cards as $card) : ?>
    <div class="card" style="width: 14rem;">
  <?= "<img src='data:image/png;base64," . base64_encode(getPokemonSprite($card['name'])) . "'>" ?>
  <div class="card-body">
    <h5 class="card-title"><?= $card['name'] ?></h5>
    <h5 class="card-title">Type: <?= $card['type'] ?></h5>
    <h5 class="card-title">Weight: <?= $card['weight'] ?></h5>
    <h5 class="card-title">Height: <?= $card['height'] ?></h5>
    <a href="?action=update&id=<?= $card['id']?>" class="btn btn-warning btn-sm edit">Edit</a>
    <a href="?action=delete&id=<?= $card['id']?>" class="btn btn-danger btn-sm delete">Delete</a>
  </div>
</div>
<?php endforeach; ?>
    </div>

    
</div>
</body>

</html>
