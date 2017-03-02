<?php
require "Animal.php";
class AnimalModel
{

    public $connection;

    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);

    }

    public function save()
    {
        if (isset($this->id))
        {
            $this->_update();
        } else {
            $this->_insert();
        }
    }

    private function _update()
    {
        $stm = $this->connection->prepare("UPDATE animals SET title=:title, type=:type WHERE id=:id");
        $stm->bindParam(':title', $this->title);
        $stm->bindParam(':type', $this->type);
        $stm->execute();
    }

    private function _insert()
    {
        $stm = $this->connection->prepare("INSERT INTO animals (title, type) VALUE  (:title, :type);");
        $stm->bindParam(':title', $this->title);
        $stm->bindParam(':type', $this->type);
        $stm->execute();
    }
}

$model =  new AnimalModel();
$model->save('af', 'as');