<?php
class AnimalModel
{
    public $connection;
    public $id;
    public $title;
    public $type;

    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);

    }

    public function update()
    {
        $stm = $this->connection->prepare("UPDATE animals SET title=:title, type=:type WHERE id=:id");
        $stm->bindParam(':id', $this->id);
        $stm->bindParam(':title', $this->title);
        $stm->bindParam(':type', $this->type);
        $stm->execute();
        return $stm;
    }

    public function insert()
    {
        $stm = $this->connection->prepare("INSERT INTO animals (title, type) VALUE  (:title, :type);");
        $stm->bindParam(':title', $this->title);
        $stm->bindParam(':type', $this->type);
        $stm->execute();
        return $stm;
    }

    public function find()
    {
        $stm = $this->connection->prepare("SELECT * FROM animals WHERE id=:id;");
        $stm->bindParam(':id', $this->id);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

$model =  new AnimalModel();
$model->id=2;
$model->title = 'horse';
$model->type = 'Abstract horse';
print_r($model->update());

