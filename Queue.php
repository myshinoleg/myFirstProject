<?php

class Queue extends SplQueue
{
    public $queue;
    public $connection;

    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);

        $stm = $this->connection->query("SELECT hunter_name as name FROM hunter");
        $oldWrites = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->queue = $oldWrites;

        $this->showOldQueue();

    }

    public function showOldQueue(){
        echo "Старая очередь \n";
        $key = array_values($this->queue);
        $value = array_values($key);
//        $que = implode(", ", $value);
        print_r($this->queue);
    }

    function __destruct()
    {
        echo "Новая очередь: \n";
//        print_r($this);
        $stm = $this->connection->query("TRUNCATE hunter");
        $stm = $this->connection->prepare("INSERT INTO hunter (hunter_name) VALUE (:hunter)");
        foreach ($this as $key => $value) {
            $stm->bindParam(':hunter', $value);
            echo $value . ', ';
            $stm->execute();
        }
    }
}

$queue = new Queue();
$queue->enqueue('3');
$queue->enqueue('4');
$queue->enqueue('5');
$queue->dequeue();
$queue->enqueue('6');


/**
 * Старая очередь
Array
(
[0] => Array
(
[name] => g
)

[1] => Array
(
[name] => h
)

[2] => Array
(
[name] => j
)

)
Новая очередь:
4, 5, 6,
 */
