<?php
class Human extends Character
{
    protected $specialAttack;

    public function __construct(string $name, int $healthpoints = 20, int $strenght = 15, int $stamina = 15, string $specialAttack = 'sneakAttack', string $picture='human.jpg')
    {
        parent::__construct($name, $healthpoints, $strenght, $stamina, $picture);
    }

    public function getHeroStats()
    {
        $status = '<p class="border">Name: '.$this->name.'<br>';
        $status .= 'LP: '.$this->healthpoints.'<br>';
        $status .= 'Stärke: '.$this->strenght.'<br>';
        $status .= 'Ausdauer: '.$this->stamina.'<br></p>';
        return $status;
    }

    public function sneakAttack()
    {
        $this->stamina -=2;
        echo "{$this->getName()} hat einen Schleichangriff druchgeführt! Stamina: {$this->stamina}<br>";
    }
}
class Elf extends Character
{
    protected $specialAttack;
    protected $magic;

    public function __construct(string $name, int $magic = 10, int $healthpoints = 20, int $strenght = 10, int $stamina = 5, string $specialAttack = 'healSpell', string $picture='elf.png')
    {
        parent::__construct($name, $healthpoints, $strenght, $stamina, $picture);
        $this->magic = $magic;
    }

    public function getHeroStats()
    {
        $status = '<p class="border">Name: '.$this->name.'<br>';
        $status .= 'LP: '.$this->healthpoints.'<br>';
        $status .= 'Mana: '.$this->magic.'<br>';
        $status .= 'Stärke: '.$this->strenght.'<br>';
        $status .= 'Ausdauer: '.$this->stamina.'<br></p>';
        return $status;
    }

    public function healSpell()
    {
        $this->magic -=2;
        $heal = rand(2, 10);
        $this->healthpoints += $heal;
        echo "{$this->getName()} hat sich $heal Lebenspunkte geheilt! MP: {$this->magic}<br>";
    }
}
class Dwarf extends Character
{
    protected $specialAttack;

    public function __construct(string $name, int $healthpoints = 30, int $strenght = 15, int $stamina = 20, string $specialAttack = 'furyAttack', string $picture='dwarf.jpg')
    {
        parent::__construct($name, $healthpoints, $strenght, $stamina, $picture);
    }

    public function getHeroStats()
    {
        $status = '<p class="border">Held<br><br>';
		$status .= 'Name: '.$this->name.'<br>';
        $status .= 'LP: '.$this->healthpoints.'<br>';
        $status .= 'Stärke: '.$this->strenght.'<br>';
        $status .= 'Ausdauer: '.$this->stamina.'<br></p>';
        echo $status;
        return $status;
    }

    public function furyAttack()
    {
        $this->stamina -=2;
        echo "{$this->getName()} hat eine gewaltige Attacke durchgeführt! Stamina: {$this->stamina}<br>";
    }
}
