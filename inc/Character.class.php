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
    protected $picture;
    public function __construct(string $name, int $healthpoints = 30, int $strenght = 10, int $stamina = 5, string $picture='dragon.jpg')
    {
        $this->name = $name;
        $this->healthpoints = $healthpoints;
        $this->strenght = $strenght;
        $this->stamina = $stamina;
        $this->picture = $picture;
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

    public function getEnemyStats()
    {
        $status = '<p class="border">Feind<br><br>';
		$status .= 'Name: '.$this->name.'<br>';
        $status .= 'LP: '.$this->healthpoints.'<br>';
        $status .= 'Stärke: '.$this->strenght.'<br>';
        $status .= 'Ausdauer: '.$this->stamina.'<br></p>';
        echo $status;
        return $status;
    }
    public function getPicture(): string
    {
        return $this->picture;
    }
    public function getHealth(): int
    {
        return $this->healthpoints;
    }
    public function getStamina(): int
    {
        return $this->stamina;
    }
    public function getStrenght(): int
    {
        return $this->strenght;
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
        if (!$this->isActive) {
            if ($this->healthpoints <=0) {
                $this->dying();
            }
        }
    }
    
    protected function dying()
    {
        echo "{$this->name} ist kampfunfähig<br>";
        $this->isActive = false;
    }
}
