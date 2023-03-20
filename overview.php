<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>

<body>

    <h1>Pokémon cards collection</h1>

    <ul>
        <?php foreach ($cards as $card) : ?>
            <li><?= $card['name'] ?></li>
            <li>Type:<?= $card['type'] ?></li>
            <li>Weight:<?= $card['weight'] ?></li>
            <li>Height:<?= $card['height'] ?></li>
            <br>
        <?php endforeach; ?>
    </ul>

    <h2>Add a new card</h2>
    <form method="POST" action="action=create">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Type:</label><br>
        <input type="text" name="type"><br>
        <label>Weight:</label><br>
        <input type="text" name="weight"><br>
        <label>Height:</label><br>
        <input type="text" name="height"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>