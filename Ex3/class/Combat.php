<?php
class combat {
    public function __construct(
        private Pokemon $pokemon1,
        private Pokemon $pokemon2
    ) {}

    public function show() {
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php $this->pokemon1->whoAmI(); ?>
                </div>
                <div class="col">
                    <?php $this->pokemon2->whoAmI(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    public function round(int $round) {
        $this->show();
        $attack1 = $this->pokemon1->attack($this->pokemon2);
        $attack2 = $this->pokemon2->attack($this->pokemon1);
        ?>
            <div class="container alert alert-danger">
                Round <?= $round ?>
                <div class="row alert alert-secondary">
                    <div class="col">
                        <?= $attack1 ?>
                    </div>
                    <div class="col">
                        <?= $attack2 ?>
                    </div>
                </div>
            </div>
        <?php
    }

    public function combatComplete() {
        ?>
            <div class="container alert alert-primary">
                Les combatants
            </div>
        <?php
        $i = 1;
        while(!$this->pokemon1->isDead() && !$this->pokemon2->isDead()) {
            $this->round($i);
            $i += 1;
        }
        $this->show();
        if($this->pokemon1->getHp()>$this->pokemon2->getHp()) {
            $pokemon = $this->pokemon1;
            ?>
                <div class="container alert alert-success">
                    Le vainqueur est <img src=<?= $pokemon->getUrl() ?> alt=<?= $pokemon->getName() ?> class="img-fluid">
                </div>
            <?php
        } else if($this->pokemon1->getHp()<$this->pokemon2->getHp()) {
            $pokemon = $this->pokemon2;
            ?>
                <div class="container alert alert-success">
                    Le vainqueur est <img src=<?= $pokemon->getUrl() ?> alt=<?= $pokemon->getName() ?> class="img-fluid">
                </div>
            <?php
        } else {
            ?>
                <div class="container alert alert-success">
                    combat nul
                </div>
            <?php
        }
    }
}