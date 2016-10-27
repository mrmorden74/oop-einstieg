<?php
/**
*    Basisklasse für alle Characters in unserem Spiel
*/
class Character
{
    protected $name;
    protected $healthpoints;
    protected $strenght;
    protected $stamina;
    protected $isActive = true;

    public function __construct(string $name, int $healthpoints = 30, int $strenght = 10, int $stamina = 5)
    {
        $this->name = $name;
        $this->healthpoints = $healthpoints;
        $this->strenght = $strenght;
        $this->stamina = $stamina;
    }

    public function fight()
    {
        if (!$this->isActive()) {
            return;
        }
        //   echo '<embed src="audio/fikn-fight.wav" autostart="true" loop="false" hidden="true">';
        echo '<embed src="audio/fikn-fight.wav" hidden="true"> ';
        $win = rand(0, 1);
        echo "{$this->name} kämpft<br>";
        if ($win === 0) {
            $damage = rand(1, 10);
            $this->healthpoints -= $damage;
            echo "{$this->name} verliert und erhält $damage Schaden<br>";
        }
        $this->checkhealth();
    }


    public function getHealth(): int
    {
        return $this->healthpoints;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function move()
    {
        if (!$this->isActive()) {
            return;
        }
        echo "{$this->name} bewegt sich<br>";
    }

    public function flee()
    {
        echo "{$this->name} flüchtet!<br>";
    }

    protected function isActive()
    {
        if (!$this->isActive) {
            echo "Aktion kann nicht durchgeführt werden!<br>";
            return false;
        }
         return true;
    }

    protected function checkHealth()
    {
        if ($this->healthpoints <=0) {
            $this->dying();
        }
    }
    
    protected function dying()
    {
        echo "{$this->name} ist kampfunfähig<br>";
        $this->isActive = false;
    }
}
