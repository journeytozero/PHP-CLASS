<?php

abstract class Car {
    private $title;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    abstract public function setDescription($description, $model);
}

class Toyota extends Car {
    private $description;
    private $model;

    public function setDescription($description, $model) {
        $this->description = $description;
        $this->model = $model;
    }

    public function getDescription() {
        return $this->description . " | Model: " . $this->model;
    }
}

class Honda extends Car {
    private $description;
    private $model;

    public function setDescription($description, $model) {
        $this->description = $description;
        $this->model = $model;
    }

    public function getDescription() {
        return $this->description . " | Model: " . $this->model;
    }
}

$car1 = new Toyota();
$car1->setTitle("Toyota");
$car1->setDescription("Reliable and fuel efficient", "Land Cruiser");

$car2 = new Honda();
$car2->setTitle("Honda");
$car2->setDescription("Comfortable and stylish", "Civic");

echo "<h3>Car Info:</h3><br>";
echo "Brand: " . $car1->getTitle() . "<br>";
echo "Description: " . $car1->getDescription() . "<br><br>";
echo "Brand: " . $car2->getTitle() . "<br>";
echo "Description: " . $car2->getDescription() . "<br>";
?>
