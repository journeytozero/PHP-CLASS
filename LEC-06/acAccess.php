<?php

declare(strict_types=1); // Declare strict types for the script

require_once "savingAcc.php"; // Use require_once to prevent issues if included multiple times

// Create a new SavingAccount instance
$account = new SavingAccount(); 

// Perform operations with method chaining for conciseness where appropriate
try {
    $account->deposit(1000)
            ->setInterestRate(0.05)
            ->addInterest();

    echo "Account Balance with Interest rate is: " . $account->getBalance() . "<br>";

    // Calculate and potentially apply annual fee
    $feeApplied = $account->calcAnnualFee();
    
    // Optional: You could add more output based on $feeApplied if needed
    // if (!$feeApplied && $account->isGreaterThanOneYear() && $account->getBalance() < 200) {
    //     echo "Annual fee not applied: Balance below minimum threshold.<br>";
    // }

} catch (InvalidArgumentException $e) {
    // Catch specific exceptions from methods like deposit or setInterestRate
    echo "Error: " . $e->getMessage() . "<br>";
} catch (RuntimeException $e) {
    // Catch runtime exceptions like insufficient funds during withdrawal (if calcAnnualFee used withdraw)
    echo "Account operation failed: " . $e->getMessage() . "<br>";
} catch (Exception $e) {
    // Catch any other unexpected exceptions
    echo "An unexpected error occurred: " . $e->getMessage() . "<br>";
}

?>