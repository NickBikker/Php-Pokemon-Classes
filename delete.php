<?php
require 'datalayer.php';
require 'energytype.php';
$id = $_GET['id'];
$data = getpokemonfromid($id);

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>edit</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="function.php?action=deletePokemon">
                    <input readonly="true" name="id" value=<?=$id?> type="hidden">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input readonly="true" type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Energytype</label>
                        <select readonly="true" class="form-control" id="energytype" name="energytype">
                            <?php
                            foreach ($energytypes as $energytype) { ?>
                                <option value='<?= $energytype->getName() ?>' <?= ($data['energytype'] == $energytype->getName() ? 'selected' : '') ?>><?= $energytype->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">health</label>
                        <input readonly="true" type="text" class="form-control" id="health" name="health" value="<?= $data['health'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Attack 1</label>
                                <input readonly="true" type="text" class="form-control" id="attack1" name="attack_1" value="<?= $data['attack_1'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">attack 1 damage</label>
                                <input readonly="true" type="text" class="form-control" id="attack1damage" name="attack_1_damage" value="<?= $data['attack_1_damage'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Attack 2</label>
                                <input readonly="true" type="text" class="form-control" id="attack2" name="attack_2" value="<?= $data['attack_2'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">attack 2 damage</label>
                                <input readonly="true" type="text" class="form-control" id="attack2damage" name="attack_2_damage" value="<?= $data['attack_2_damage'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Weakness</label>
                            <select readonly="true" class="form-control" id="weakness" name="weakness">
                                <?php
                                foreach ($energytypes as $energytype) { ?>
                                    <option value='<?= $energytype->getName() ?>' <?= ($data['weakness'] == $energytype->getName() ? 'selected' : '') ?>><?= $energytype->getName() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Weakness multiplier</label>
                                <input readonly="true" type="text" class="form-control" id="weaknessmultiplier" name="weakness_multiplier" value="<?= $data['weakness_multiplier'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Resistance</label>
                            <select readonly="true" class="form-control" id="resistance" name="resistance">
                                <?php
                                foreach ($energytypes as $energytype) { ?>
                                    <option value='<?= $energytype->getName() ?>' <?= ($data['resistance'] == $energytype->getName() ? 'selected' : '') ?>><?= $energytype->getName() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Resistance value</label>
                                <input readonly="true" type="text" class="form-control" id="resistancevalue" name="resistance_value" value="<?= $data['resistance_value'] ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>

    </div>

</body>

</html>