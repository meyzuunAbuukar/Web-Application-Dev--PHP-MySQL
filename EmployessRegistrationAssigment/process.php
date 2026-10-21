<?php

// Include the functions from functions.php
require_once "functions.php";

// Set default values
$employeeName = "";
$employeeID = "";
$gender = "";
$department = "";
$basicSalary = "";
$allowance = "";
$deduction = "";

$valid = true;

// Check whether the form was submitted
if (isset($_POST["register"])) {

    // Get employee information using POST
    if (isset($_POST["employee_name"])) {
        $employeeName = $_POST["employee_name"];
    }

    if (isset($_POST["employee_id"])) {
        $employeeID = $_POST["employee_id"];
    }

    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    if (isset($_POST["department"])) {
        $department = $_POST["department"];
    }

    if (isset($_POST["basic_salary"])) {
        $basicSalary = $_POST["basic_salary"];
    }

    if (isset($_POST["allowance"])) {
        $allowance = $_POST["allowance"];
    }

    if (isset($_POST["deduction"])) {
        $deduction = $_POST["deduction"];
    }

    // Validate employee full name
    if (empty($employeeName)) {
        echo "Error: Employee Full Name is required.<br>";
        $valid = false;
    }

    // Validate employee ID
    if (empty($employeeID)) {
        echo "Error: Employee ID is required.<br>";
        $valid = false;
    }

    // Validate gender
    if (empty($gender)) {
        echo "Error: Please select Gender.<br>";
        $valid = false;
    }

    // Validate department
    if (empty($department)) {
        echo "Error: Please select Department.<br>";
        $valid = false;
    }

    // Validate basic salary
    if ($basicSalary === "" || $basicSalary <= 0) {
        echo "Error: Basic Salary must be entered and greater than zero.<br>";
        $valid = false;
    }

    // Validate allowance
    if ($allowance === "" || $allowance < 0) {
        echo "Error: Allowance must be entered and cannot be negative.<br>";
        $valid = false;
    }

    // Validate deduction
    if ($deduction === "" || $deduction < 0) {
        echo "Error: Deduction must be entered and cannot be negative.<br>";
        $valid = false;
    }

    // Calculate salary values
    $grossSalary = calculateGrossSalary(
        $basicSalary,
        $allowance
    );

    $bonus = calculateBonus($basicSalary);

    // Deduction must not exceed gross salary plus bonus
    if (
        $deduction !== "" &&
        $deduction >= 0 &&
        $deduction > ($grossSalary + $bonus)
    ) {
        echo "Error: Deduction cannot exceed Gross Salary plus Bonus.<br>";
        $valid = false;
    }

    // Check whether an employee document was selected
    if (
        !isset($_FILES["employee_document"]) ||
        empty($_FILES["employee_document"]["name"])
    ) {
        echo "Error: Please select an employee document.<br>";
        $valid = false;
    }

    // Continue only if the information is valid
    if ($valid == true) {

        // Get uploaded document information
        $fileName = $_FILES["employee_document"]["name"];
        $fileType = $_FILES["employee_document"]["type"];
        $fileSize = $_FILES["employee_document"]["size"];
        $temporaryName = $_FILES["employee_document"]["tmp_name"];
        $fileError = $_FILES["employee_document"]["error"];

        // Check whether the file was submitted successfully
        if ($fileError != 0) {

            echo "Error: The document upload failed.";

        } elseif ($fileSize > 2 * 1024 * 1024) {

            // Reject files larger than 2 MB
            echo "Error: Document size must not exceed 2 MB.";

        } else {

            // Create the destination path
            $destination = "uploads/" . $fileName;

            // Do not overwrite a document with the same name
            if (file_exists($destination)) {

                echo "Error: A document with the same name already exists.";

            } else {

                // Move the uploaded document into uploads
                if (move_uploaded_file(
                    $temporaryName,
                    $destination
                )) {

                    // Calculate final salary results
                    $netSalary = calculateNetSalary(
                        $grossSalary,
                        $bonus,
                        $deduction
                    );

                    $salaryStatus = checkSalaryStatus($netSalary);

                    // Convert file size from bytes to KB
                    $fileSizeKB = $fileSize / 1024;

                    // Display successful upload message
                    echo "<h3>Employee document uploaded successfully!</h3>";

                    // Display employee information and salary results
                    echo "<h2>Employee Registration Results</h2>";

                    echo "<table border='1' cellpadding='8'>";

                    echo "<tr><th>Information</th><th>Result</th></tr>";

                    echo "<tr><td>Employee Full Name</td><td>$employeeName</td></tr>";

                    echo "<tr><td>Employee ID</td><td>$employeeID</td></tr>";

                    echo "<tr><td>Gender</td><td>$gender</td></tr>";

                    echo "<tr><td>Department</td><td>$department</td></tr>";

                    echo "<tr><td>Basic Salary</td><td>$basicSalary</td></tr>";

                    echo "<tr><td>Allowance</td><td>$allowance</td></tr>";

                    echo "<tr><td>Gross Salary</td><td>$grossSalary</td></tr>";

                    echo "<tr><td>Bonus</td><td>$bonus</td></tr>";

                    echo "<tr><td>Deduction</td><td>$deduction</td></tr>";

                    echo "<tr><td>Net Salary</td><td>$netSalary</td></tr>";

                    echo "<tr><td>Salary Status</td><td>$salaryStatus</td></tr>";

                    echo "<tr><td>Uploaded Document Name</td><td>$fileName</td></tr>";

                    echo "<tr><td>File Type</td><td>$fileType</td></tr>";

                    echo "<tr><td>File Size (KB)</td><td>$fileSizeKB</td></tr>";

                    echo "<tr><td>Upload Status</td><td>Successful</td></tr>";

                    echo "</table>";

                } else {

                    echo "Error: The document could not be saved.";

                }
            }
        }
    }
}

?>