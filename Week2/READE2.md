1. If / Elseif / Else in PHP
What is it?
if, elseif, and else are used to make decisions in PHP.
•	if → checks the first condition.
•	elseif → checks another condition if the first one is false.
•	else → runs when all conditions are false.
Example:
$marks = 87;

if($marks >= 90)
    echo "Excellent";
elseif($marks >= 80)
    echo "Very good";
elseif($marks >= 50)
    echo "minimal pass";
else
    echo "Not pass";
How does it work?
The value is:
$marks = 87;
PHP checks:
if($marks >= 90)
87 is not greater than or equal to 90 → false
Then:
elseif($marks >= 80)
87 is greater than or equal to 80 → true
So PHP prints:
Very good
It does not continue checking the other conditions.
Simple idea:
IF condition is true
      ↓
   do this
ELSEIF another condition is true
      ↓
   do this
ELSE
      ↓
   do this
________________________________________
2. Do-While Loop
What is a do-while loop?
A do-while loop runs the code at least one time, then checks the condition.
Example:
$result = 1;
$n = 5;

do {
    $result *= $n;
    $n--;
} while($n > 0);

echo "result is:" . $result;
Step by step
At the beginning:
$result = 1;
$n = 5;
Then PHP enters the do block.
First loop:
$result *= $n;
This means:
$result = $result * $n;
So:
1 × 5 = 5
Then:
$n--;
means:
n = n - 1
So n becomes 4.
Then PHP checks:
while($n > 0);
4 > 0 → continue.
It keeps going:
1 × 5 = 5
5 × 4 = 20
20 × 3 = 60
60 × 2 = 120
120 × 1 = 120
Finally:
result is:120
Important point
The main difference is:
do-while executes first, then checks the condition.
________________________________________
3. Switch Statement
What is switch?
A switch is used when you want to compare one value with different cases.
Example:
switch ($Marks = 80) {

    case ($Marks >= 90):
        echo "Excellent";
        break;

    case ($Marks <= 80):
        echo "Your Good";
        break;

    case ($Marks >= 50):
        echo "Your Faild";
        break;

    default:
        echo "no record";
        break;
}
Important note about your code
Your switch is written in an unusual way because you are putting conditions inside case.
Normally, a switch is written like this:
$Marks = 80;

switch($Marks) {
    case 90:
        echo "Excellent";
        break;

    case 80:
        echo "Very Good";
        break;

    case 50:
        echo "Pass";
        break;

    default:
        echo "No record";
}
What is case?
case represents one possible value.
What is break?
break tells PHP:
Stop the switch here.
Without break, PHP can continue to the next case.
What is default?
default runs when no case matches.
Simple structure:
switch($value) {

    case 1:
        // code
        break;

    case 2:
        // code
        break;

    default:
        // code
}
________________________________________
4. While Loop
What is a while loop?
A while loop repeats code while a condition is true.
Your code:
$count = 1;

while($count <= 5) { 

    echo $count;
    $count++;

}
Step by step
First:
$count = 1;
PHP checks:
$count <= 5
1 <= 5 → true.
Print:
1
Then:
$count++;
means:
$count = $count + 1
Now $count is 2.
It continues:
1
2
3
4
5
When $count becomes 6:
6 <= 5
is false.
So the loop stops.
Important
A while loop:
checks the condition first, then runs the code.
________________________________________
5. For Loop
What is a for loop?
A for loop is used when you know how many times you want to repeat something.
Your code:
for($i = 1; $i <= 5; $i++) {
    echo $i;
}
A for loop has 3 important parts:
for(start; condition; update)
Your example:
for($i = 1; $i <= 5; $i++)
1. Start
$i = 1
The loop starts from 1.
2. Condition
$i <= 5
The loop continues while $i is less than or equal to 5.
3. Update
$i++
After every loop, $i increases by 1.
So the output is:
1
2
3
4
5
for(...);
That means the loop body is empty.
EXample:
$i = 1;

for($i = 1; $i <= 5; $i++) {
    echo $i;
}
________________________________________
6. Nested Loop
What is a nested loop?
A nested loop means:
A loop inside another loop.
Your code:
for($i = 1; $i <= 5; $i++) {

    for($j = 1; $j <= 5; $j++) {

        echo $i . " X " . $j . " = " . ($i * $j) . "<br>";
    }
}
Here you have:
•	Outer loop → $i
•	Inner loop → $j
How does it work?
The outer loop starts:
i = 1
Then the inner loop runs completely:
1 X 1 = 1
1 X 2 = 2
1 X 3 = 3
1 X 4 = 4
1 X 5 = 5
Then the outer loop becomes:
i = 2
The inner loop starts again:
2 X 1 = 2
2 X 2 = 4
2 X 3 = 6
2 X 4 = 8
2 X 5 = 10
And it continues until i = 5.
Your smaller nested loop
You also have:
for($i = 1; $i <= 2; $i++) {

    for($j = 1; $j <= 2; $j++) {

        echo $i . " X " . $j . " = " . ($i * $j) . "<br>";
    }
}
Output:
1 X 1 = 1
1 X 2 = 2
2 X 1 = 2
2 X 2 = 4

Outer loop chooses the row, inner loop works inside that row.
