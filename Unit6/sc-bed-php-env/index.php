<?php
// Create an array
$cities = ['London', 'Paris', 'New York', 'Valletta', 'Bangkok'];
print_r($cities);

// Another way to create an array
echo '<br><br>';
$cities2 = array('London', 'Paris', 'New York', 'Valletta', 'Bangkok');
print_r($cities2);

// An associative array
echo '<br><br>';
$company = [
    'CEO' => 'Alice Anderson',
    'CTO' => 'Bob Barker',
    'CFO' => 'Craig Coleman'
];
print_r($company);

// Accessing array values
printf('<p>The second city is %s ', $cities[1]);
printf('<p>The CEO of the company is %s ', $company['CEO']);


// Getting the size of the array
printf('<p>There are %d cities in the array </p>', count($cities));

// An example of a 2D array
$gradebook = [
    'John Jefferson' => ['English', 'Geography', 'Physics'],
    'Georgia Graham' => ['English', 'French', 'Chemistry'],
    'Harriet Hasan' => ['Biology', 'Philosophy']
];
echo "<br><br>";
var_dump($gradebook);

// An example of a 3d Array
$gradeBookDetail = [
    'John Jefferson' => [
    'English' => ['Midterm' => 90, 'Final' => 85],
    'Geography' => ['Midterm' => 62, 'Final' => 83],
    'Physics' => ['Midterm' => 73, 'Final' => 65]
    ],
    'Georgia Graham' => [
    'English' => ['Midterm' => 92, 'Final' => 98],
    'Geography' => ['Midterm' => 91, 'Final' => 100],
    'Physics' => ['Midterm' => 76, 'Final' => 78]
    ],
    'Harriet Hasan' => [
    'Biology' => ['Midterm' => 89, 'Final' => 81],
    'Philosophy' => ['Midterm' => 76, 'Final' => 82]
    ]
   ];
   var_dump($gradeBookDetail);
   printf('Harriet scored %d in her Philosophy final.', $gradeBookDetail['Harriet Hasan']['Philosophy']['Final']);

// Traversing an array(looping)
$planets = ['Mercury'=>'Rocky', 'Venus'=>'Rocky', 'Earth'=>'Rocky',
 'Mars'=>'Rocky', 'Jupiter'=>'Gas', 'Saturn'=>'Gas',
 'Uranus'=>'Ice', 'Neptune'=>'Gas'];
 $planets2 = [
    ['name' => 'Mercury', 'type' => 'Rocky'],
    ['name' => 'Venus', 'type' => 'Rocky'],
    ['name' => 'Earth', 'type' => 'Rocky'],
    ['name' => 'Mars', 'type' => 'Rocky'],
    ['name' => 'Jupiter', 'type' => 'Gas'],
    ['name' => 'Saturn', 'type' => 'Gas'],
    ['name' => 'Uranus', 'type' => 'Ice'],
    ['name' => 'Neptune', 'type' => 'Gas'],
 ];

 foreach($planets2 as $planet) {
    printf('<p>%s is a %s planet.</p>', $planet['name'], $planet['type']);
 }
 print_r($planets2[1]);

// Searching for an item in the array
$jupiterMoons = ['Europa', 'Io', 'Ganymede', 'Callisto'];
$search = 'Io';
if (in_array($search, $jupiterMoons)) {
    printf('<p>%s is a moon of Jupiter</p>', $search);
} else {
    printf('<p>%s is not a moon of Jupiter</p>', $search);
}

$subjectToCheck = 'Physics';
$studentToCheck = 'John Jefferson';

// Check if the subject exists for the student
if (isset($gradeBookDetail[$studentToCheck][$subjectToCheck])) {
    echo "$subjectToCheck is a subject for $studentToCheck.";
} else {
    echo "$subjectToCheck is not a subject for $studentToCheck.";
}

?>