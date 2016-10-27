<?php
declare(strict_types=1); // php7 Muss die erste Anweisung in einer Datei sein
require_once 'inc/Character.class.php';
require_once 'inc/Sorcerer.class.php';
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
			<h1>Objekt orientiertes Programmieren</h1>
		</header>
		<main>
			<?php

		  	// Hero erstellen
			$sorcerer = new Sorcerer('Gandalf');
			var_dump($sorcerer);
			$hero = new Character('Gimli', 10);
			$hero->fight();
			$sorcerer->castSpell();
			$hero->fight();
			$hero->fight();
			$hero->fight();
			echo "{$hero->getName()} hat {$hero->getHealth()} Lebenspunkte<br>";
			$hero->fight();
			$hero->fight();
			$hero->fight();
			$hero->fight();
			// var_dump($hero);

			// Feind erstellen
			$enemy = new Character('Smaug', 500, 100, 100);
			$enemy->flee();
			// var_dump($enemy);

			?>
		</main>
	</div>
</body>
</html>