<?php

class BinaryNode
{
    public $value;    // значение узла
    public $left;     // левый потомок типа BinaryNode
    public $right;     // правый потомок типа BinaryNode


    public function __construct($item)
    {
        $this->value = $item;
        // новые потомки - вершина
        $this->left = null;
        $this->right = null;
    }

    public function dump()
    {
        if ($this->left !== null) {
            $this->left->dump();
        }
        var_dump($this->value);
        if ($this->right !== null) {
            $this->right->dump();
        }
    }


}

class BinaryTree
{
    protected $root; // корень дерева
    public $connection;

    public function __construct()
    {
        $this->root = null;

        $username = "root";
        $password = "0000";
        $this->connection = new PDO('mysql: host=localhost; dbname=forest', $username, $password);

    }

    public function saveInDb($parent, $value)
    {
        $this->connection->query("INSERT INTO tree (parent_id, value) VALUE ('$parent', '$value')");

    }
    public function isEmpty()
    {
        echo "isEmpty \n";
        return $this->root === null;
    }

    public function insert($item)
    {
        echo "insert $item \n";
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            $this->root = $node;
            $s = $this->saveInDb(0, $this->root->value);
        }
        else {
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree)
    {
        echo "insertNode $node->value, $subtree->value \n";
        if ($subtree === null) {
            $subtree = $node;
//var_dump($node->value);
        } else {
            if ($node->value > $subtree->value) {
                $this->insertNode($node, $subtree->right);
//                $this->saveInDb($node->value, $subtree->value);

            } else if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->left);
//                $this->saveInDb($node->value, $subtree->value);
            } else {

            }
//            $this->saveInDb($node->value, $subtree->value);
//
//            var_dump($node->value, $subtree->value);
//            echo "\n";
        }
    }

    public function traverse()
    {
        // отображение дерева в возрастающем порядке от корня
        $this->root->dump();
    }

}

$tree = new BinaryTree();
$tree->insert(4);
$tree->insert(6);
$tree->insert(7);
$tree->insert(8);
$tree->insert(9);
$tree->insert(10);
$tree->insert(11);
$tree->insert(12);
$tree->insert(13);


//$tree->insert(5);
$tree->traverse();


//var_dump($tree);
/**
 * int(2)
int(3)
int(4)
int(5)
int(8)

 */