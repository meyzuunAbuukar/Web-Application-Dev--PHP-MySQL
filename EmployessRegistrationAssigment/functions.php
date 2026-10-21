<?php

// 1. Calculate gross salary
function calculateGrossSalary($basicSalary, $allowance)
{
    return $basicSalary + $allowance;
}

// 2. Calculate net salary
function calculateNetSalary($grossSalary, $bonus, $deduction)
{
    return $grossSalary + $bonus - $deduction;
}

// 3. Calculate employee bonus
function calculateBonus($basicSalary)
{
    if ($basicSalary >= 1000) {
        return $basicSalary * 0.10;
    } elseif ($basicSalary >= 500) {
        return $basicSalary * 0.05;
    } else {
        return 0;
    }
}

// 4. Check salary category
function checkSalaryStatus($netSalary)
{
    if ($netSalary >= 1500) {
        return "High Salary";
    } elseif ($netSalary >= 800) {
        return "Medium Salary";
    } else {
        return "Low Salary";
    }
}

?>