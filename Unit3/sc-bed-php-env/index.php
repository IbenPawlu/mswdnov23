<?php 
// Aritmhetic Operators
$a = 21;
$b = 2;
$intDiv = 8 / 2;
echo "<h5>Arithmetic Operator</h5>";
printf("<p>%d + %d = %d</p>", $a, $b, $a + $b);
printf("<p>%d - %d = %d</p>", $a, $b, $a - $b);
printf("<p>%d * %d = %d</p>", $a, $b, $a * $b);
printf("<p>%d / %d = %.1f</p>", $a, $b, $a / $b);
printf("<p>%d %% %d = %.1f</p>", $a, $b, $a % $b);
printf("<p>%d ** %d = %d</p>", $a, $b, $a ** $b);
echo "8 /2 = $intDiv, which is a " . gettype($intDiv);

echo "<h5>Increment & Decremenet Operators</h5>";
$a = 0;
$b = 0;
printf("<p>a is %d. After ++a, a is %d</p>", $a, ++$a);
printf("<p>b is %d. After b++, b is %d</p>", $b, $b++);
echo "<p>b is $b</p>";

echo "<h5>Assignment With Operation</h5>";
$a = 1;
printf("<p>The value of a is %d</p>", $a);
printf("<p>a += 5 = %d", $a+=5);
printf("<p>a -= 4 = %d", $a-=4);

echo "<h5> Assignment by Value</h5>";
$a = 20;
printf("<p>a starts with the value %d</p>", $a);
$b = $a;
$b = 30;
printf("<p>After changing b, a contains %d</p>", $a);

echo "<h5>Assignment By Reference</h5>";
$a = 20;
printf("<p>a starts with the value %d</p>", $a);
$b = &$a;
$b = 30;
printf("<p>After changing b, a contains %d</p>", $a);


// Control Flow
echo "<h5>If Statements</h5>";
$age = 25;
if ($age >= 18) {
    echo "You can drive a car legally in Malta!";
} else {
    echo "You can't drive a car legally in Malta!";
}

echo "<h5>Multiple Outcomes</h5>";
$pizzaChoice = 2;
if ($pizzaChoice === 1) {
    echo "<p>Pizza Margherita</p>";
} elseif ($pizzaChoice === 2){
    echo "<p>Pizza Pepperoni</p>";
} elseif ($pizzaChoice === 3){
    echo "<p>Pizza Mushroom</p>";
} else {
    echo "<p>Invalid Pizza Choice!</p>";
}

echo "<h5>Boolean Values</h5>";
$isRaining = false;
if ($isRaining === true) {
    echo "Better take an umbrella!";
} else {
    echo "Enjoy the sunny day!";
}

// Logical Operators
echo "<h5>Logical Operators</h5>";
$beanWeight = 50;
$waterWeight = 200;
if ($beanWeight >= 30 && $waterWeight >= 150) {
    echo "<p>Coffee Machine Working ... brbrbrbrrrr</p>";
} else {
    echo "<p>Please check beans & water!</p>";
}

$grindWeight = 15;
if ($beanWeight >= 30 || $grindWeight >= 20) {
    echo "<p>You have enough coffee</p>";
} else {
    echo "<p>Youy do not have enough coffee my guy</p>";
}

$bingo = 90;
switch ($bingo) {
    case 1: echo "<p>By itself, number 1</p>"; break;
    case 11: echo "<p>Long legs, number 11</p>"; break;
    case 90: echo "<p>The old woman, number 90</p>"; break;
    default: echo "You got a $bingo</p>";
}

//Iteration AKA Loop
echo "<h5>Iteration(Looping)</h5>";
$fishingPermitExpires = 17;
$currentDay = 8;
while($currentDay <= $fishingPermitExpires) {
    echo "<p>Fishing on day $currentDay</p>";
    $currentDay++;
}

$prospectPermitExpires = 17;
$currentDay = 8;
do {
    echo "<p>Prospecting on day $currentDay</p>";
    $currentDay++;
} while ($currentDay <= $prospectPermitExpires);

$diggingPermitExpires = 17;
for ($currentDay = 8; $currentDay <= $diggingPermitExpires; $currentDay++) {
    echo "<p>Digging on day $currentDay</p>";
}

$students = ['Valentino', 'Olga', 'Philipp', 'Keith'];
foreach($students as $student){
    echo "<p>$student is a student!</p>";
}