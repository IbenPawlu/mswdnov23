<?php 
namespace unit7;
include 'lib/com/icemalta/libpayroll/payroll.php';

use lib\com\icemalta\libpayroll\payroll\Employee as PayrollEmployee;

class Employee{

    // Class Constants
    public const CURRENCY = '€';

    // Static Member
    private static array $employeeList = [];

    // Creating Properties
    protected string $name;
    protected string $surname;
    protected string $jobTitle;
    protected float $hourlyRate;
    protected bool $paidOvertime = false;

    // Creating Constructors
    public function __construct(string $name, string $surname, string $jobTitle, float $hourlyRate = 0, bool $paidOvertime = false){
        $this->name = $name;
        $this->surname = $surname;
        $this->jobTitle = $jobTitle;
        $this->hourlyRate = $hourlyRate;
        $this->paidOvertime = $paidOvertime;
        self::$employeeList[] = $this;
    }

    // Getters & Setters
    public static function getEmployees(): array{
        return self::$employeeList;
    }
    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name):void{
        $this->name = $name;
    }
    public function getSurname(string $surname): string{
        return $this->surname;
    }
    public function setSurname(string $surname):void{
        $this->surname = $surname;
    }
    public function getJobTitle(){
        return $this->jobTitle;
    }
    public function setJobTitle(string $jobTitle): void{
        $this->jobTitle = $jobTitle;
    }
    public function getHourlyRate(): float{
        return $this->hourlyRate;
    }
    public function setHourlyRate(float $hourlyRate): void{
        if(is_numeric($hourlyRate) && $hourlyRate > 0) {
            $this->hourlyRate = $hourlyRate;
        }
    }

    // Creating Methods
    public function getBasicDetailsString(): string{
        return "$this->name $this->surname, $this->jobTitle";
    }
    public function getGrossPay(float $hoursWorked): float{
        return $hoursWorked * $this->hourlyRate;
    }
}

// Creating a sub-class of Employee
class TeamLead extends Employee{

    // Creating a constructor
    public function __construct(string $name, string $surname, string $jobTitle, float $hourlyRate = 0, bool $paidOvertime = false, float $bonusEntitlement = 0){
        parent::__construct($name, $surname, $jobTitle, $hourlyRate, $paidOvertime);
        $this->bonusEntitlement = $bonusEntitlement;
    }

    //Creating the Sub-class's Property
    protected float $bonusEntitlement = 0;

    // Creating a Getter & Setter for TeamLead sub-class
    public function getBonusEntitlement(){
        return $this->bonusEntitlement;
    }
    public function setBonusEntitlement(float $bonusEntitlement): void{
        $this->bonusEntitlement = $bonusEntitlement;
    }

    // Creating Methods for the sub-class
    public function getGrossPay(float $hoursWorked): float{
        return ($hoursWorked * $this->hourlyRate) + $this->bonusEntitlement;
    }
}

// Creating 1st object in a Class
$emp1 = new Employee('Alice', 'Anderson', 'Head of Technology');
$emp2 = new Employee('Bob', 'Barker', 'Chief Marketing Officer');
$emp3 = new Employee('Claire', 'Curmi', 'Junior Programmer', 30);
$emp4 = new TeamLead('Dave', 'Bautista', 'Lead Programmer', 30, true, 4000);

?>

         <!-- HTML Starts Here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP In PHP</title>
</head>

<body>
    <h1>OOP</h1>
    <p> <?php echo $emp1->getBasicDetailsString() ?> </p>
    <p> <?php echo $emp2->getBasicDetailsString() ?> </p>
    <p> 
        Name:<?php echo $emp3->getBasicDetailsString() ?> <br>
        Gross Pay: <?= $emp3->getGrossPay(160) ?>
        <?= $emp4->getGrossPay(1920)?><br>
        <?php foreach(Employee::getEmployees() as $employee){
            printf("%s, %s, %s, %s", $employee->getName(), $employee->getSurname(2),$employee->getJobTitle(),$employee instanceof TeamLead ? 'Team Lead' : 'Employee');
        } 
        ?>
    </p>
    <h3>Using the Payroll Library</h3>
    <?php
        $joe = new PayrollEmployee();
        echo "<p>{$joe->getPaySlip()}</p>";
    ?>
</body>

</html>