<?php
namespace com\icemalta\libpayroll;

abstract class Worker{
    private string $name;
    private string $surname;

    public function __construct(string $name, string $surname){
        $this->name = $name;
        $this->surname = $surname;
    }

    abstract public function getRoleDescription(): string;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name) : void 
    {
        $this->name = $name;
    }

    public function getSurname(): string 
    {
        return $this->surname;
    }

    public function setSurname(string $surname) : void
    {
        $this->surname = $surname;
    }
}

    interface StaffMember{
        public function getPerksString(): string;
        public function getHealthBenefitsString(): string;
    } // This is the last code I did.


class Manager extends Worker implements StaffMember{
    public function getPaySlip(): string
    {
        return "This is the payslip for the manager.";
    }

    public function getRoleDescription(): string{
        return "This is the description for the manager";
    }
}

class Employee extends Worker
{
    public function getPaySlip(): string
    {
        return "This is the payslip for the Employee.";
    }

    public function getRoleDescription(): string{
        return "This is the description for the employee";
    }
}

class Contractor extends Employee 
{
    public function getPaySlip(): string
    {
        return "This is the payslip for the contractor.";
    }

    public function getRoleDescription(): string{
        return "This is the description for the contractor";
    }
}