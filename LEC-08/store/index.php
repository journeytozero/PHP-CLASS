<?php
require 'src\model\customer.php';

use store\src\model;

$customer = new model\customer('Kamia');
echo $customer->getName();






?>