<?php
trait LoggerTrait {
    public function log($message)
    {
        $timeStamp = date("Y-m-d H:i:s");

        echo "[{$timeStamp}] LOG: {$message}<br>";
        // In a real project, write to a file or logging system
    }
}

class Order {
    use LoggerTrait;

    public function create()
    {
        $this->log("Order Has been Created.");
    }
}

class User {
    use LoggerTrait;
    
    public function register()
    {
        $this->log("User Has registered");
    }
}

$order = new Order();
$order->create();

$user = new User();
$user->register();



?>