<?php

class Order
{
    private $payerAccount;
    private $recipientAccount;
    private $transferredAmount;

    function __construct($payerAccount, $recipientAccount, $transferredAmount)
    {
        $this->payerAccount = $payerAccount;
        $this->recipientAccount = $recipientAccount;
        $this->transferredAmount = $transferredAmount;
    }

    public function getPayerAccount()
    {
        return $this->payerAccount;
    }
    public function setPayerAccount($payerAccount): void
    {
        $this->payerAccount = $payerAccount;
    }

    public function getRecipientAccount()
    {
        return $this->recipientAccount;
    }
    public function setRecipientAccount($recipientAccount): void
    {
        $this->recipientAccount = $recipientAccount;
    }

    public function getTransferredAmount()
    {
        return $this->transferredAmount;
    }
    public function setTransferredAmount($transferredAmount): void
    {
        $this->transferredAmount = $transferredAmount;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

$orders = [];
for ($i = 1; $i <= 3; $i++) //8
{
    echo "\nInsert order's №$i info:\n";
    $payerAccount = readline("Payer account: ");
    $recipientAccount = readline("Recipient account: ");
    $transferredAmount = intval(readline("Transferred amount: "));
    $orders[] = new Order($payerAccount,$recipientAccount,$transferredAmount);
}


////Exercise 18
///
////Sort with payer account alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($orders, function($a, $b) {
//    return $a->getPayerAccount() <=> $b->getPayerAccount();
//});
////Alphabetically Bubble sort based on payer account
for ($i = 0; $i < count($orders)-1; $i++){
    for ($j = 0; $j < count($orders)-$i-1; $j++){
        if (strcmp($orders[$j]->getPayerAccount(), $orders[$j + 1]->getPayerAccount()) > 0) {
            $temp = $orders[$j];
            $orders[$j] = $orders[$j + 1];
            $orders[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($orders as $order) {
    echo "Payer account: {$order->getPayerAccount()}, Recipient account: {$order->getRecipientAccount()}, Transferred amount: {$order->getTransferredAmount()}\n";
}
echo "====================================================\nOrders which transferred amount equal to keyword inserted amount.\n====================================================\n";
$keywordTransferredAmount = readline("Insert keyword transferred amount: ");
$kta = false;
foreach ($orders as $order){
    if ($order->getTransferredAmount() == $keywordTransferredAmount){
        $kta = true;
        echo "Payer account: {$order->getPayerAccount()}, Recipient account: {$order->getRecipientAccount()}\n";
    }
}
if (!$kta){
    echo "No order with this transferred amount.\n";
}

