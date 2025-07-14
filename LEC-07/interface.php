<?php
interface MyPrint
{
    public function printData();
}

interface Select
{
    public function getData();
}

interface MyInterface extends MyPrint, Select
{
    public function addData();
}

class MyClass implements MyInterface
{
    public function printData()
    {
        echo "This function will print information<br>";
    }

    public function getData()
    {
        echo "This function will read information<br>";
    }

    public function addData()
    {
        echo "This function will add information data<br>";
    }
}

class MyChildClass extends MyClass
{
    // Can override parent methods or add new ones
    public function printData()
    {
        parent::printData(); // Calls parent implementation
        echo "Additional printing from child class<br>";
    }
}

// Using the classes
$obj = new MyClass();
$obj->printData();
$obj->addData();
$obj->getData();

echo "<br>Using child class:<br>";
$childObj = new MyChildClass();
$childObj->printData(); // Shows both parent and child output
?>