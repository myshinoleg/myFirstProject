<?php
class Stack
{
    public $forest;
    public $countAnimal;

    public function __construct()
    {
        $this->forest = array();
    }

    public function push($animal)
    {
        if (count($this->forest < $this->countAnimal)) {
            array_unshift($this->forest, $animal);
        } else {
            echo "Лес переполнен!";
        }
    }

    public function pop()
    {
        if (empty($this->forest)) {
            echo "Лес пуст";
        } else {
            return array_pop($this->forest);
        }
    }

    public function top()
    {
        return current($this->forest);

    }

}

$forest = new Stack();

$forest->push('Заяц');
$forest->push('Волк');
$forest->push('Лиса');
$forest->push('Медведь');
$forest->push('Лось');

print_r($forest->forest);

echo 'pop животное ' . $forest->pop() . "\n";
echo 'top животное ' . $forest->top() . "\n";

print_r($forest->forest);

/*Array
(
    [0] => Лось
    [1] => Медведь
    [2] => Лиса
    [3] => Волк
    [4] => Заяц
)
pop животное Заяц
top животное Лось
Array
(
    [0] => Лось
    [1] => Медведь
    [2] => Лиса
    [3] => Волк
)
*/
