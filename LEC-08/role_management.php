<?php
trait Subscriber
{
    function SubscribeLogin()
    {
        echo "Your are Logged as subscribe<br>";
    }
}

trait Contributer
{
    function ContributerLogin()
    {
        echo "Your are a logged in contributer<br>";
    }
}

trait Admin
{
    function AdminLogin()
    {
        echo "You are Logged as a Admin<br>";
    }
}

class Member
{
    use Subscriber,Contributer,Admin;

    public function run()
    {
        $this->SubscribeLogin();
        $this->ContributerLogin();
        $this->AdminLogin();

        echo "All Members are log in";
    }
}

$mem = new Member();
$mem->run();

?>