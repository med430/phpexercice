<?php
class AttackPokemon {
    public function __construct(
        public float $attackMinimal,
        public float $attackMaximal,
        public float $specialAttack,
        public int $probabilitySpecialAttack
    ) {
        $this->correct();
    }

    public function getAttackMinimal() : float {
        return $this->attackMinimal;
    }

    public function getAttackMaximal() : float {
        return $this->attackMaximal;
    }

    public function getSpecialAttack() : float {
        return $this->specialAttack;
    }

    public function getProbabilitySpecialAttack() : int {
        return $this->probabilitySpecialAttack;
    }

    public function setAttackMinimal(float $attack) {
        $this->attackMinimal = $attack;
    }

    public function setAttackMaximal(float $attack) {
        $this->attackMaximal = $attack;
    }

    public function setSpecialAttack(float $specialAttack) {
        $this->specialAttack = $specialAttack;
    }

    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack) {
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
        $this->correct();
    }

    private function correct() {
        if($this->probabilitySpecialAttack>100) {
            $this->probabilitySpecialAttack = 100;
        } else if($this->probabilitySpecialAttack<0) {
            $this->probabilitySpecialAttack = 0;
        }
    }

    private function isSpecialAttack() : bool {
        $rand = rand(1, 100);
        if($rand<=$this->probabilitySpecialAttack) {
            return true;
        }
        return false;
    }

    public function attack() : int {
        $attack = rand($this->attackMinimal, $this->attackMaximal);
        if($this->isSpecialAttack()) {
            return $this->specialAttack * $attack;
        }
        return $attack;
    }
}