<?php
trait Example
{
    public function SomethingExample()
    {
        echo "this is example \n";
    }

    public function SomeoneExample()
    {
        echo "this is two example \n";
    }

    public function ThreeExample()
    {
        echo "this is three example \n";
    }

}

trait TwoExample
{
    public function SomeoneExample()
    {
        echo "From TwoExample \n";
    }
}

class UseExample
{
    use Example, TwoExample {
        TwoExample::SomeoneExample insteadof Example;
    }

    public function SomethingExample()
    {
        echo "New example \n";
    }
}

$someVar = new UseExample();
$someVar->SomeoneExample();
$someVar->SomethingExample();
$someVar->ThreeExample();

//From TwoExample
//New example
//this is three example