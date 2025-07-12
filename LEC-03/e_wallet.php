<?php

$walletBlance =  20000;


function getBlance()
{
    global $walletBlance;
    return $walletBlance;
}


function deposit($depAmount)
{
    global $walletBlance;

    if($depAmount > 100)
    {
        $walletBlance += $depAmount;
        echo "Deposit Amount: $depAmount"."<br>"."New Blance: $walletBlance <br>";
    }
    else
    {
        echo "Invalid Amount";
    }
}


function sufficientBlance($drawAmount)
{
    global $walletBlance;
    return $walletBlance > $drawAmount;
}

function withDraw($amount)
{
    global $walletBlance;

    if($amount > 0)
    {
        if(sufficientBlance($amount))
        {
            $walletBlance -= $amount;
            echo "Withdraw Amount : $amount | Available Amount: $walletBlance";
        }
        else
        {
            echo "Insufficent Blance <br>";
            echo "Your Amount is : $walletBlance";
        }
    }
    else
    {
        echo "Your Current Blance: $walletBlance";
    }
}

deposit(100000);
withDraw(0);
withDraw(100000000);
withDraw(3000);
?>