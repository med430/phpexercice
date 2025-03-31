<?php
class Etudiant {
    public function __construct(
        private string $nom,
        private $notes = array()
    ) {
        if(!is_array($notes)) {
            $this->notes = array();
        }
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function getNote(int $index) {
        return $this->notes[index];
    }

    public function addNotes(int ...$notes) {
        foreach($notes as $note) {
            $this->notes[] = $note;
        }
    }

    public function afficherNotes() {
        ?>
        <div class="alert alert-light">
                <div class="alert alert-secondary">
                    <?= $this->nom; ?>
                </div>
                <?php
                    foreach($this->notes as $note) {
                        $alert_type = ($note>10) ? "success" : (($note==10) ? "warning" : "danger");
                        ?>
                            <div class="alert alert-<?= $alert_type ?>">
                                <?= $note ?>
                            </div>
                        <?php
                    }
                ?>
                <div class="alert alert-primary">
                    Votre moyenne est <?= $this->moyenne() ?>
                </div>
        </div>
        <?php
    }

    public function moyenne() {
        $s = 0;
        foreach($this->notes as $note) {
            $s += $note;
        }
        $moyenne = $s / count($this->notes);
        return $moyenne;
    }

    public function estAdmis() {
        if($this->moyenne()>=10) {
            echo "admis";
        }
        echo "non admis";
    }
}