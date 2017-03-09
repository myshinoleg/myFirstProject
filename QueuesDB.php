<?php
class QueuesDB
{
    public $connection;

    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);
    }

    public function createQueue($sizeQueue, $idQueue)
    {
        $stm = $this->connection->query("CREATE TABLE $idQueue (id INT(5) NOT NULL AUTO_INCREMENT, queue VARCHAR(255), PRIMARY KEY(id))");
        $saveIdQueue = $this->connection->query("INSERT INTO set_queue (name_queue) VALUE ('$idQueue')");

    }

    public function enqueue($idQueue, $value)
    {
        $stm = $this->connection->query("INSERT INTO $idQueue (queue) VALUE ('$value')");

    }

    public function dequeue($idQueue)
    {
        $firstRow = $this->connection->query("SELECT * FROM $idQueue GROUP BY id LIMIT 1");
        $row = $firstRow->fetch(PDO::FETCH_ASSOC);

        $id = $row['id'];
        $stm = $this->connection->query("DELETE FROM $idQueue WHERE id = $id");

        $this->isEmpty($idQueue);
        return $row['queue'];

    }

    public function isEmpty($idQueue)
    {
        $stm = $this->connection->query("SELECT * FROM $idQueue");
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        if ($row == false) {
            $deleteQueue = $this->connection->query("DROP TABLE $idQueue");
            $deleteWritesAboutQueue = $this->connection->query("DELETE FROM set_queue WHERE name_queue = '$idQueue'");
            echo "Очередь $idQueue удалена \n";
        }
    }
}

$s = new QueuesDB();
//$s->createQueue(3, '1q');
//$s->enqueue('1q', 4);
//$s->enqueue('1q', 3);
//$s->enqueue('1q', 2);

$t = $s->dequeue('1q');
echo $t;
