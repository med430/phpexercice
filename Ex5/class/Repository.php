<?php
class Repository implements IRepository {
    protected $db;
    protected $actions;
    public function __construct(protected $tableName) {
        $this->db = ConnexionBD::getInstance();
        $this->actions = [];
    }

    public function findAll() {
        $rep = $this->db->query("SELECT * FROM {$this->tableName};");
        $elements = $rep->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }

    public function findById($id) {
        $rep = $this->db->prepare("SELECT * FROM {$this->tableName} WHERE id = :id;");
        $rep->execute(["id"=>$id]);
        $elements = $rep->fetch(PDO::FETCH_ASSOC);
        return $elements;
    }

    public function create($params) {
        $keys = array_keys($params);
        $keyString = implode(',', $keys);
        $paramselements = array_fill(0, count($keys), '?');
        $paramsString = implode(',', $paramselements);
        $rep = $this->db->prepare("INSERT INTO {$this->tableName} ($keyString) VALUES ($paramsString);");
        $rep->execute($params);
        $elements = $rep->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }

    public function delete($id) {
        $rep = $this->db->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        $rep->execute(["id"=>$id]);
    }

    public function keys() {
        $stmt = $this->db->query("DESCRIBE {$this->tableName}");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $keys = [];
        foreach ($columns as $column) {
            $keys[] = $column['Field'];
        }
        return $keys;
    }

    public function show() {
        $elements = $this->findAll();
        ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php foreach($this->keys() as $key): ?>
                        <th scope="col"><?= $key ?></th>
                        <?php endforeach ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($elements as $index=>$element): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <?php foreach($element as $val): ?>
                        <td><?= $val ?></td>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action): ?>
                                <a href="detailEtudiant.php?id=<?= $element->id ?>">
                                    <img src="<?= $action ?>" alt="Info Icon" width="30">
                                </a>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php
    }
}