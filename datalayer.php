<?php


function openDatabaseConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";


try {
    $conn = new PDO("mysql:host=$servername;dbname=pokemons", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

function Insertinto($data) {
   $conn = openDatabaseConnection();
   $query = $conn->prepare("INSERT INTO `pokemon stats` (name, energytype, health, attack_1, attack_1_damage, attack_2, attack_2_damage, weakness, weakness_multiplier, resistance, resistance_value ) VALUES ('".implode("','", $data)."')");
   $query->execute();
   echo '<script>window.location="index.php"</script>';
   $conn = null;

}

function createallpokemon(){

    $conn = openDatabaseConnection();
    $query = $conn->prepare("SELECT * FROM `pokemon stats`");

    if ($query->execute()) {
        $result = $query->fetchAll();
        $conn = null;
        $pokedex = [];

        if(!empty($result)) {
            foreach ($result as $pokemon){
                $pokedex[$pokemon['name']] = new Pokemon(
                    $pokemon['id'],
                    ''.$pokemon['name'].'',
                    new Energytype("".$pokemon['energytype'].""),
                    $pokemon['health'],
                    [new Attack(''.$pokemon['attack_1'].'', $pokemon['attack_1_damage']), new Attack(''.$pokemon['attack_2'].'', $pokemon['attack_2_damage'])],
                    new Weakness(new Energytype("".$pokemon['weakness'].""), $pokemon['weakness_multiplier']),
                    new Resistance(new Energytype("".$pokemon['resistance'].""), $pokemon['resistance_value'])
                
                );
            }
            return $pokedex;
        }



    } else {
        $message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    }

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