<?php
require 'pokemon.php';
require 'energytype.php';
require 'weakness.php';
require 'attack.php';
require 'resistance.php';
require 'datalayer.php';

$energytypes = [
    'lightning' => new Energytype("Lightning"),
    'fire' => new Energytype("Fire"),
    'water' => new Energytype("Water"),
    'fighting' => new Energytype("Fighting"),
    'normal' => new EnergyType("Normal"),
    'grass' => new EnergyType("Grass"),
    'ice' => new EnergyType("Ice"),
    'poison' => new EnergyType("Poison"),
    'ground' => new EnergyType("Ground"),
    'flying' => new EnergyType("Flying"),
    'bug' => new EnergyType("Bug"),
    'rock' => new EnergyType("Rock"),
    'ghost' => new EnergyType("Ghost"),
    'dragon' => new EnergyType("Dragon"),
    'dark' => new EnergyType("Dark"),
    'steel' => new EnergyType("Steel"),
    'fairy' => new EnergyType("Fairy")
];

// $new_pokemon = new Pokemon(
//     $pokemonName, 
//     $energyTypeObject, 
//     $hitPoints, 
//     $attackArray, 
//     $weaknessObject, 
//     $resistanceObject
// );

$pokedex = createallpokemon();

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Pokemon maken
                </button>
            </div>
            <div class="col-md-6">
               <?php $pokedex['Charmeleon']->attack($pokedex['Pikachu'], $pokedex['Charmeleon']->attack[1]); ?><br>
                <?php $pokedex['Pikachu']->attack($pokedex['Charmeleon'], $pokedex['Pikachu']->attack[1]); ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($pokedex as $pokemon) {
                    $pokemon->getPopulation();
                } ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pokemon toevoegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="insert.php?action=Insertinto">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Energytype</label>
                            <select class="form-control" id="energytype" name="energytype">
                                <?php
                                foreach ($energytypes as $energytype) { ?>
                                    <option value='<?= $energytype->name ?>'><?= $energytype->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">health</label>
                            <input type="text" class="form-control" id="health" name="health">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Attack 1</label>
                                    <input type="text" class="form-control" id="attack1" name="attack_1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">attack 1 damage</label>
                                    <input type="text" class="form-control" id="attack1damage" name="attack_1_damage">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Attack 2</label>
                                    <input type="text" class="form-control" id="attack2" name="attack_2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">attack 2 damage</label>
                                    <input type="text" class="form-control" id="attack2damage" name="attack_2_damage">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Weakness</label>
                                <select class="form-control" id="weakness" name="weakness">
                                    <?php
                                    foreach ($energytypes as $energytype) { ?>
                                        <option value='<?= $energytype->name ?>'><?= $energytype->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weakness multiplier</label>
                                    <input type="text" class="form-control" id="weaknessmultiplier" name="weakness_multiplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Resistance</label>
                                <select class="form-control" id="resistance" name="resistance">
                                    <?php
                                    foreach ($energytypes as $energytype) { ?>
                                        <option value='<?= $energytype->name ?>'><?= $energytype->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Resistance value</label>
                                    <input type="text" class="form-control" id="resistancevalue" name="resistance_value">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>


<!-- name
energytype
health
attack 1
attack 1 damage
attack 2
attack 2 damage
weakness
weakness multiplier
resistance
resistance value -->