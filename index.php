<?php
declare(strict_types=1); // php7 Muss die erste Anweisung in einer Datei sein
require_once 'inc/Character.class.php';
require_once 'inc/Heroes.class.php';
require_once 'inc/Specialattacks.class.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div class="wrapper">
        <header class="main-header">
            <h1>Kampf um Mittelerde</h1>
        </header>
        <main>
<?php
if (!count($_POST)) {
    echo '<h3>Wähle eine Helden</h3>';
    echo '<form action="" method="post" >';
    echo '<div class="pure-g">';
    echo '<div class="pure-u-1-3">';
    echo "<p><img src='img/human.jpg' width=60% height= 60% /></p>";
    echo '<p><button typ="submit" name="button" value="Human" class="pure-button">Jäger (Mensch)</button></p></div>';
    echo '<div class="pure-u-1-3">';
    echo "<p><img src='img/elf.png' width=70% height= 70% /></p>";
    echo '<p><button typ="submit" name="button" value="Elf" class="pure-button">Zauberer (Elf)</button></p></div>';
    echo '<div class="pure-u-1-3">';
    echo "<p><img src='img/Dwarf.jpg' width=88% height= 88% /></p>";
    echo '<p><button typ="submit" name="button" value="Dwarf" class="pure-button">Krieger (Zwerg)</button></p></div>';
    echo '</div></form>';
} 
if (count($_POST)) {
    if (isset($_POST["button"])) {
        switch ($_POST["button"]) {
            case 'Elf':
                $hero = new $_POST["button"]('Legolas');
                break;
            case 'Human':
                $hero = new $_POST["button"]('Boromir');
                break;
            case 'Dwarf':
                $hero = new $_POST["button"]('Gimli');
                break;
            default:
                $hero = new Dwarf('Gimli');
                break;
        }
        $enemy = new Character('Smaug', 500, 100, 100);
    }
    if (isset($_POST["action"])) {
        $hero = new $_POST["typ"]($_POST["name"], (int)$_POST["lp"], (int)$_POST["strenght"], (int)$_POST["stamina"]);
        $enemy = new Character('Smaug', 500, 100, 100);
        switch ($_POST["action"]) {
            case 'attack':
                $hero->fight();
                break;
            case 'specialAttack':
                $hero->specialAttack();
                break;
            case 'defend':
                $hero->defend();
                break;
            default:
                $hero->fight();
                break;
        }
    }
    echo '<form action="" method="post" >';
    echo '<div class="pure-g">';
    echo '<div class="pure-u-1-2">';
    echo "<p><img src='img/{$hero->getPicture()}' width=60% height= 60% /></p>";
    echo '<h3>Wähle eine Aktion</h3>';
    $typ = get_class($hero);
    echo "<input name='typ' type='text' value='$typ' hidden>";
    echo "<input name='name' type='text' value='{$hero->getName()}' hidden>";
    echo "<input name='lp' type='number' value={$hero->getHealth()} hidden>";
    echo "<input name='stamina' type='number' value={$hero->getStamina()} hidden>";
    echo "<input name='strenght' type='number' value={$hero->getStrenght()} hidden>";
    echo '<p><button typ="submit" name="action" value="attack" class="pure-button">Angriff</button></p>';
    echo '<p><button typ="submit" name="action" value="specialAttack" class="pure-button">Spezialfähigkeit</button></p>';
    echo '<p><button typ="submit" name="action" value="defend" class="pure-button">Blocken</button></p>';
    echo '</div>';
    echo '<div class="pure-u-1-2">';
    echo "<p><img src='img/{$enemy->getPicture()}' width=70% height= 70% /></p>";
    //  $type = $_POST["type"] ?? $_POST["button"];
    $hero->getHeroStats();
    $enemy->getEnemyStats();
    echo '<div>';
    echo '</div></form>';
}
/*
    // Hero erstellen
    $human = new Human('Boromir');
    var_dump($human);
    $dwarf = new Dwarf('Gimli');
    var_dump($dwarf);
    $elf = new Elf('Legolas');
    var_dump($dwarf);
    $human->fight();
    $elf->healSpell();
    $human->sneakAttack();
    $dwarf->furyAttack();
    echo "{$elf->getName()} hat {$elf->getHealth()} Lebenspunkte<br>";
            // var_dump($hero);
            // Feind erstellen
    $enemy = new Character('Smaug', 500, 100, 100);
    $enemy->flee();
*/
    ?>
        </main>
    </div>
</body>
</html>
