<?php
require 'pokemon.php';
require 'energytype.php';
require 'weakness.php';
require 'attack.php';
require 'resistance.php';

$energytypes = [
    'lightning' => new Energytype("Lightning"),
    'fire' => new Energytype("Fire"),
    'water' => new Energytype("Water"),
    'fighting' => new Energytype("Fighting")
];

// $new_pokemon = new Pokemon(
//     $pokemonName, 
//     $energyTypeObject, 
//     $hitPoints, 
//     $attackArray, 
//     $weaknessObject, 
//     $resistanceObject
// );

$pikachu = new Pokemon(
    'Pikachu',
    $energytypes['lightning'],
    50,
    [new Attack('pikapunch', 20), new Attack('electric ring', 50)],
    new Weakness($energytypes['fire'], 1.5),
    new Resistance($energytypes['fighting'], 20)

);

$charmeleon = new Pokemon(
    'Charmeleon',
    $energytypes['fire'],
    60,
    [new Attack('head butt', 10), new Attack('flare', 30)],
    new Weakness($energytypes['water'], 2),
    new Resistance($energytypes['lightning'], 10)

);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>index</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php $pikachu->attack($charmeleon, $pikachu->attack[0]); ?>
            </div>
            <div class="col-md-6">
                <?php $charmeleon->attack($pikachu, $charmeleon->attack[0]); ?>
            </div>
        </div>
    </div>
</body>


</html>



