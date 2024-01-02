<?php

class Note
{
    private $initials;
    private $phoneNumber;
    private $birth;

    function __construct($initials, $phoneNumber, $birth)
    {
        $this->initials = $initials;
        $this->phoneNumber = $phoneNumber;
        $this->birth = $birth;
    }


    public function getInitials()
    {
        return $this->initials;
    }
    public function setInitials($initials): void
    {
        $this->initials = $initials;
    }


    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getBirth()
    {
        return $this->birth;
    }
    public function setBirth($birth): void
    {
        $this->birth = $birth;
    }


    //Overloading
    public function __get($index)
    {
        return $this->birth[$index];
    }
    public function __set($index, $value)
    {
        $this->birth[$index] = $value;
    }
}

$notes = [];
for ($i = 1; $i <= 8; $i++)
{
    echo "Insert note's №$i info:\n";
    $initials = readline("Initials: ");
    $phoneNumber = readline("Phone number: ");
//    $birth = readline("Birthday: ");
//    $birth1 = explode('/',$birth);
//    $notes[] = new Note($initials, $phoneNumber, $birth1);
    $birth = [];
    $birth[0] = readline("Day: ");
    $birth[1] = readline("Month: ");
    $birth[2] = readline("Year: ");
    $notes[] = new Note($initials, $phoneNumber, $birth);
}


////Exercise 12
////
//// Sort with date days ascending
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($notes, function($a, $b) {
//    return $a->getBirth() <=> $b->getBirth();
//});
////Ascending order Bubble sort based on date days
//for ($i = 0; $i < count($notes)-1; $i++){
//    for ($j = 0; $j < count($notes)-$i-1; $j++){
//        if ($notes[$j]->getBirth() > $notes[$j + 1]->getBirth()) {
//            $temp = $notes[$j];
//            $notes[$j] = $notes[$j + 1];
//            $notes[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($notes as $note) {
//    echo "Initials: {$note->getInitials()}, Phone number: {$note->getPhoneNumber()}, Date: " . implode('/', $note->getBirth()) . "\n";
//}
//echo "====================================================\nNotes which phone number equal to keyword inserted phone number.\n====================================================\n";
//$keywordPhoneNumber = readline("Insert keyword phone number: ");
//$kpn = false;
//foreach ($notes as $note){
//    if ($note->getPhoneNumber() == $keywordPhoneNumber){
//        $kpn = true;
//        echo "Initials: {$note->getInitials()}, Date: " . implode('/', $note->getBirth()) . "\n";
//    }
//}
//if (!$kpn){
//    echo "No notes with this phone number.\n";
//}


////Exercise 13
////
//// Sort with initials alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($notes, function($a, $b) {
//    return $a->getInitials() <=> $b->getInitials();
//});
////Alphabetically order Bubble sort based on initials
//for ($i = 0; $i < count($notes)-1; $i++){
//    for ($j = 0; $j < count($notes)-$i-1; $j++){
//        if (strcmp($notes[$j]->getInitials(), $notes[$j + 1]->getInitials())>0) {
//            $temp = $notes[$j];
//            $notes[$j] = $notes[$j + 1];
//            $notes[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($notes as $note) {
//    echo "Initials: {$note->getInitials()}, Phone number: {$note->getPhoneNumber()}, Date: " . implode('/', $note->getBirth()) . "\n";
//}
//echo "====================================================\nNotes which birthday month equal to keyword inserted month.\n====================================================\n";
//$keywordBirthMonth = readline("Insert keyword birth month: ");
//$kbm = false;
//foreach ($notes as $note){
//    if ($note->getBirth()[1] == $keywordBirthMonth){
//        $kbm = true;
//        echo "Initials: {$note->getInitials()}, Phone number: {$note->getPhoneNumber()}, Date: " . implode('/', $note->getBirth()) . "\n";
//    }
//}
//if (!$kbm){
//    echo "No notes with this birthday month.\n";
//}


////Exercise 14
////
//// Sort with phone numbers first 3 digits ascending
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($notes, function($a, $b) {
//    return substr($a->getPhoneNumber(), 0, 3) <=> substr($b->getPhoneNumber(), 0, 3);
//});
////Ascending order Bubble sort based on phone number 3 digita
for ($i = 0; $i < count($notes)-1; $i++){
    for ($j = 0; $j < count($notes)-$i-1; $j++){
        if (substr($notes[$j]->getPhoneNumber(), 0, 3) > substr($notes[$j + 1]->getPhoneNumber(), 0, 3)) {
            $temp = $notes[$j];
            $notes[$j] = $notes[$j + 1];
            $notes[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($notes as $note) {
    echo "Initials: {$note->getInitials()}, Phone number: {$note->getPhoneNumber()}, Date: " . implode('/', $note->getBirth()) . "\n";
}
echo "====================================================\nNotes which last name equal to keyword inserted last name.\n====================================================\n";
$keywordLastName = readline("Insert keyword last name: ");
$kln = false;
foreach ($notes as $note){
    $ln = explode(" ",$note->getInitials());
    if ($ln[1] == $keywordLastName){
        $kln = true;
        echo "Initials: " . implode(' ',$ln) . ", Phone number: {$note->getPhoneNumber()}, Date: " . implode('/', $note->getBirth()) . "\n";
    }
}
if (!$kln){
    echo "No notes with this last name.\n";
}