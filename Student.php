<?php

class Student
{
    private $initials;
    private $groupNumber;
    private $grades;

    public function __construct($initials, $groupNumber, $grades)
    {
        $this->initials = $initials;
        $this->groupNumber = $groupNumber;
        $this->grades = $grades;
    }

    public function getInitials()
    {
        return $this->initials;
    }
    public function setInitials($initials)
    {
        $this->initials = $initials;
    }

    public function getGroupNumber()
    {
        return $this->groupNumber;
    }
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
    }

    public function getGrades()
    {
        return $this->grades;
    }
    public function setGrades($grades)
    {
        $this->grades=$grades;
    }

    //Overloading
    public function __get($index)
    {
        return $this->grades[$index];
    }
    public function __set($index, $value)
    {
        $this->grades[$index] = $value;
    }

    //Exercise 1, 2
    public function getAverageGrade() {
        $s = array_sum($this->grades);
        $q = count($this->grades);
        $average = $s / $q;
        return $average;
    }

    //Exercise 2
    public function hasGradeFour()
    {
        return in_array(4, $this->grades);
    }
    public function hasGradeFive()
    {
        return in_array(5, $this->grades);
    }

    //Exercise 3
    public function hasGradeTwo()
    {
        return in_array(2, $this->grades);
    }

}

$students = [];
for ($i = 1; $i <= 10; $i++) {
    echo "Insert student's №$i info:\n";
    $initials = readline("Initials: ");
    $groupNumber = readline("Group number: ");
    $grades = [];
    for ($j = 1; $j <= 5; $j++) {
        $grades[] = readline("Grade $j: ");
    }
    $students[] = new Student($initials, $groupNumber, $grades);
}

////Exercise 1
////
//// Sort with group number
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($students, function($a, $b) {
//    return $a->getGroupNumber() <=> $b->getGroupNumber();
//});
////Ascending order Bubble sort based on group number
//for ($i = 0; $i < count($students)-1; $i++){
//    for ($j = 0; $j < count($students)-$i-1; $j++){
//        if ($students[$j]->getGroupNumber() > $students[$j + 1]->getGroupNumber()) {
//            $temp = $students[$j];
//            $students[$j] = $students[$j + 1];
//            $students[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
//// Insert data
//$AverageGreaterThanFour = false;
//foreach ($students as $student) {
//    echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}, Grades: " . implode(', ', $student->getGrades()) . "\n";
//}
//
//echo "====================================================\nStudents whose average greater than 4.\n====================================================\n";
//foreach ($students as $student) {
//    if ($student->getAverageGrade() > 4.0) {
//        echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}\n";
//        $AverageGreaterThanFour = true;
//    }
//}
//if (!$AverageGreaterThanFour) {
//    echo "No students with average grade greater than four 4.0.\n";
//}



////Exercise 2
///
//// Sort with average grade
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($students, function ($a, $b) {
//    return $a->getAverageGrade() <=> $b->getAverageGrade();
//});
////Ascending order Bubble sort based on average grade
//for ($i = 0; $i < count($students)-1; $i++){
//    for ($j = 0; $j < count($students)-$i-1; $j++){
//        if ($students[$j]->getAverageGrade() > $students[$j + 1]->getAverageGrade()) {
//            $temp = $students[$j];
//            $students[$j] = $students[$j + 1];
//            $students[$j + 1] = $temp;
//        }
//    }
//}
//echo "\n====================================================\n";
//// Insert data
//$studentsWithHighGrades = false;
//foreach ($students as $student) {
//    echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}, Grades: " . implode(', ', $student->getGrades()) . ", Average: {$student->getAverageGrade()}\n";
//}
//
//echo "====================================================\nStudents whose any grade is 4 or 5.\n====================================================\n";
//foreach ($students as $student) {
//    if (in_array(4, $student->getGrades()) || in_array(5, $student->getGrades())) {
//        echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}\n";
//        $studentsWithHighGrades = true;
//    }
//}
//
//if (!$studentsWithHighGrades) {
//    echo "No students with grades 4 or 5.\n";
//}



////Exercise 3
///
////Sort alphabetically
////We can make sort in 2 ways, with usort or with standard sort methods
//usort($students, function ($a, $b) {
//    return $a->getInitials() <=> $b->getInitials();
//});
////Alphabetically Bubble sort based on initials
for ($i = 0; $i < count($students)-1; $i++){
    for ($j = 0; $j < count($students)-$i-1; $j++){
        if (strcmp($students[$j]->getInitials(), $students[$j + 1]->getInitials()) > 0) {
            $temp = $students[$j];
            $students[$j] = $students[$j + 1];
            $students[$j + 1] = $temp;
        }
    }
}
echo "\n====================================================\n";
// Insert data
$studentsWithGradeTwo = false;
foreach ($students as $student) {
    echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}, Grades: " . implode(', ', $student->getGrades()) . "\n";
}

echo "====================================================\nStudents whose any grade is 2.\n====================================================\n";
foreach ($students as $student) {
    if (in_array(2, $student->getGrades())) {
        echo "Student: {$student->getInitials()}, Group: {$student->getGroupNumber()}\n";
        $studentsWithGradeTwo = true;
    }
}

if (!$studentsWithGradeTwo) {
    echo "No students with grades 2.\n";
}