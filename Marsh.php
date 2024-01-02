<?php

class Marsh
{
    private $startingStation;
    private $endingStation;
    private $marshNumber;

    function __construct($startingStation, $endingStation, $marshNumber)
    {
        $this->startingStation = $startingStation;
        $this->endingStation = $endingStation;
        $this->marshNumber = $marshNumber;
    }


    public function getStartingStation()
    {
        return $this->startingStation;
    }
    public function setStartingStation($startingStation): void
    {
        $this->startingStation = $startingStation;
    }


    public function getEndingStation()
    {
        return $this->endingStation;
    }
    public function setEndingStation($endingStation): void
    {
        $this->endingStation = $endingStation;
    }


    public function getMarshNumber()
    {
        return $this->marshNumber;
    }
    public function setMarshNumber($marshNumber): void
    {
        $this->marshNumber = $marshNumber;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

$marshes = [];
for($i = 1; $i <= 8; $i++)
{
    echo "\nInsert marsh's №$i info:\n";
    $startingStation = readline("Starting station: ");
    $endingStation = readline("Ending station: ");
    $marshNumber = readline("Marsh number: ");
    $marshes[] = new Marsh($startingStation,$endingStation,$marshNumber);
}


////Exercise 10
///
////Sort with marsh number ascending
//////We can make sort in 2 ways, with usort or with standard sort methods
//usort($marshes, function($a, $b) {
//    return $a->getMarshNumber() <=> $b->getMarshNumber();
//});
////Ascending Bubble sort based on marsh number
//for ($i = 0; $i < count($marshes)-1; $i++){
//    for ($j = 0; $j < count($marshes)-$i-1; $j++){
//        if ($marshes[$j]->getMarshNumber() > $marshes[$j + 1]->getMarshNumber()) {
//            $temp = $marshes[$j];
//            $marshes[$j] = $marshes[$j + 1];
//            $marshes[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($marshes as $marsh) {
//    echo "Starting station: {$marsh->getStartingStation()}, Ending station: {$marsh->getEndingStation()}, Marsh number: {$marsh->getMarshNumber()}\n";
//}
//echo "====================================================\nMarshes which marsh number equal to keyword inserted marsh number.\n====================================================\n";
//$keywordMarshNumber = readline("Insert keyword marsh number: ");
//$kmn = false;
//foreach ($marshes as $marsh){
//    if ($marsh->getMarshNumber() == $keywordMarshNumber){
//        $kmn = true;
//        echo "Starting station: {$marsh->getStartingStation()}, Ending station: {$marsh->getEndingStation()}\n";
//    }
//}
//if (!$kmn){
//    echo "No trains with this marsh number.\n";
//}


////Exercise 11
///
////Sort with marsh number ascending
//////We can make sort in 2 ways, with usort or with standard sort methods
//usort($marshes, function($a, $b) {
//    return $a->getMarshNumber() <=> $b->getMarshNumber();
//});
////Ascending Bubble sort based on marsh number
for ($i = 0; $i < count($marshes)-1; $i++){
    for ($j = 0; $j < count($marshes)-$i-1; $j++){
        if ($marshes[$j]->getMarshNumber() > $marshes[$j + 1]->getMarshNumber()) {
            $temp = $marshes[$j];
            $marshes[$j] = $marshes[$j + 1];
            $marshes[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($marshes as $marsh) {
    echo "Starting station: {$marsh->getStartingStation()}, Ending station: {$marsh->getEndingStation()}, Marsh number: {$marsh->getMarshNumber()}\n";
}
echo "====================================================\nMarshes which starting or ending station equal to keyword inserted station.\n====================================================\n";
$keywordStation = readline("Insert keyword station: ");
$ks = false;
foreach ($marshes as $marsh){
    if ($marsh->getStartingStation() == $keywordStation || $marsh->getEndingStation() == $keywordStation){
        $ks = true;
        echo "Starting station: {$marsh->getStartingStation()}, Ending station: {$marsh->getEndingStation()}, Marsh number: {$marsh->getMarshNumber()}\n";
    }
}
if (!$ks){
    echo "No trains with this starting or ending station.\n";
}