<?php

class Category {
    protected $categoryName;

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function getCategory() {
        return $this->categoryName;
    }
}

class Clothing extends Category {
    public $size;
    private $brand;  // Added brand property

    public function __construct($categoryName, $size, $brand = null) {
        parent::__construct($categoryName);
        $this->size = $size;
        $this->brand = $brand;
    }

    public function getProductDetails() {  // Fixed typo in method name (getPoductDetails -> getProductDetails)
        $category = $this->getCategory();
        $brandInfo = $this->brand ? " - Brand: " . $this->brand : "";
        return "Category: " . $category . ", Size: " . $this->size . $brandInfo;
    }

    // Getter and setter for brand
    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }
}

// Example usage:
$shirt = new Clothing("T-Shirt", "L", "Nike");
echo $shirt->getProductDetails(); 
// Output: Category: T-Shirt, Size: L - Brand: Nike

$pants = new Clothing("Jeans", "32");
$pants->setBrand("Levi's");
echo $pants->getProductDetails(); 
// Output: Category: Jeans, Size: 32 - Brand: Levi's