<?php
class SpecialAttacks
{
    public function sneakAttack() {
    $this->stamina -=2;
    $specialmsg = "{$this->getName()} hat einen Schleichangriff druchgeführt! Stamina: {$this->stamina}<br>";
    }
    public function healSpell() {
    $this->magic -=2;
    $heal = rand(2,10);
    $this->healthpoints += $heal;
    $specialmsg = "{$this->getName()} hat sich $heal Lebenspunkte geheilt! MP: {$this->magic}<br>";
    }
    public function furyAttack() {
    $this->stamina -=2;
    $specialmsg = "{$this->getName()} hat eine gewaltige Attacke durchgeführt! Stamina: {$this->stamina}<br>";
    }
}    
?>