<?php
class Repository implements IRepository {
    protected $db;
    protected $actions;
    public function __construct(protected $tableName) {
        $this->db = ConnexionBD::getInstance();
        $this->actions = [];
    }

    public function findAll($fetchType = PDO::FETCH_OBJ) {
        $rep = $this->db->query("SELECT * FROM {$this->tableName};");
        $elements = $rep->fetchAll($fetchType);
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
        $rep->execute(array_values($params));
        $elements = $rep->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }

    public function delete($id) {
        $rep = $this->db->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        $rep->execute(["id"=>$id]);
    }

    public function find($condition) {
        $rep = $this->db->prepare("SELECT * FROM {$this->tableName} WHERE {$condition};");
        $rep->execute([]);
        $elements = $rep->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }

    public function alter($params) {
        $setString = "";
        $a = [];
        foreach($params as $key=>$value) {
            $setString = $setString . $key . "=?";
            $a[] = $value;
            if(!($key === array_key_last($params))) {
                $setString = $setString . ", ";
            }
        }
        $a[] = $params["id"];
        $rep = $this->db->prepare("UPDATE {$this->tableName} SET {$setString} WHERE id = ?;");
        $rep->execute($a);
        $elements = $rep->fetchAll(PDO::FETCH_OBJ);
        return $elements;
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

    public function vars($element) {
        return [];
    }

    public function pages(int $pageSize) {
        $elementsSize = count($this->findAll());
        return ceil($elementsSize / $pageSize);
    }

    public function showElement($k, $v) {
        echo $v;
    }

    public function showFilterPage($elements, $page_size, $page = 0, $authority = "utilisateur") {
        $offset = $page * $page_size;
        $this->showFilter(array_slice($elements, $offset, $page_size), $authority);
    }

    public function showFilter($elements, $authority = "utilisateur") {
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
                        <?php foreach($element as $k=>$val): ?>
                        <td><?php $this->showElement($k, $val) ?></td>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action): ?>
                                <?php if($action->isAccessibleAuthority($authority)): ?>
                                    <a href="<?= $action->url($this->vars($element)) ?>">
                                        <img src="img/<?= $action->imgUrl ?>" alt="<?= $action->actionName ?>" width="30">
                                    </a>
                                <?php endif ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php
    }

    public function show($authority = "utilisateur") {
        $elements = $this->findAll();
        $this->showFilter($elements, $authority);
    }
}