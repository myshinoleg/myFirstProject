<?php

class BinaryNode
{
    public $value;    // значение узла
    public $left;     // левый потомок типа BinaryNode
    public $right;     // правый потомок типа BinaryNode

    public function __construct($item) {
        $this->value = $item;
        // новые потомки - вершина
        $this->left = null;
        $this->right = null;
    }

    public function dump() {
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

    public function __construct() {
        $this->root = null;
    }

    public function isEmpty() {
        return $this->root === null;
    }

    public function insert($item) {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            $this->root = $node;
        }
        else {
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree)
    {
        if ($subtree === null) {
            $subtree = $node;
        } else {
            if ($node->value > $subtree->value) {
                $this->insertNode($node, $subtree->right);
            } else if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->left);
            }
        }
    }

    public function traverse() {
        // отображение дерева в возрастающем порядке от корня
        $this->root->dump();
    }

}

$tree = new BinaryTree();
$tree->insert(4);
$tree->insert(2);
$tree->insert(3);
$tree->insert(8);
$tree->insert(5);
$tree->traverse();

/**
 * int(2)
int(3)
int(4)
int(5)
int(8)

 */