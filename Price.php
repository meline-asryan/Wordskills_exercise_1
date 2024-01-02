<?php

class Price
{
    private $productName;
    private $productShopName;
    private $productPrice;

    function __construct($productName, $productShopName, $productPrice)
    {
        $this->productName = $productName;
        $this->productShopName = $productShopName;
        $this->productPrice = $productPrice;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    public function getProductShopName()
    {
        return $this->productShopName;
    }
    public function setProductShopName($productShopName): void
    {
        $this->productShopName = $productShopName;
    }


    public function getProductPrice()
    {
        return $this->productPrice;
    }
    public function setProductPrice($productPrice): void
    {
        $this->productPrice = $productPrice;
    }


    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

$prices = [];
for ($i = 1; $i <= 8; $i++)
{
    echo "\nInsert price's №$i info:\n";
    $productName = readline("Product name: ");
    $productShopName = readline("Product shop name: ");
    $productPrice = intval(readline("Product price: "));
    $prices[] = new Price($productName,$productShopName,$productPrice);
}


////Exercise 18
///
////Sort with product name alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($prices, function($a, $b) {
//    return $a->getProductName() <=> $b->getProductName();
//});
////Alphabetically Bubble sort based on product name
//for ($i = 0; $i < count($prices)-1; $i++){
//    for ($j = 0; $j < count($prices)-$i-1; $j++){
//        if (strcmp($prices[$j]->getProductName(), $prices[$j + 1]->getProductName()) > 0) {
//            $temp = $prices[$j];
//            $prices[$j] = $prices[$j + 1];
//            $prices[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($prices as $price) {
//    echo "Product name: {$price->getProductName()}, Product shop name: {$price->getProductShopName()}, Product price: {$price->getProductPrice()}\n";
//}
//echo "====================================================\nProducts which name is equal to keyword inserted name.\n====================================================\n";
//$keywordProductName = readline("Insert keyword product name: ");
//$kpn = false;
//foreach ($prices as $price){
//    if ($price->getProductName() == $keywordProductName){
//        $kpn = true;
//        echo "Product shop name: {$price->getProductShopName()}, Product price: {$price->getProductPrice()}\n";
//    }
//}
//if (!$kpn){
//    echo "No product with this name.\n";
//}



////Exercise 19
///
////Sort with product name alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($prices, function($a, $b) {
//    return $a->getProductShopName() <=> $b->getProductShopName();
//});
////Alphabetically Bubble sort based on product name
for ($i = 0; $i < count($prices)-1; $i++){
    for ($j = 0; $j < count($prices)-$i-1; $j++){
        if (strcmp($prices[$j]->getProductShopName(), $prices[$j + 1]->getProductShopName()) > 0) {
            $temp = $prices[$j];
            $prices[$j] = $prices[$j + 1];
            $prices[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($prices as $price) {
    echo "Product name: {$price->getProductName()}, Product shop name: {$price->getProductShopName()}, Product price: {$price->getProductPrice()}\n";
}
echo "====================================================\nProducts which shop name is equal to keyword inserted shop name.\n====================================================\n";
$keywordProductShopName = readline("Insert keyword product shop name: ");
$kpshn = false;
foreach ($prices as $price){
    if ($price->getProductShopName() == $keywordProductShopName){
        $kpshn = true;
        echo "Product name: {$price->getProductName()}, Product price: {$price->getProductPrice()}\n";
    }
}
if (!$kpshn){
    echo "No product with this shop name.\n";
}