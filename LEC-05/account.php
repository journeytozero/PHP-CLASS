<?php

class BankAccount {
    private $accountNumber;
    private $balance;

    // Constructor to initialize the account
    public function __construct($accountNumber, $initialBalance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }

    // Deposit money into the account
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: $amount<br>";
            echo "New Balance: {$this->balance}<br>";
        } else {
            echo "Deposit amount must be positive<br>";
        }
        return $this->balance;
    }

    // Withdraw money from the account
    public function withdraw($amount) {
        if ($amount <= 0) {
            echo "Withdrawal amount must be positive<br>";
            return false;
        }
        
        if ($amount > $this->balance) {
            echo "Insufficient funds<br>";
            return false;
        }

        $this->balance -= $amount;
        echo "Withdrawn: $amount<br>";
        echo "Remaining Balance: {$this->balance}<br>";
        return $amount;
    }

    // Get current balance
    public function getBalance() {
        return $this->balance;
    }

    // Get account number
    public function getAccountNumber() {
        return $this->accountNumber;
    }
}

// Usage Example:
$account = new BankAccount("123456789", 1000);

echo "Account Number: {$account->getAccountNumber()}<br>";
echo "Initial Balance: {$account->getBalance()}<br><br>";

$account->deposit(500);
$account->withdraw(200);
$account->withdraw(2000); // Should show insufficient funds
?>