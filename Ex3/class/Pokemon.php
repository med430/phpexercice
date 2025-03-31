<?php
class Pokemon {
    public function __construct(
        protected string $name,
        protected string $url,
        protected int $hp,
        protected AttackPokemon $attackPokemon
    ) {}

    public function getName() : string {
        return $this->name;
    }

    public function getUrl() : string {
        return $this->url;
    }

    public function getHp() : int {
        return $this->hp;
    }

    public function getAttackPokemon() {
        return $this->attackPokemon;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setUrl(string $url) {
        $this->url = $url;
    }

    public function setHp(int $hp) {
        $this->hp = $hp;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon) {
        $this->attackPokemon = $attackPokemon;
    }

    public function isDead() : bool {
        return ($this->hp<=0);
    }

    public function attack(Pokemon $p) : int {
        $attack = $this->attackPokemon->attack();
        $p->reduceHp($attack);
        return $attack;
    }

    public function reduceHp(int $hp) {
        $this->hp -= $hp;
    }

    public function whoAmI() {
        ?>
            <div class="container alert alert-light">
                <div class="alert alert-secondary">
                    <?= $this->name ?>
                    <img src=<?= $this->url ?> alt=<?= $this->name ?> class="img-fluid">
                </div>
                <div class="alert border border-black">
                    Points : <?= $this->hp ?>
                </div>
                <div class="alert border border-black">
                    Min Attack Points : <?= $this->attackPokemon->getAttackMinimal() ?>
                </div>
                <div class="alert border border-black">
                    Max Attack Points : <?= $this->attackPokemon->getAttackMaximal() ?>
                </div>
                <div class="alert border border-black">
                    Special Attack : <?= $this->attackPokemon->getSpecialAttack() ?>
                </div>
                <div class="alert border border-black">
                    Probability Special Attack : <?= $this->attackPokemon->getProbabilitySpecialAttack() ?>
                </div>
            </div>
        <?php
    }
}