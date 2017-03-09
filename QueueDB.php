<?php

class QueueDB
{
    public $connection;

    public function __construct()
    {
        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);
    }

    function enqueue($value)
    {
        $result = $this->connection->query("INSERT INTO hunter (hunter_name) VALUE ('$value')");
    }

    function dequeue()
    {
        $firstRow = $this->connection->query("SELECT * FROM hunter GROUP BY id LIMIT 1");
        $row = $firstRow->fetch(PDO::FETCH_ASSOC);

        $id = $row['id'];
        $stm = $this->connection->query("DELETE FROM hunter WHERE id = $id");

        return $row['hunter_name'];
    }
}

$n = new QueueDB();
//$n->enqueue(12);
echo $n->dequeue();


