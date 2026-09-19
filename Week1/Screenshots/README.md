PHP Programming Screenshots

This folder contains screenshots demonstrating PHP programming concepts covered in the course Web Application Development - PHP & MySQL.

1. PHP Output, Variables, and HTML Tags
Screenshot Name

php1.png

Description

This screenshot demonstrates basic PHP output and variables.

The code shows how PHP can be used together with HTML to display information in a web browser.

Main concepts covered:
-PHP opening and closing tags
-echo statement
-print statement
-Displaying multiple values using echo
-Creating and using PHP variables
-Displaying variables inside a string
-Using HTML tags inside PHP output
-Using <br> to create a new line
-PHP Opening Tag
PHP code starts with the PHP opening tag:

<?php

The PHP closing tag is:

?>
Echo Statement

The screenshot demonstrates how echo is used to display text:

echo "<h1>Welcome to Home PHP</h1>";

HTML can be included inside the echo statement.

Print Statement

The screenshot also demonstrates the print statement:

print "<h2>Meymuun</h2>";

Both echo and print can be used to display output 
Echo with Multiple Arguments

The code demonstrates that echo can display multiple values:

echo "Meymuun", "Abuukar";
PHP Variables

The screenshot demonstrates how to create a variable:

$Fullname = "Meyzuun Abuukar Ali";

The variable can then be displayed using echo:

echo "My name is: $Fullname";
Changing Variable Values

The code also creates another variable:

$Lastname = "Ali";

It is then displayed:

echo "my last name is: $Lastname";
HTML Line Break

The code uses the HTML <br> tag to move the next output to a new line:

echo "<br>";
Screenshot

2. PHP String Functions
Screenshot Name

php_mystr.png

Description

This screenshot demonstrates PHP string functions.

The code creates a string using a PHP variable and then uses built-in PHP functions to work with the string.

Main concepts covered:
-PHP string variables
-str_word_count() function
-strlen() function
-Counting words in a string
-Counting characters in a string
-Displaying function results using echo
-Creating a String Variable
The screenshot first creates a variable containing text:

$my_str = "Welcome to PHP Republic";

Here:

$my_str is the variable.
"Welcome to PHP Republic" is the string value.
Counting Words

The code uses the str_word_count() function:

echo str_word_count($my_str);

The str_word_count() function counts the number of words contained in a string.

For example:

$my_str = "Welcome to PHP Republic";
echo str_word_count($my_str);

The string contains 4 words.
Counting Characters
The screenshot also demonstrates the strlen() function:

$my_str = "Welcome to CA233 CLASS";
echo strlen($my_str);

The strlen() function counts the number of characters in a string, including spaces.

Line Break

The code uses:

echo "<br>";

This creates a new line in the browser between different outputs.

Screenshot

Summary

These two screenshots demonstrate basic PHP programming concepts:

Screenshot	Main Topic
php1.png	Echo, Print, Variables, HTML Output
php_mystr.png	String Variables, Word Count, Character Count

Together, they demonstrate how PHP can display information, store values in variables, and process strings using built-in functions.
