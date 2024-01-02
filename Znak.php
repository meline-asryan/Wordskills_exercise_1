<?php

class Znak
{
    private $initials;
    private $zodiac;
    private $birth;

    function __construct($initials, $zodiac, $birth)
    {
        $this->initials = $initials;
        $this->zodiac = $zodiac;
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

    public function getZodiac()
    {
        return $this->zodiac;
    }
    public function setZodiac($zodiac): void
    {
        $this->zodiac = $zodiac;
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

$znaks = [];
for ($i = 1; $i <= 8; $i++)
{
    echo "Insert znak's №$i info:\n";
    $initials = readline("Initials: ");
    $zodiac = readline("Zodiac: ");
//    $birth = readline("Birthday: ");
//    $birth1 = explode('/',$birth);
//    $znaks[] = new Note($initials, $zodiac, $birth1);
    $birth = [];
    $birth[0] = readline("Day: ");
    $birth[1] = readline("Month: ");
    $birth[2] = readline("Year: ");
    $znaks[] = new Znak($initials, $zodiac, $birth);
}

////Exercise 15
////
//// Sort with date days ascending
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($znaks, function($a, $b) {
//    return $a->getBirth() <=> $b->getBirth();
//});
////Ascending order Bubble sort based on date days
//for ($i = 0; $i < count($znaks)-1; $i++){
//    for ($j = 0; $j < count($znaks)-$i-1; $j++){
//        if ($znaks[$j]->getBirth() > $znaks[$j + 1]->getBirth()) {
//            $temp = $znaks[$j];
//            $znaks[$j] = $znaks[$j + 1];
//            $znaks[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($znaks as $znak) {
//    echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
//}
//echo "====================================================\nZnaks which last name equal to keyword inserted last name.\n====================================================\n";
//$keywordLastName = readline("Insert keyword last name: ");
//$kln = false;
//foreach ($znaks as $znak){
//    $ln = explode(' ',$znak->getInitials());
//    if ($ln[1] == $keywordLastName){
//        $kln = true;
//        echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
//    }
//}
//if (!$kln){
//    echo "No znaks with this last name.\n";
//}


////Exercise 16
////
//// Sort with date days ascending
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($znaks, function($a, $b) {
//    return $a->getBirth() <=> $b->getBirth();
//});
////Ascending order Bubble sort based on date days
//for ($i = 0; $i < count($znaks)-1; $i++){
//    for ($j = 0; $j < count($znaks)-$i-1; $j++){
//        if ($znaks[$j]->getBirth() > $znaks[$j + 1]->getBirth()) {
//            $temp = $znaks[$j];
//            $znaks[$j] = $znaks[$j + 1];
//            $znaks[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
////// Insert data
//foreach ($znaks as $znak) {
//    echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
//}
//echo "====================================================\nZnaks which zodiac equal to keyword inserted zodiac.\n====================================================\n";
//$keywordZodiac = readline("Insert keyword zodiac: ");
//$kz = false;
//foreach ($znaks as $znak){
//    if ($znak->getZodiac() == $keywordZodiac){
//        $kz = true;
//        echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
//    }
//}
//if (!$kz){
//    echo "No znaks with this zodiac.\n";
//}



////Exercise 17
////
//// Sort with zodiac alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($znaks, function($a, $b) {
//    return $a->getZodiac() <=> $b->getZodiac();
//});
////Alphabetically order Bubble sort based on zodiac
for ($i = 0; $i < count($znaks)-1; $i++){
    for ($j = 0; $j < count($znaks)-$i-1; $j++){
        if (strcmp($znaks[$j]->getZodiac(), $znaks[$j + 1]->getZodiac())>0) {
            $temp = $znaks[$j];
            $znaks[$j] = $znaks[$j + 1];
            $znaks[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($znaks as $znak) {
    echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
}
echo "====================================================\nZnaks which birthday month equal to keyword inserted birthday month.\n====================================================\n";
$keywordBirthMonth = readline("Insert keyword birthday month: ");
$kbm = false;
foreach ($znaks as $znak){
    if ($znak->getBirth()[1] == $keywordBirthMonth){
        $kbm = true;
        echo "Initials: {$znak->getInitials()}, Zodiac: {$znak->getZodiac()}, Date: " . implode('/', $znak->getBirth()) . "\n";
    }
}
if (!$kbm){
    echo "No znaks with this birthday month.\n";
}