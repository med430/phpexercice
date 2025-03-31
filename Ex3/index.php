<?php
include_once('autoloader.php');

$pokemon = new PokemonFeu("Picacho", "./img/picacho.jpg", 200, new AttackPokemon(10, 100, 2, 50));

$plante = new PokemonPlante("Forestsaurus", "./img/forestsaurus.png", 200, new AttackPokemon(30, 80, 4, 40));

$combat = new Combat($pokemon, $plante);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Pokemon</title>
</head>
<body>
    <div class="container">
        <?php
            $combat->combatComplete();
        ?>
    </div>
</body>
</html>