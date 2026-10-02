<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // 1
    $numbers =array( 5, -7,12,10,-7,11,-6,12,1,-7,2,9);
    


    foreach($numbers as $num){
        echo $num. " ";
    }
    echo "<br>";

    $total =0;
    
    foreach($numbers as $num){
        $total =  $total + $num;
    }

    echo "Total = ". $total;
    
    echo "<br>";

    $eventTotal =0;

    foreach($numbers as $num){
        if($num % 2 == 0){
            $eventTotal = $eventTotal+$num;

        }
    }
    echo "Event Toral =" . $eventTotal;

    echo "<br>";


    $oddTotal = 0;
    
    foreach($numbers as $num){
        if($num % 2 != 0){
            $oddTotal = $oddTotal+$num;
        }
    }

 echo "odd total = " . $oddTotal;
 echo "<br>";   

 $min = $numbers[0];
 $minPosition = array();

 foreach($numbers as $index => $num){
    if($num < $min){
        $min =$num;
    }
 }
 foreach ($numbers as $index => $num){
    if($num == $num){
        $minPosition[] = $index + 1;
    }
 }
 echo "MInimum =" . $min . "<br>";
 echo "mimum position :";
 echo "<br>" ;

 foreach ($minPosition as $mp){
    echo $mp . " ";
 }
 echo "<br>" ;



 // MINIMUM
$min = $numbers[0];
$minPosition = array();

foreach ($numbers as $index => $num) {
    if ($num < $min) {
        $min = $num;
    }
}

foreach ($numbers as $index => $num) {
    if ($num == $min) {
        $minPosition[] = $index + 1;
    }
}

echo "Minimum = " . $min . "<br>";

echo "Minimum Position: ";
foreach ($minPosition as $mp) {
    echo $mp . " ";
}

echo "<br><br>";


// MAXIMUM
$max = $numbers[0];
$maxPosition = array();

foreach ($numbers as $index => $num) {
    if ($num > $max) {
        $max = $num;
    }
}

foreach ($numbers as $index => $num) {
    if ($num == $max) {
        $maxPosition[] = $index + 1;
    }
}

echo "Maximum = " . $max . "<br>";

echo "Maximum Position: ";
foreach ($maxPosition as $mpx) {
    echo $mpx . " ";
}

echo "<br>";


//2

$color = array(
    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),
    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),
    "Dark" => array(
        "Red" => "Dark Red",
        "Green"=> "Dark Green",
        "Blue" => "Dark Blue"
    )


);

echo "<table border='1'>";
echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($color as $rowName => $row){
    echo "<tr>";
    echo "<td>" . $rowName . "</td>";

    foreach ($row as $value){
        echo "<td>" . $value . "</td>";
     }
     echo "</tr>";
}
echo "</table>";


echo "<br>";
echo "<br>";



// 3


$info = array(
    "CA221" => array(
        "Name" => "Mohamed <br> Ahmed Ali",
        "Phone" => "06844040403",
        "Address" => "Laba dhagx  <br> wardhigle"
    ),
    "CA233" => array(
        "Name" => "Ahmed Abdi<br>jamac",
        "Phone" => "064722301",
        "Address" => "Taleex , Hodan"
    ),
    "CA21" => array(
        "Name" => "Amina Nur<br> Adan",
        "Phone"=> "0646992076",
        "Adress" => "Macmacanka<br> Dharkiinley"
    )


);

echo "<table border='1'>";
echo "<tr>";
echo "<th></th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($info as $rowName => $row){
    echo "<tr>";
    echo "<td>" . $rowName . "</td>";

    foreach ($row as $value){
        echo "<td>" . $value . "</td>";
     }
     echo "</tr>";
}
echo "</table>";






 

    
    
    
    
    
    
    
    
    
    
    
    
    ?>
</body>
</html>