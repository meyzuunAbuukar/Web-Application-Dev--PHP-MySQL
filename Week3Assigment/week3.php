<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //1

$a=20;
$b=30;
$c=40;
if($a>=$b && $a>=$c){
    $greastest=$a;

}elseif($b >= $a && $b >= $c){
    $greastest=$b;
}else{
    $greastest = $c;
}
if ($a <= $b && $a <= $c) {
    $smallest = $a;
} elseif ($b <= $a && $b <= $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}
if ($a <= $b && $a <= $c) {
     $smallest = $a;

 } elseif ($b <= $a && $b <= $c) {
     $smallest = $b;
 } else {
     $smallest = $c;
 }
 echo "Greatest number: " . $greastest ."<br>";
 echo "Smallest number: " .$smallest;


 echo"<br>";


 //2
 

$num = 15;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "The number is divisible by both 3 and 5";
}
elseif ($num % 3 == 0) {
    echo "The number is divisible by 3";
}
elseif ($num % 5 == 0) {
    echo "The number is divisible by 5";
}
else {
    echo "The number is divisible by neither 3 nor 5";
}
//3 odd number

for($i=2; $i<=20; $i++){
    if($i%2 !=0 ){
        echo $i."<br>";
    }
}

//4
echo "Numbers divisible by 2 and 5 from 50 to 2:<br>";
for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}

// 5
$num = 12345;
$reverse = 0;

while ($num > 0) {
    $digit = $num % 10;
    $reverse = ($reverse * 10) + $digit;
    $num = intdiv($num, 10);
}

echo "Reverse = " . $reverse;
echo "<br>";


echo "<br>";

//6
$a=8;
$b=12;

$Multiple = $a;

while($Multiple % $b != 0){
    $Multiple = $Multiple + $a;
}
echo "LCM = " .$Multiple;

echo "<br>";



// 7

$x = 18;
$y = 24;
$hcf = 1;

for($i=1; $i<=$x && $i<=$y; $i++){


    if($x % $i  ==0  && $y % $i == 0){
        $hcf=$i;
    }
}
echo "HCF =" .$hcf;  


//8


echo "<h2>Multiplication Table</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";

for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

echo "<br>";



//9


$num = 17;
$isPrime = true;

if ($num <= 1) {
    $isPrime = false;
} else {

    for ($i = 2; $i < $num; $i++) {

        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

if ($isPrime) {
    echo $num . " is a Prime Number";
} else {
    echo $num . " is a Non-Prime Number";
}

echo "<br>";




//10
echo "<br>";



for ($num = 10; $num <= 50; $num++) {

    $isPrime = true;

    for ($i = 2; $i < $num; $i++) {

        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo $num . "<br>";
    }
}


















       
    
     

 
    
    
    ?>
    
</body>
</html>