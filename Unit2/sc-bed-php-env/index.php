<?php

$myName = "Keith";
$mySurname = "Camilleri";

// The . is used for concatenation
echo '<p>My name is '.$myName .' '. $mySurname. '</p>';

// Variable interpolation
echo "<p>My name is $myName $mySurname.</p>";

// Heredoc String
$shortStory = <<<STORY
<p> There once was a ship that put to sea and the name of the ship was a billy of tea</p>
<p>Blow me bully boys blow, soon may the wellerman come</p>
STORY;
echo $shortStory;

// Fun with data types
$anInt = 42;
echo "<p> The Value is $anInt, type is " . gettype($anInt) . '</p>';

$aFloat = 42.21;
echo "<p> The Value is $aFloat, type is " . gettype($aFloat) . '</p>';

$aCountry = "Malta";
echo "<p> The Value is $aCountry, type is " . gettype($aCountry) . '</p>';

// Using Arrays
$names = ['Valentino', 'Olga', 'Warren', 'Daniel'];
echo '<p>Names of Students:</p>';
print_r($names);

$company = ["CEO" =>"Alice Anderson", "CTO" =>"Bob Barker"];
echo "<p> Company Executives</p>";
print_r($company);


// Type Coercion
$val1 = 89;
$val2 = "42";
$val3 = $val1 + $val2;
echo "<p>Result is: $val3 and type is " . gettype($val3) . ".</p>";

// Type Casting
$val4 = "29";
$val5 = 42.82;
$val6 = (int) $val4 + (int) $val5;
echo $val6;

// Constant
define("PI", 3.14169);
echo "<p> Approximate value of PI is ". PI. "</p>";

const L = 6.02e23;
echo "<p>Approximate Avogadro constant: " . L . "</p>";

// Functions
function greetUser(){
    return "<p>Hello there!</p>";
}
echo greetUser();

function greetPeeps($name){
    return "Hello There!, $name!";
}
echo greetPeeps("Oksana");

// Using printf
$animal = "fox";
printf("<p>%s Did you know that %s has a %s?</p>", $animal, $myName, "Dog");

$cartTotal = 89.6592;
printf ("<p>Total in your cart: €%.2F</p>", $cartTotal);

$student1 = 4;
$student2 = 36;
$student3 = 163;
printf ("<p>Student 1: %03d, Student 2: %03d, Student 3: %03d</p>",$student1,$student2,$student3);

// Variable Inspection
$sampleArray = ["Joe", 12, 11.23, true, new stdClass()];
echo "<p>The first item in the array is $sampleArray[1].</p>";
print_r($sampleArray);

var_dump($sampleArray);

// Checking if a Variable exists
$firstVar = 100;
$secondVar = null;
echo "<p>First variable: " . (isset($firstVar) ? "Is Set" : "Not Set") . "</p>";
echo "<p>Second variable: " . (isset($secondVar) ? "Is Set" : "Not Set") . "</p>";