<?php
class BinaryNode
{
    public $value;
    public $left  = NULL;
    public $right = NULL;

    public function __construct ($value)
    {
        $this->value = $value;
    }
}

class BinaryTree
{
    protected $root = NULL;

    public function isEmpty ()
    {
        return is_null($this->root);
    }

    public function insert ($value)
    {
        $node = new BinaryNode($value);
        $this->insertNode($node, $this->root);
    }

    protected function insertNode (BinaryNode $node, &$subtree)
    {
        if (is_null($subtree))
        {
            $subtree = $node;
        }
        else
        {
            if ($node->value < $subtree->value)
            {
                $this->insertNode($node, $subtree->left);
            }
            elseif ($node->value > $subtree->value)
            {
                $this->insertNode($node, $subtree->right);
            }
        }
        return $this;
    }
}