<?php
declare(strict_types=1); // php7 Muss die erste Anweisung in einer Datei sein
require_once 'inc/Character.class.php';
require_once 'inc/Heroes.class.php';
require_once 'inc/Specialattacks.class.php';
$args = array(
    'typ'   => FILTER_SANITIZE_STRING,
    'name'    => FILTER_SANITIZE_STRING,
    'lp'     => FILTER_SANITIZE_NUMBER_INT,
    'stamina' => FILTER_SANITIZE_NUMBER_INT,
    'strenght'   => FILTER_SANITIZE_NUMBER_INT,
    'isActive'   => FILTER_SANITIZE_NUMBER_INT,
    'enemy_typ'   => FILTER_SANITIZE_STRING,
    'enemy_name'   => FILTER_SANITIZE_STRING,
    'enemy_lp'   => FILTER_SANITIZE_NUMBER_INT,
    'enemy_stamina'   => FILTER_SANITIZE_NUMBER_INT,
    'enemy_strenght'   => FILTER_SANITIZE_NUMBER_INT,
    'action'   => FILTER_SANITIZE_STRING,
    'button'   => FILTER_SANITIZE_STRING,
);

$post = filter_input_array(INPUT_POST, $args);
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
//var_dump($post);
//var_dump($post);

if (!count($post)) {
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
if (count($post)) {
    if (isset($post["button"])) {
        switch ($post["button"]) {
            case 'Elf':
                $hero = new $post["button"]('Legolas');
                break;
            case 'Human':
                $hero = new $post["button"]('Boromir');
                break;
            case 'Dwarf':
                $hero = new $post["button"]('Gimli');
                break;
            default:
                $hero = new Dwarf('Gimli');
                break;
        }
        $enemy = new Character('Smaug', 500, 100, 100);
    }
    if (isset($post["action"])) {
        $hero = new $post["typ"]($post["name"], (int)$post["lp"], (int)$post["strenght"], (int)$post["stamina"], boolval($post["isActive"]));
        $enemy = new Character('Smaug', 500, 100, 100);
        switch ($post["action"]) {
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
    // Post Hero Stats
    $typ = get_class($hero);
    echo "<input name='typ' type='text' value='$typ' hidden>";
    echo "<input name='name' type='text' value='{$hero->getName()}' hidden>";
    echo "<input name='lp' type='number' value={$hero->getHealth()} hidden>";
    echo "<input name='stamina' type='number' value={$hero->getStamina()} hidden>";
    echo "<input name='strenght' type='number' value={$hero->getStrenght()} hidden>";
    echo "<input name='isActive' type='text' value='{$hero->isActive()}' hidden>";
    // Post Hero Stats
    $typ = get_class($enemy);
    echo "<input name='enemy_typ' type='text' value='$typ' hidden>";
    echo "<input name='enemy_name' type='text' value='{$enemy->getName()}' hidden>";
    echo "<input name='enemy_lp' type='number' value={$enemy->getHealth()} hidden>";
    echo "<input name='enemy_stamina' type='number' value={$enemy->getStamina()} hidden>";
    echo "<input name='enemy_strenght' type='number' value={$enemy->getStrenght()} hidden>";
    // actions to choose
    echo '<p><button typ="submit" name="action" value="attack" class="pure-button">Angriff</button></p>';
    echo '<p><button typ="submit" name="action" value="specialAttack" class="pure-button">Spezialfähigkeit</button></p>';
    echo '<p><button typ="submit" name="action" value="defend" class="pure-button">Blocken</button></p>';
    echo '</div>';
    echo '<div class="pure-u-1-2">';
    echo "<p><img src='img/{$enemy->getPicture()}' width=70% height= 70% /></p>";
    //  $type = $post["type"] ?? $post["button"];
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
