<?php

// Include the functions
require_once "functions.php";

// Get student information
$name = "";
$id = "";
$gender = "";
$faculty = "";

$php = "";
$database = "";
$networking = "";

if (isset($_POST["student_name"])) {
    $name = $_POST["student_name"];
}

if (isset($_POST["student_id"])) {
    $id = $_POST["student_id"];
}

if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
}

if (isset($_POST["faculty"])) {
    $faculty = $_POST["faculty"];
}

if (isset($_POST["php_mark"])) {
    $php = $_POST["php_mark"];
}

if (isset($_POST["database_mark"])) {
    $database = $_POST["database_mark"];
}

if (isset($_POST["networking_mark"])) {
    $networking = $_POST["networking_mark"];
}

// Validate student information
$errors = "";

if (empty($name)) {
    $errors .= "Student name is required.<br>";
}

if (empty($id)) {
    $errors .= "Student ID is required.<br>";
}

if (empty($gender)) {
    $errors .= "Please select gender.<br>";
}

if (empty($faculty)) {
    $errors .= "Please select faculty.<br>";
}

if ($php === "" || $php < 0 || $php > 100) {
    $errors .= "PHP mark must be between 0 and 100.<br>";
}

if ($database === "" || $database < 0 || $database > 100) {
    $errors .= "Database mark must be between 0 and 100.<br>";
}

if ($networking === "" || $networking < 0 || $networking > 100) {
    $errors .= "Networking mark must be between 0 and 100.<br>";
}

// Display validation errors
if ($errors != "") {
    echo "<h2>Validation Errors</h2>";
    echo $errors;
    echo '<a href="index.html">Go Back</a>';
    exit;
}

// Calculate results
$total = calculateTotal($php, $database, $networking);
$average = calculateAverage($total);
$grade = calculateGrade($average);
$result = checkResult($average);


if (empty($_FILES["certificate"]["name"])) {
    echo "Please select a student certificate.";
    echo '<br><a href="index.html">Go Back</a>';
    exit;
}

$file = $_FILES["certificate"];

// Check file upload error
if ($file["error"] != 0) {
    echo "Certificate upload failed.";
    echo '<br><a href="index.html">Go Back</a>';
    exit;
}

// Check file size (maximum 2 MB)
if ($file["size"] > 2 * 1024 * 1024) {
    echo "Certificate size must not exceed 2 MB.";
    echo '<br><a href="index.html">Go Back</a>';
    exit;
}

// Get file information
$certificateName = $file["name"];
$fileType = $file["type"];
$fileSize = $file["size"] / 1024;
// Upload folder
$uploadFolder = "uploads/";

// Check whether the file  exists
$destination = $uploadFolder . $certificateName;

if (file_exists($destination)) {
    echo "This certificate already exists.";
    echo '<br><a href="index.html">Go Back</a>';
    exit;
}

// Move uploaded file
if (move_uploaded_file($file["tmp_name"], $destination)) {
    $uploadStatus = "Successfully Uploaded";
} else {
    echo "Certificate could not be saved.";
    echo '<br><a href="index.html">Go Back</a>';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Results</title>
</head>
<body>

<h2>Student Examination Results</h2>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>Information</th>
        <th>Result</th>
    </tr>

    <tr>
        <td>Student Full Name</td>
        <td><?php echo $name; ?></td>
    </tr>

    <tr>
        <td>Student ID</td>
        <td><?php echo $id; ?></td>
    </tr>

    <tr>
        <td>Gender</td>
        <td><?php echo $gender; ?></td>
    </tr>

    <tr>
        <td>Faculty</td>
        <td><?php echo $faculty; ?></td>
    </tr>

    <tr>
        <td>PHP Mark</td>
        <td><?php echo $php; ?></td>
    </tr>

    <tr>
        <td>Database Mark</td>
        <td><?php echo $database; ?></td>
    </tr>

    <tr>
        <td>Networking Mark</td>
        <td><?php echo $networking; ?></td>
    </tr>

    <tr>
        <td>Total Marks</td>
        <td><?php echo $total; ?> / 300</td>
    </tr>

    <tr>
        <td>Average Marks</td>
        <td><?php echo $average; ?></td>
    </tr>

    <tr>
        <td>Grade</td>
        <td><?php echo $grade; ?></td>
    </tr>

    <tr>
        <td>Pass or Fail</td>
        <td><?php echo $result; ?></td>
    </tr>

    <tr>
        <td>Certificate Name</td>
        <td><?php echo $certificateName; ?></td>
    </tr>

    <tr>
        <td>File Type</td>
        <td><?php echo $fileType; ?></td>
    </tr>

    <tr>
        <td>File Size</td>
        <td><?php echo $fileSize; ?> KB</td>
    </tr>

    <tr>
        <td>Upload Status</td>
        <td><?php echo $uploadStatus; ?></td>
    </tr>

</table>

<br>

<a href="index.html">Back to Student Form</a>

</body>
</html>