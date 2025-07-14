<?php
class BankAccount {
    private $accountNumber;
    private $accountHolder;
    private $balance;

    public function __construct($accNo, $holder, $balance = 0) {
        $this->accountNumber = $accNo;
        $this->accountHolder = $holder;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "✅ Deposited ৳$amount<br>";
        } else {
            echo "❌ Invalid deposit amount!<br>";
        }
    }

    public function withdraw($amount) {
        if ($amount > $this->balance) {
            echo "❌ Insufficient balance!<br>";
        } elseif ($amount > 0) {
            $this->balance -= $amount;
            echo "✅ Withdrawn ৳$amount<br>";
        } else {
            echo "❌ Invalid withdrawal amount!<br>";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function displayInfo() {
        echo "<h3>🏦 Bank Account Info:</h3>";
        echo "Account No: {$this->accountNumber}<br>";
        echo "Holder: {$this->accountHolder}<br>";
        echo "Balance: ৳{$this->balance}<br><br>";
    }
}

// === Example usage ===
$myAcc = new BankAccount("BD123456", "GHOST Rayan", 10000);
$myAcc->displayInfo();

$myAcc->deposit(5000);
$myAcc->withdraw(2000);
$myAcc->displayInfo();

echo "💰 Final Balance: ৳" . $myAcc->getBalance();
?>
