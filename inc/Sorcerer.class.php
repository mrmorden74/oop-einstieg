<?php
class Sorcerer extends Character
{
    protected $magic;

	public function __construct(string $name, int $magic = 20, int $healthpoints = 30, int $strenght = 10, int $stamina = 5)
    {
        parent::__construct($name, $healthpoints, $strenght, $stamina);
		$this->magic = $magic;
    }

	public function castSpell() {
		$this->magic -=2;
		echo "{$this->getName()} hat gezaubert! MP: {$this->magic}<br>";
	}
}
