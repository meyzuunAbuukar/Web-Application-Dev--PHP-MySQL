<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php  
 define ("Age",10);
    echo Age; 

     echo "<br>";
    

    // ELSE IF IN PHP

    $Da = 20;
    if($Da>=18)
    echo "Adult";
    else
        echo "Child";
     echo "<br>";


    $Age = 20;
    if($Age <=18)
    echo "Adult";
    elseif($Age  > 10)
        echo "Child";
     echo "<br>";


       $marks=87;
     if($marks>=90)
        echo"Excellent";
    elseif($marks>=80)
        echo"Very good";
    elseif($marks>=50)
        echo"minimal pass";
    else
        echo"Not pass";

    echo "<br>";



    $result=1;
    $n=5;
    do{
        $result*=$n;
        $n--;
    }while($n>0);
    echo "result is:". $result;

    echo "<br>";



   
    


     switch ($Marks =80) {
        case ($Marks>=90):
            echo "Excellent";
            break;

        case  ($Marks <=80):
            echo " Your Good";
            break;
        case ($Marks >=50):
            echo " Your Faild" ;    

        
        default:
           echo "no record";
            break;
     }
     echo "<br>";

     $fuel = 8;

     echo $fuel <=10 ? "Low thank":" Full Thank";

    echo "<br>";


    $count = 1;

    while($count <=5){ 

          echo $count;
          $count++;

    } 

     echo "<br>";

     $i=1;
     for($i=1; $i<=5; $i++);
     echo $i;

      echo "<br>";


        $marks=87;
     if($marks>=90)
        echo" waw Excellent";
    elseif($marks>=80)
        echo" GOd Jod ";
    elseif($marks>=50)
        echo"minimal pass";
    else
        echo"Not pass";

   




    $Countt = 4;

for($Countt = 1; $Countt <= 15; $Countt++) {
    echo "Count is " . $Countt;
    echo "<br>";
}
     Multiple table
     for($i = 1; $i <= 5; $i++) {
       for($j = 1; $j <= 5; $j++) {
        echo $i . " X " . $j . " = " . ($i * $j) . "<br>";
    }
}
echo"<br>";

for($i = 1; $i <= 2; $i++) {
    for($j = 1; $j <= 2; $j++) {
        echo $i . " X " . $j . " = " . ($i * $j) . "<br>";
    }
}
  

 
    ?>
    
</body>
</html>