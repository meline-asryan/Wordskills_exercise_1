<?php

class Train
{
    private $destination;
    private $trainNumber;
    private $departureTime;

    function __construct($destination, $trainNumber, $departureTime)
    {
        $this->destination = $destination;
        $this->trainNumber = $trainNumber;
        $this->departureTime = $departureTime;
    }


    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($destination): void
    {
        $this->destination = $destination;
    }


    public function getTrainNumber()
    {
        return $this->trainNumber;
    }
    public function setTrainNumber($trainNumber): void
    {
        $this->trainNumber = $trainNumber;
    }


    public function getDepartureTime()
    {
        return $this->departureTime;
    }
    public function setDepartureTime($departureTime): void
    {
        $this->departureTime = $departureTime;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

$trains = [];
for($i = 1; $i <= 8; $i++)
{
    echo "\nInsert train's №$i info:\n";
    $destination = readline("Destination: ");
    $trainNumber = readline("Train number: ");
    $departureTime = readline("Departure time: ");
    $trains[] = new Train($destination,$trainNumber,$departureTime);
}


////Exercise 7
///
////Sort with destination alphabetically
//////We can make sort in 2 ways, with usort or with standard sort methods
//usort($trains, function($a, $b) {
//    return $a->getDestination() <=> $b->getDestination();
//});
////Alphabetically Bubble sort based on initials
//for ($i = 0; $i < count($trains)-1; $i++){
//    for ($j = 0; $j < count($trains)-$i-1; $j++){
//        if (strcmp($trains[$j]->getDestination(), $trains[$j + 1]->getDestination()) > 0) {
//            $temp = $trains[$j];
//            $trains[$j] = $trains[$j + 1];
//            $trains[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
//////// Insert data
//foreach ($trains as $train) {
//    echo "Destination: {$train->getDestination()}, Train number: {$train->getTrainNumber()}, Departure time: {$train->getDepartureTime()}\n";
//}
//echo "====================================================\nTrains which departure time greater then or equal to keyword inserted time.\n====================================================\n";
//$keywordTime = readline("Insert keyword time: ");
//$kt = false;
//foreach ($trains as $train){
//    if ($train->getDepartureTime() >= $keywordTime){
//        $kt = true;
//        echo "Destination: {$train->getDestination()}, Train number: {$train->getTrainNumber()}\n";
//    }
//}
//if (!$kt){
//    echo "No trains with this departure time.\n";
//}


////Exercise 8
///
////Sort with departure time ascending
//////We can make sort in 2 ways, with usort or with standard sort methods
//usort($trains, function($a, $b) {
//    return $a->getDepartureTime() <=> $b->getDepartureTime();
//});
//////Ascending Bubble sort based on departure time
//for ($i = 0; $i < count($trains)-1; $i++){
//    for ($j = 0; $j < count($trains)-$i-1; $j++){
//        if ($trains[$j]->getDepartureTime()>$trains[$j + 1]->getDepartureTime()) {
//            $temp = $trains[$j];
//            $trains[$j] = $trains[$j + 1];
//            $trains[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
//////// Insert data
//foreach ($trains as $train) {
//    echo "Destination: {$train->getDestination()}, Train number: {$train->getTrainNumber()}, Departure time: {$train->getDepartureTime()}\n";
//}
//echo "====================================================\nTrains which destination equal to keyword inserted destination.\n====================================================\n";
//$keywordDest = readline("Insert keyword destination: ");
//$kd = false;
//foreach ($trains as $train){
//    if ($train->getDestination() == $keywordDest){
//        $kd = true;
//        echo "Train number: {$train->getTrainNumber()}, Departure time: {$train->getDepartureTime()}\n";
//    }
//}
//if (!$kd){
//    echo "No trains with this destination.\n";
//}


////Exercise 9
///
////Sort with train number ascending
//////We can make sort in 2 ways, with usort or with standard sort methods
//usort($trains, function($a, $b) {
//    return $a->getTrainNumber() <=> $b->getTrainNumber();
//});
//////Ascending Bubble sort based on train number
for ($i = 0; $i < count($trains)-1; $i++){
    for ($j = 0; $j < count($trains)-$i-1; $j++){
        if ($trains[$j]->getTrainNumber()>$trains[$j + 1]->getTrainNumber()) {
            $temp = $trains[$j];
            $trains[$j] = $trains[$j + 1];
            $trains[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
////// Insert data
foreach ($trains as $train) {
    echo "Destination: {$train->getDestination()}, Train number: {$train->getTrainNumber()}, Departure time: {$train->getDepartureTime()}\n";
}
echo "====================================================\nTrains which train number equal to keyword inserted train number.\n====================================================\n";
$keywordDest = readline("Insert keyword train number: ");
$ktn = false;
foreach ($trains as $train){
    if ($train->getTrainNumber() == $keywordDest){
        $ktn = true;
        echo "Destination: {$train->getDestination()}, Departure time: {$train->getDepartureTime()}\n";
    }
}
if (!$ktn){
    echo "No trains with this train number.\n";
}