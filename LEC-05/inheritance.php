<?php
// Base Class
class User {
    protected $name;
    protected $email;

    public function __construct($name, $email) {
        $this->name  = $name;
        $this->email = $email;
    }

    public function getInfo() {
        return "Name: {$this->name}, Email: {$this->email}";
    }
}

// Child Class - Regular User
class Customer extends User {
    private $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getBalance() {
        return "{$this->name}'s Balance: ৳{$this->balance}". "<br>";
    }
}

// Child Class - Admin
class Admin extends User {
    public function deleteUser($userEmail) {
        // Just an example logic
        return "User with email {$userEmail} has been deleted by admin {$this->name}";
    }
}

// --- Usage ---

$customer = new Customer("Rayan", "rayan@example.com");
echo $customer->getInfo() . "<br>";       // Name: Rayan, Email: rayan@example.com
$customer->deposit(5000);
echo $customer->getBalance() . "<br>";    // Rayan's Balance: ৳5000

$admin = new Admin("Ghost Admin", "admin@example.com");
echo $admin->deleteUser("rayan@example.com"); // User with email rayan@example.com has been deleted by admin Ghost Admin
?>
