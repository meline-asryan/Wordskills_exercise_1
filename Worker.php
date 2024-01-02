<?php

class Worker
{
    private $initials;
    private $jobTitle;
    private $jobEntryYear;

    function __construct($initials, $jobTitle, $jobEntryYear)
    {
        $this->initials = $initials;
        $this->jobTitle = $jobTitle;
        $this->jobEntryYear = $jobEntryYear;
    }

    public function getInitials()
    {
        return $this->initials;
    }
    public function setInitials($initials): void
    {
        $this->initials = $initials;
    }


    public function getJobTitle()
    {
        return $this->jobTitle;
    }
    public function setJobTitle($jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }


    public function getJobEntryYear()
    {
        return $this->jobEntryYear;
    }
    public function setJobEntryYear($jobEntryYear): void
    {
        $this->jobEntryYear = $jobEntryYear;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

$workers = [];
for ($i = 1; $i <= 10; $i++)
{
    echo "\nInsert worker's №$i info:\n";
    $initials = readline("Worker initials: ");
    $jobTitle = readline("Job title: ");
    $jobEntryYear = readline("Job entry year: ");
    $workers[] = new Worker($initials,$jobTitle,$jobEntryYear);
}

////Exercise 6
///
////Sort with initials alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($workers, function($a, $b) {
//    return $a->getInitials() <=> $b->getInitials();
//});
////Alphabetically Bubble sort based on initials
for ($i = 0; $i < count($workers)-1; $i++){
    for ($j = 0; $j < count($workers)-$i-1; $j++){
        if (strcmp($workers[$j]->getInitials(), $workers[$j + 1]->getInitials()) > 0) {
            $temp = $workers[$j];
            $workers[$j] = $workers[$j + 1];
            $workers[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
//// Insert data
foreach ($workers as $worker) {
    echo "Worker initials: {$worker->getInitials()}, Job title: {$worker->getJobTitle()}, Job entry year: {$worker->getJobEntryYear()}\n";
}
echo "====================================================\nWorkers whose work experience greater then keyword inserted number.\n====================================================\n";
$keywordWorkExperience = readline("Insert keyword work experience: ");
$kwe = false;
foreach ($workers as $worker){
    if (date("Y") - $worker->getJobEntryYear() > $keywordWorkExperience){
        $kwe = true;
        echo "Worker initials: {$worker->getInitials()}\n";
    }
}
if (!$kwe){
    echo "No worker with this work experience.\n";
}