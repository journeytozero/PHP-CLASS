<?php
abstract class PaymentGateway
{
    protected $amount;
    protected $currency;

    public function __construct(float $amount, string $currency = 'BDT')
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    abstract public function processPayment();

    public function paymentSuccess()
    {
        return "Payment of {$this->amount} {$this->currency} was successful <br>";
    }

    public function getAmount()
    {
        return $this->amount;
    }
}

class BkashPayment extends PaymentGateway
{
    public function processPayment()
    {
        // Simulate API call or payment processing
        return "Processing bKash payment of {$this->amount} {$this->currency}...". "<br>";
    }
}

class NagadPayment extends PaymentGateway
{
    public function processPayment()
    {
        // Simulate API call or payment processing
        return "Processing Nagad payment of {$this->amount} {$this->currency}...". "<br>";
    }
}

class RocketPayment extends PaymentGateway
{
    public function processPayment()
    {
        // Simulate API call or payment processing
        return "Processing Rocket payment of {$this->amount} {$this->currency}...". "<br>";
    }
}

// Usage Example
$paymentAmount = 1250.50;

$bkash = new BkashPayment($paymentAmount);
echo $bkash->processPayment() . "\n";
echo $bkash->paymentSuccess() . "\n\n";

$nagad = new NagadPayment($paymentAmount, 'BDT'); // Example with different currency
echo $nagad->processPayment() . "\n";
echo $nagad->paymentSuccess() . "\n\n";

$rocket = new RocketPayment($paymentAmount);
echo $rocket->processPayment() . "\n";
echo $rocket->paymentSuccess() . "\n";
?>