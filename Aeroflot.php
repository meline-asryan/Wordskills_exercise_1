<?php

class Aeroflot
{
    private $destination;
    private $flightNumber;
    private $aircraftType;

    public function __construct($destination, $flightNumber, $aircraftType) {
        $this->destination = $destination;
        $this->flightNumber = $flightNumber;
        $this->aircraftType = $aircraftType;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function setDestination($destination) {
        $this->destination = $destination;
    }

    public function getFlightNumber() {
        return $this->flightNumber;
    }

    public function setFlightNumber($flightNumber) {
        $this->flightNumber = $flightNumber;
    }

    public function getAircraftType() {
        return $this->aircraftType;
    }

    public function setAircraftType($aircraftType) {
        $this->aircraftType = $aircraftType;
    }

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }
}


$aeroflots = [];
for ($i = 1; $i <= 7; $i++) {
    echo "\nInsert aeroflot's №$i info:\n";
    $destination = readline("Destination: ");
    $flightNumber = readline("Flight number: ");
    $aircraftType = readline("Aircraft type: ");
    $aeroflots[] = new Aeroflot($destination, $flightNumber, $aircraftType);
}

////Exercise 4
///
////Sort with flight number in ascending order
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($aeroflots, function($a, $b) {
//    return $a->getFlightNumber() <=> $b->getFlightNumber();
//});
////Ascending order Bubble sort based on flight number
//for ($i = 0; $i < count($aeroflots)-1; $i++){
//    for ($j = 0; $j < count($aeroflots)-$i-1; $j++){
//        if ($aeroflots[$j]->getFlightNumber() > $aeroflots[$j + 1]->getFlightNumber()) {
//            $temp = $aeroflots[$j];
//            $aeroflots[$j] = $aeroflots[$j + 1];
//            $aeroflots[$j + 1] = $temp;
//        }
//    }
//}
////echo "\n====================================================\n";
////// Insert data
//foreach ($aeroflots as $aeroflot) {
//    echo "Destination: {$aeroflot->getDestination()}, Flight number: {$aeroflot->getFlightNumber()}, Aircraft type: {$aeroflot->getAircraftType()}\n";
//}
//echo "====================================================\nAeroflots which destination equal to keyword inserted destination.\n====================================================\n";
//$keywordDestination = readline("Insert keyword destination: ");
//$kd = false;
//foreach ($aeroflots as $aeroflot){
//    if ($aeroflot->getDestination() == $keywordDestination){
//        $kd = true;
//        echo "Flight number: {$aeroflot->getFlightNumber()}, Aircraft type: {$aeroflot->getAircraftType()}\n";
//    }
//}
//if (!$kd){
//    echo "No aeroflot with this destination.\n";
//}


////Exercise 5
///
////Sort with destination alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($aeroflots, function($a, $b) {
//    return $a->getDestination() <=> $b->getDestination();
//});
////Alphabetically Bubble sort based on destination
for ($i = 0; $i < count($aeroflots)-1; $i++){
    for ($j = 0; $j < count($aeroflots)-$i-1; $j++){
        if (strcmp($aeroflots[$j]->getDestination(), $aeroflots[$j + 1]->getDestination()) > 0) {
            $temp = $aeroflots[$j];
            $aeroflots[$j] = $aeroflots[$j + 1];
            $aeroflots[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($aeroflots as $aeroflot) {
    echo "Destination: {$aeroflot->getDestination()}, Flight number: {$aeroflot->getFlightNumber()}, Aircraft type: {$aeroflot->getAircraftType()}\n";
}
echo "====================================================\nAeroflots which aircraft type equal to keyword inserted aircraft type.\n====================================================\n";
$keywordAircraftType = readline("Insert keyword aircraft type: ");
$kai = false;
foreach ($aeroflots as $aeroflot){
    if ($aeroflot->getAircraftType() == $keywordAircraftType){
        $kai = true;
        echo "Destination: {$aeroflot->getDestination()}, Flight number: {$aeroflot->getFlightNumber()}\n";
    }
}
if (!$kai){
    echo "No aeroflot with this aircraft type.\n";
}