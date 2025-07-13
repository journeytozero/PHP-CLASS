<?php

// savingAcc.php (This file would contain both classes)

class BankAccount
{
    private float $balance; // Use type hint for clarity and strictness
    protected string $givenDate; // Changed to protected as SavingAccount needs it directly

    // Constructor to initialize the balance and optionally the givenDate
    public function __construct(float $initialBalance = 0.0, string $givenDate = '')
    {
        if ($initialBalance < 0) {
            throw new InvalidArgumentException("Initial balance cannot be negative.");
        }
        $this->balance = $initialBalance;
        // Set givenDate if provided, otherwise it might be set by child class or left empty
        $this->givenDate = $givenDate; 
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): self
    {
        if ($amount <= 0) {
            // Throw an exception for invalid deposit amounts
            throw new InvalidArgumentException("Deposit amount must be positive.");
        }
        $this->balance += $amount;
        return $this; // Return $this for method chaining
    }

    public function withdraw(float $amount): self
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Withdrawal amount must be positive.");
        }
        if ($this->balance < $amount) {
            throw new RuntimeException("Insufficient funds.");
        }
        $this->balance -= $amount;
        return $this; // Return $this for method chaining
    }

    /**
     * Checks if the account's given date is more than one year ago.
     * Requires the givenDate property to be set.
     */
    protected function isGreaterThanOneYear(): bool
    {
        // If givenDate is not set, this method cannot function correctly for this instance.
        // You might want to throw an exception or return false.
        if (empty($this->givenDate)) {
             // Or throw new LogicException("Given date not set for annual fee calculation.");
            return false; 
        }

        try {
            $givenDateTime = new DateTime($this->givenDate);
            $currentDateTime = new DateTime();
        } catch (Exception $e) {
            // Handle potential date parsing errors
            error_log("Date parsing error in isGreaterThanOneYear: " . $e->getMessage());
            return false; 
        }

        $interval = $currentDateTime->diff($givenDateTime);

        // Check if the difference is more than 1 year.
        // This logic is slightly more robust for edge cases around leap years/month lengths.
        return $interval->y > 1 || ($interval->y === 1 && $interval->days > 365);
    }
}


class SavingAccount extends BankAccount
{
    private float $interestRate;
    // Overriding or providing a default for givenDate if not set in parent constructor
    public string $givenDate = "2024-07-06"; 

    // Constructor for SavingAccount, calls parent constructor
    public function __construct(float $initialBalance = 0.0, string $givenDate = "2024-07-06")
    {
        parent::__construct($initialBalance, $givenDate); // Pass to parent
        $this->interestRate = 0.0; // Default interest rate
    }

    public function setInterestRate(float $interestRate): self
    {
        if ($interestRate < 0) {
            throw new InvalidArgumentException("Interest rate cannot be negative.");
        }
        $this->interestRate = $interestRate;
        return $this; // For chaining
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function addInterest(): self
    {
        // Only add interest if rate is positive
        if ($this->interestRate > 0) {
            $interest = $this->interestRate * $this->getBalance();
            // Using the parent's deposit method
            $this->deposit($interest); 
        }
        return $this; // For chaining
    }

    /**
     * Calculates and potentially applies an annual fee.
     * Returns true if a fee was applied, false otherwise.
     */
    public function calcAnnualFee(): bool
    {
        $feeApplied = false;
        if ($this->isGreaterThanOneYear()) {
            if ($this->getBalance() >= 200) { // Changed to >= to include exactly 200
                $feeAmount = 200.0;
                // Directly modify balance if you want the fee to be deducted.
                // Using withdraw() is safer as it handles insufficient funds.
                try {
                    $this->withdraw($feeAmount);
                    echo "Your Annual Fee of BDT.{$feeAmount} has been adjusted from your account.<br>";
                    echo "Your Current Balance is: " . $this->getBalance() . "<br>";
                    $feeApplied = true;
                } catch (RuntimeException $e) {
                    // This case should ideally not happen due to the getBalance() >= 200 check,
                    // but it's good practice to catch if withdraw() could fail for other reasons.
                    error_log("Failed to deduct annual fee: " . $e->getMessage());
                }
            } else {
                // You might want to log or display a message if balance is too low for a fee.
                // echo "Balance too low for annual fee deduction (Minimum BDT 200 required).<br>";
            }
        } else {
            // Optional: Message if not greater than one year
            // echo "Account not old enough for annual fee calculation.<br>";
        }
        return $feeApplied;
    }
}