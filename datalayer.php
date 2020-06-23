<?php


function openDatabaseConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=pokemons", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function Insertinto($data)
{
    $conn = openDatabaseConnection();
    $query = $conn->prepare("INSERT INTO `pokemons` (name, energytype, health, attack_1, attack_1_damage, attack_2, attack_2_damage, weakness, weakness_multiplier, resistance, resistance_value ) VALUES ('" . implode("','", $data) . "')");
    $query->execute();
    echo '<script>window.location="index.php"</script>';
    $conn = null;
}

function createallpokemon()
{

    $conn = openDatabaseConnection();
    $query = $conn->prepare("SELECT * FROM `pokemons`");

    if ($query->execute()) {
        $result = $query->fetchAll();
        $conn = null;
        $pokedex = [];

        if (!empty($result)) {
            foreach ($result as $pokemon) {
                $pokedex[$pokemon['name']] = new Pokemon(
                    $pokemon['id'],
                    '' . $pokemon['name'] . '',
                    new Energytype("" . $pokemon['energytype'] . ""),
                    $pokemon['health'],
                    [new Attack('' . $pokemon['attack_1'] . '', $pokemon['attack_1_damage']), new Attack('' . $pokemon['attack_2'] . '', $pokemon['attack_2_damage'])],
                    new Weakness("" . $pokemon['weakness'] . "", $pokemon['weakness_multiplier']),
                    new Resistance(new Energytype("" . $pokemon['resistance'] . ""), $pokemon['resistance_value'])

                );
            }
            return $pokedex;
        }
    } else {
        $message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    }
}


function getpokemonfromid($id)
{
    $conn = openDatabaseConnection();
    $query = $conn->prepare("SELECT * FROM `pokemons` WHERE id = :id");

    if ($query->execute([':id' => $id])) {
        $result = $query->fetch();
        $conn = null;
        return $result;
    } else {
        $message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    }
}

function updatePokemon($data)
{
    $conn = openDatabaseConnection();
    $query = $conn->prepare('UPDATE `pokemons` SET name = :name, energytype = :energytype, health = :health, attack_1 = :attack1,
     attack_1_damage = :attack1damage, attack_2 = :attack2, attack_2_damage = :attack2damage, weakness = :weakness,
      weakness_multiplier = :weaknessmultiplier, resistance = :resistance, resistance_value = :resistancevalue WHERE id = :id');

    if ($query->execute([
        ':name' => $data['name'], ':energytype' => $data['energytype'], ':health' => $data['health'],
        ':attack1' => $data['attack_1'], ':attack1damage' => $data['attack_1_damage'], ':attack2' => $data['attack_2'],
        ':attack2damage' => $data['attack_2_damage'], ':weakness' => $data['weakness'], ':weaknessmultiplier' => $data['weakness_multiplier'],
        ':resistance' => $data['resistance'], ':resistancevalue' => $data['resistance_value'], ':id' => $data['id']
    ])) {
        $conn = null;
        $message = "welloe broer goeie hij doet het";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    } else {
        $message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    }
}

function deletePokemon($data) {
    $conn = openDatabaseConnection();
    $query = $conn->prepare('DELETE FROM `pokemons` WHERE id = :id');
    $query->execute([':id'=>$data['id']]);
    $conn = null;
    $message = "welloe broer goeie hij doet het";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";

}











































?>





<!-- id
name
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