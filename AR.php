<?php
class ARmagic
{
    public $connection;
    public $id;
    public $values;
    public $table;


    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);
    }

    function __set($name, $value)
    {
        $this->values[$name] = $value;
    }

    public function save()
    {
        $arrKeys = array_keys($this->values);
        $arrValue = array_values($this->values);
        $key = implode(", ", $arrKeys);
        $value = "'". implode("', '", $arrValue). "'";

        if ($this->select($this->id) !== false) {
            $this->update($key, $value);
        } else {
            $this->insert($key, $value);
        }
        $result = $this->connection->query("SELECT LAST_INSERT_ID()");
        $id = current($result->fetch(PDO::FETCH_ASSOC));

        echo "Последний ID " . $id;

    }

    public function select()
    {
        $stm = $this->connection->prepare("SELECT * FROM $this->table WHERE id=:id");
        $stm->bindParam(':id', $this->id);
        $stm->execute();
        return $result = $stm->fetch(PDO::FETCH_ASSOC);

    }

    public function insert($key, $value)
    {
        echo "Пытаемся вставить новое значение \n";
        $stm = $this->connection->prepare("INSERT INTO $this->table ($key) VALUES ($value)");
        if ($stm->execute() !== false) {
           echo "Вставка прошла успешно";
        } else {
            echo "Вставка не прошла";
        }
    }

    public function update($key, $value)
    {
        echo "Пытаемся обновить \n";
        $stm = $this->connection->prepare("UPDATE $this->table SET $key = $value WHERE id=$this->id");

        if ($stm->execute() !== false) {
            echo "Обновление записи прошло успешно";
        } else {
            echo "Не получилось :( Попробуйте вставить 1 элемент";
        }
    }

}




$record = new ARmagic();
$record->table = 'animals';
$record->title = 'Mog';
$record->type = 'sdf';
$record->id = '44';
$record->save();