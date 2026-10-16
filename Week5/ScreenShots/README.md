This README.md IS about FromWeek.php
PHP Forms – Explanation Based on Screenshot name: Form
_html.png
 The code focuses on HTML Forms, which allow users to enter information, choose options, and submit data. checkboxes, radio buttons, text inputs, password inputs, text areas, and form buttons.
1. What is an HTML Form?
An HTML form is a section of a webpage used to collect information from a user.
For example, a registration form might ask for:
•	Name
•	Password
•	Faculty or department
•	Gender
•	Comments
The form in your screenshot uses this code:
<form method="post">
    <!-- Form inputs go here -->
</form>
•	<form> starts the form.
•	method="post" tells the browser to send the form data using the HTTP POST method.
•	</form> closes the form.
An HTML form collects user information and submits it for processing.
2. Understanding the form elements in The 

A. Checkboxes
The code:
<input type="checkbox"
       name="Faculties[]"
       value="engineering">
Engineering
A checkbox allows users to select one or more options. Your screenshot includes Engineering, Medicine, and Computer Science.
Users can select multiple faculties.

B. Radio buttons
The code:
<input type="radio" name="sex" value="male"> Male
<input type="radio" name="sex" value="female"> Female
Radio buttons allow users to select one option from a group when the inputs share the same name.
Users can select one gender option
C. Text input
The code:
<input type="text"
       id="name"
       name="name"
       placeholder="Enter your name">
This creates a field where users can type ordinary text, such as their names.
 Users enter their names in the text field.

D. Password input
The code:
<input type="password"
       id="password"
       name="password"
       placeholder="Enter your password">
This field masks the characters as the user types. It does not encrypt or securely store the password by itself.
Sample English: Users enter their passwords in the password field.

E. Textarea
The code:
<textarea name="comment"
          cols="35"></textarea>
A <textarea> lets users enter longer text, such as comments or feedback. cols="35" sets an approximate text width.
Sample English: Users can write their comments in the text area.
3. Submit, Reset, and Button
Your screenshot contains three types of form controls.
<input type="submit" name="submit" value="Register">

<button type="reset">Reset</button>

<button type="submit">Submit</button>
•	Submit: Sends the form data for processing.
•	Reset: Restores form controls to their initial values.
•	Register: Displays a button labeled “Register” that submits the form.
You have both a Register button and a Submit button in your screenshot. You usually only need one submit button unless you want separate actions.
Sample English: The submit button sends the user's information, while the reset button clears the entered values back to their initial state.
4. Understanding label, id, name, and value
These attributes are important in your screenshot.
Attribute	Purpose
label	Provides a descriptive label for an input.
id	Uniquely identifies an HTML element on the page.
name	Identifies the field when its data is submitted.
value	Specifies the value associated with an input.
placeholder	Displays a hint inside an empty input field.
For example:
<label for="name">Name:</label>
<input type="text"
       id="name"
       name="name"
       placeholder="Enter your name">
Here, for="name" connects the label to the input with id="name".
Sample English: The label describes the input field, and the placeholder tells users what information they should enter.
5. Complete example based on your screenshot
This example combines the same form elements into one registration form.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
</head>
<body>

    <h1>Student Registration Form</h1>

    <form method="post">

        <!-- Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"
               placeholder="Enter your name">
        <br><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password"
               name="password"
               placeholder="Enter your password">
        <br><br>

        <!-- Faculty checkboxes -->
        <p>Select your faculty:</p>

        <input type="checkbox" name="Faculties[]"
               value="engineering">
        Engineering<br>

        <input type="checkbox" name="Faculties[]"
             value="medicine">
        Medicine<br>

        <input type="checkbox" name="Faculties[]"
               value="computer science">
        Computer Science<br><br>

        <!-- Gender radio buttons -->
        <p>Select your gender:</p>

        <input type="radio" name="sex" value="male">
        Male<br>

        <input type="radio" name="sex" value="female">
        Female<br><br>

        <!-- Comments -->
        <label for="comment">Comments:</label><br>
        <textarea id="comment" name="comment"
                  rows="4" cols="35"></textarea>
        <br><br>

        <!-- Form buttons -->
        <button type="submit">Register</button>
        <button type="reset">Reset</button>

    </form>

</body>
</html>
This example demonstrates the HTML form controls shown The your screenshot. The form displays the inputs, but processing the submitted information requires PHP code.
6. Important PHP concept: How is the submitted data received?
Your screenshot uses method="post". In PHP, you can access submitted values using the $_POST superglobal.
For example:
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"] ?? "";

    echo "Welcome, " . htmlspecialchars($name);
}
?>
Sample English: PHP receives the submitted name and displays a welcome message.
Remember: the checkboxes use Faculties[], so multiple selected faculties can be submitted as an array. The radio buttons use the same name, sex, so the user selects one option.
7. Sample Way
•	An HTML form collects information from users.
•	A checkbox allows users to select multiple options.
•	A radio button allows users to select one option from a group.
•	A text input accepts ordinary text.
•	A password input masks the typed characters.
•	A textarea allows users to enter longer comments.
•	A submit button sends form data.
•	A reset button restores the initial form values.
•	PHP uses $_POST to access data submitted through the POST method.


SCREENSHOT2 NAME Form.php

PHP Code Explanation: $_POST, if, foreach
The code is the PHP part of the registration form from your form.php It receives the information a user submits, such as gender, name, password, and selected faculties, then displays that information on the webpage.
 1. Checking the gender — if and $_POST
The code:
if (!empty($_POST['sex']))
    echo("<br>sex:".$_POST['sex']);
Let's break it down:
•	$_POST — a PHP superglobal that contains data submitted through an HTTP POST request.
•	['sex'] — accesses the submitted value associated with the form field named sex.
•	empty() — checks whether a value is empty or not set.
•	! — means NOT.
•	if — runs the following statement only when its condition is true.
•	echo — displays text or a value on the webpage.
•	<br> — creates a line break in HTML.
•	. — joins strings and values together in PHP.
How does it work?
If the user selects Male, the form sends sex=male. The condition checks whether the value is present and not empty, then displays:
sex:male
If the user does not select a gender, the echo statement inside the if is skipped.
2. Displaying the name
Your code:
echo("<br>");
echo ("name:".$_POST['name']);
Explanation:
1.	echo("<br>"); moves the output to a new line.
2.	$_POST['name'] retrieves the submitted name.
3.3.	"name:" . $_POST['name'] joins the label name: with the submitted value.
For example, if the user enters Ahmed, the output is:
name:Ahmed
Sample English: “The code retrieves the user's name from the form and displays it.”
Important: this code assumes that the form has been submitted and the name field exists. Otherwise, PHP may produce a warning. We can make it safer later.
3. Displaying the password
Your code:
echo("<br>");
echo("<br>Password: ".$_POST['password']);
echo("<br>");
Explanation:
•	echo("<br>"); creates a line break.
•	"Password: " is the text displayed before the value.
•	$_POST['password'] retrieves the submitted password.
•	. joins the text and the submitted value.
For example, if the user enters abc123, the output would be:
Password: abc123
Important security note: In a real registration system, never display or print a user's password. Passwords should be securely hashed before storage and should not be shown back to the user.
4. Checking the selected faculties
The code:
if (!empty($_POST['Faculties'])) {
    foreach ($_POST['Faculties'] as $faculty) {
        echo("<br>");
        echo $faculty . "<br>";
    }
}
This is the most important part to understand because it uses both if and foreach.
Step 1: Check whether a faculty was selected
if (!empty($_POST['Faculties'])) {
The checkbox inputs in your form use:
<input type="checkbox"
       name="Faculties[]"
       value="engineering">
The square brackets in Faculties[] tell PHP that the selected values should be collected into an array.
For example, if the user selects Engineering and Medicine, PHP receives an array similar to this:
$_POST['Faculties'] = [
    "engineering",
    "medicine"
];
The if statement checks whether the array contains selected values. If no faculty is selected, the code inside the if is skipped.
Step 2: Loop through the array using foreach
foreach ($_POST['Faculties'] as $faculty) {
Let's understand each part:
Code 	Meaning
foreach	Loops through each item in an array.
$_POST['Faculties']	The array containing selected faculties.
as	Assigns each item to a variable as the loop runs.
$faculty	Holds the current faculty value.
Suppose the user selects three faculties:
[
    "engineering",
    "medicine",
    "Computer Sciences"
]
The loop runs three times:
1
$faculty = "engineering"
2
$faculty = "medicine"
3
$faculty = "Computer Sciences"
Step 3: Display each faculty
echo("<br>");
echo $faculty . "<br>";
The first line creates a line break. The second displays the current faculty and then adds another line break.
The resulting webpage might display:
engineering
medicine
Computer Sciences


5. Check your understanding
Question: Why do we use foreach in your PHP code?
To create a password field.
To loop through each selected faculty in an array.
To connect the label to an input.
Check answer
We are learning four useful PHP concepts here: $_POST receives form data, if checks a condition, empty() checks whether a value is empty, and foreach processes each item in an array.


SCREENSHOT3 from.css
# Week 5: CSS Form Styling

## Description
This CSS code styles an HTML form by setting its width, padding, border, rounded corners, labels, input fields, and buttons. It makes the form more organized and user-friendly.

## 1. Form Styling

```css
form {
    width: 200px;
    padding: 25px;
    border: 1px solid #ccc;
    border-radius: 10px;
}
```

- `width: 200px;` — Sets the form width.
- `padding: 25px;` — Adds space inside the form.
- `border: 1px solid #ccc;` — Adds a light gray border.
- `border-radius: 10px;` — Rounds the corners of the form.

## 2. Label Styling

```css
label {
    display: block;
    margin-top: 5px;
    margin-bottom: 5px;
}
```

- `display: block;` — Places each label on a separate line.
- `margin-top: 5px;` — Adds space above the label.
- `margin-bottom: 5px;` — Adds space below the label.

## 3. Text and Password Input Styling

```css
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border-radius: 5px;
}
```

- `width: 100%;` — Makes the inputs fill the available form width.
- `padding: 10px;` — Adds space inside the input fields.
- `box-sizing: border-box;` — Includes padding and borders within the specified width.
- `border-radius: 5px;` — Rounds the corners of the input fields.

## 4. Submit and Reset Button Styling

```css
input[type="submit"],
input[type="reset"] {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
}
```

- `margin-top: 20px;` — Adds space above the buttons.
- `padding: 10px 20px;` — Adds 10px of vertical space and 20px of horizontal space inside each button.
- `border: none;` — Removes the default button border.

 Summary

This CSS styles four main parts of the form:

1. **Form** — Controls the overall size, spacing, border, and corners.
2. **Labels** — Controls label positioning and spacing.
3. **Input fields** — Controls the width, internal spacing, and corners of text and password fields.
4. **Buttons** — Controls spacing, padding, and borders for submit and reset buttons.





  # # PART2


## Screenshot Single Choice_html.png

# Week 5: HTML Select – Single Choice

 Description

This HTML form demonstrates how to create a **single-choice dropdown list** using the `<select>` and `<option>` elements. Users can choose one district from the available options and submit their selection using the Register button.

## 1. HTML Form

```html
<form action="" method="post">

    <select name="District" id="District">

        <option value="Hodan">Hodan</option>
        <option value="Karaan">Karaan</option>
        <option value="Yaqshud">Yaqshud</option>
        <option value="Shibis">Shibis</option>

    </select>

    <br>

    <input type="submit" name="submit" value="Register">

    <hr>

</form>

<br>
<hr>
```

## 2. Explanation of the Code

### `<form action="" method="post">`

- `action=""` — Submits the form to the current page.
- `method="post"` — Sends the submitted form data using the HTTP POST method.

### `<select name="District" id="District">`

- `<select>` creates a dropdown list.
- `name="District"` identifies the field when the form is submitted.
- `id="District"` uniquely identifies the dropdown element on the page.

### `<option>`

Each `<option>` represents one available choice.

```html
<option value="Hodan">Hodan</option>
```

- `value="Hodan"` is the value submitted to the server.
- `Hodan` is the text displayed to the user.

The available districts are:
1. Hodan
2. Karaan
3. Yaqshud
4. Shibis

Because this is a standard dropdown without the `multiple` attribute, the user can select one district at a time.

### Submit Button

```html
<input type="submit" name="submit" value="Register">
```

This creates a button labeled **Register**. Clicking it submits the selected district.

### `<hr>` and `<br>`

- `<hr>` creates a horizontal line.
- `<br>` creates a line break.

## 3. Retrieving the Selected District Using PHP

```php
<?php

if (isset($_POST['District'])) {
    $district = $_POST['District'];

    echo "Selected District: "
         . htmlspecialchars($district);
}

?>
```

This PHP code checks whether a district was submitted, retrieves its value, and displays the selected district.

For example, if the user selects Hodan, the output is:

```text
Selected District: Hodan
```

## Summary

- `<select>` creates a dropdown list.
- `<option>` defines each available choice.
- `name` identifies the submitted field.
- `value` specifies the data sent to PHP.
- `method="post"` submits the form using POST.
- `$_POST['District']` accesses the selected district in PHP.

#  PHP Single Choice – Select District

## Description

This PHP code checks whether the user has selected a district from the HTML dropdown list. If a district is selected, PHP displays its name. Otherwise, it displays a message asking the user to select a district.


SREENSHOT // SINGLE CHOICE

## 1. PHP Code

```php
// SINGLE CHOICE

if (!empty($_POST['District'])) {
    echo $_POST['District'];

} else {
    echo "Please select District";
}
```

## 2. Explanation of the Code

### `if (!empty($_POST['District']))`

- `if` checks a condition.
- `$_POST['District']` retrieves the submitted district from the HTML form.
- `empty()` checks whether the value is empty or missing.
- `!` means NOT.

Therefore, `!empty($_POST['District'])` means the district value is not empty.

### `echo $_POST['District'];`

This displays the selected district on the webpage.

For example, if the user selects Hodan, the output is:

```text
Hodan
```

### `else`

The `else` block runs when the `if` condition is false.

```php
echo "Please select District";
```

This displays a message asking the user to select a district.

Example output:

```text
Please select District
```

## 3. How It Works

1. The user opens the HTML form.
2. The user selects a district from the dropdown list.
3. The user clicks the Register button.
4. PHP checks the submitted `District` value.
5. If a district is provided, PHP displays its name; otherwise, it displays the message.


## Summary

- `$_POST['District']` retrieves the submitted district.
- `empty()` checks whether the value is empty.
- `!empty()` checks whether the value is not empty.
- `if` handles the selected district.
- `else` displays a message when no district value is provided.

# Screenshot Multiple.html.png

## Description

This HTML form demonstrates how to create a listbox that allows users to select multiple countries from a list. It uses the `<select>` element with the `multiple` attribute and submits the selected countries using the POST method.

## 1. HTML Code

```html
<!-- LISTBOX (MULTIPLE CHOICE) -->

<form method="post">

    <select name="Countries[]" id="Countries" multiple>

        <option value="Canada">Canada</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Shibis">Shibis</option>

    </select>

    <br>

    <input type="submit" name="submit" value="Register">

    <hr>

</form>
```

## 2. Explanation of the Code

### `<form method="post">`

- `<form>` creates the form.
- `method="post"` sends the submitted form data using HTTP POST.
- The form does not specify an `action`, so it submits to the current page by default.

### `<select name="Countries[]" id="Countries" multiple>`

- `<select>` creates a selection list.
- `name="Countries[]"` allows PHP to receive multiple selected values as an array.
- `id="Countries"` identifies the dropdown element.
- `multiple` allows users to select more than one option.

### `<option>`

Each `<option>` represents one item in the list.

```html
<option value="Canada">Canada</option>
```

- `value="Canada"` is the value submitted to PHP.
- `Canada` is the text displayed to the user.

The available options are:
1. Canada
2. USA
3. UK
4. Shibis

**Note:** `Canda` in the original code was corrected to `Canada`. Shibis is a district name rather than a country, but it is retained as provided in your example.

### Submit Button

```html
<input type="submit" name="submit" value="Register">
```

This creates a Register button that submits the selected items.

## 3. Important Note About `enctype`

The original code contains:

```html
<form method="post" encypte="multiple">
```

`encypte` is not a valid HTML attribute. For this form, you can simply use:

```html
<form method="post">
```

The `multiple` attribute belongs on the `<select>` element, not on the form.

## 4. Retrieving Multiple Selections Using PHP

```php
<?php

if (!empty($_POST['Countries'])) {

    foreach ($_POST['Countries'] as $country) {
        echo htmlspecialchars($country) . "<br>";
    }

} else {

    echo "Please select at least one option.";

}

?>
```

### Explanation

- `$_POST['Countries']` retrieves the selected values.
- `!empty()` checks whether any values were submitted.
- `foreach` loops through each selected value.
- `$country` stores the current item.
- `htmlspecialchars()` safely displays the value as HTML text.
- `else` displays a message if no options were selected.


```

## Summary

- `<select>` creates a selection list.
- `<option>` defines each item.
- `multiple` allows several selections.
- `Countries[]` allows PHP to receive the selected values as an array.
- `$_POST['Countries']` retrieves the submitted array.
- `foreach` processes each selected item.

**Key concept:** A listbox with the `multiple` attribute allows users to select several options and submit them together.


## Screenshot Multiple_php.png


## Description

This HTML form demonstrates how to create a listbox that allows users to select multiple countries from a list. It uses the `<select>` element with the `multiple` attribute and submits the selected countries using the POST method.

## 1. HTML Code

```html
<!-- LISTBOX (MULTIPLE CHOICE) -->

<form method="post">

    <select name="Countries[]" id="Countries" multiple>

        <option value="Canada">Canada</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Shibis">Shibis</option>

    </select>

    <br>

    <input type="submit" name="submit" value="Register">

    <hr>

</form>
```

## 2. Explanation of the Code

### `<form method="post">`

- `<form>` creates the form.
- `method="post"` sends the submitted form data using HTTP POST.
- The form does not specify an `action`, so it submits to the current page by default.

### `<select name="Countries[]" id="Countries" multiple>`

- `<select>` creates a selection list.
- `name="Countries[]"` allows PHP to receive multiple selected values as an array.
- `id="Countries"` identifies the dropdown element.
- `multiple` allows users to select more than one option.

### `<option>`

Each `<option>` represents one item in the list.

```html
<option value="Canada">Canada</option>
```

- `value="Canada"` is the value submitted to PHP.
- `Canada` is the text displayed to the user.

The available options are:
1. Canada
2. USA
3. UK
4. Shibis

**Note:** `Canda` in the original code was corrected to `Canada`. Shibis is a district name rather than a country, but it is retained as provided in your example.

### Submit Button

```html
<input type="submit" name="submit" value="Register">
```

This creates a Register button that submits the selected items.

## 3. Important Note About `enctype`

The original code contains:

```html
<form method="post" encypte="multiple">
```

`encypte` is not a valid HTML attribute. For this form, you can simply use:

```html
<form method="post">
```

The `multiple` attribute belongs on the `<select>` element, not on the form.

## 4. Retrieving Multiple Selections Using PHP

```php
<?php

if (!empty($_POST['Countries'])) {

    foreach ($_POST['Countries'] as $country) {
        echo htmlspecialchars($country) . "<br>";
    }

} else {

    echo "Please select at least one option.";

}

?>
```

### Explanation

- `$_POST['Countries']` retrieves the selected values.
- `!empty()` checks whether any values were submitted.
- `foreach` loops through each selected value.
- `$country` stores the current item.
- `htmlspecialchars()` safely displays the value as HTML text.
- `else` displays a message if no options were selected.



## Summary

- `<select>` creates a selection list.
- `<option>` defines each item.
- `multiple` allows several selections.
- `Countries[]` allows PHP to receive the selected values as an array.
- `$_POST['Countries']` retrieves the submitted array.
- `foreach` processes each selected item.






# SCREENSHOT File_html.png

## Description

This HTML form allows users to select a file from their computer and submit it to a PHP page for uploading. It uses the `file` input type and the `multipart/form-data` encoding method.

## 1. HTML Code

```html
<form action="Week5.php" method="post"
      enctype="multipart/form-data">

    <label>Select Your File:</label>

    <input type="file" name="Stdimage">

    <input type="submit" name="submit" value="Upload">

</form>
```

## 2. Explanation of the Code

### `<form action="Week5.php" method="post">`

- `<form>` creates the HTML form.
- `action="Week5.php"` sends the submitted form to the `Week5.php` file for processing.
- `method="post"` submits the form data using the HTTP POST method.

### `enctype="multipart/form-data"`

This attribute allows the form to send file data along with other form information.

**Important:** When uploading files, `enctype="multipart/form-data"` is required.

### `<label>Select Your File:</label>`

This label tells the user to select a file from their computer.

### `<input type="file" name="Stdimage">`

- `type="file"` creates a file-selection control.
- `name="Stdimage"` identifies the uploaded file in PHP.
- The user can select a file, such as an image or document.

### `<input type="submit" name="submit" value="Upload">`

# SCREENSHOT File.php.png
# Week 5: PHP File Upload and File Handling

## Description

This PHP code handles a file uploaded through an HTML form. It checks whether a file has been selected, displays the file name, size, and temporary location, and then moves the uploaded file to a specified destination folder using `move_uploaded_file()`.

## 1. PHP Code

```php
if (!empty($_FILES['Stdimage']['name'])) {

    // Display file information
    echo "File name is: " . $_FILES['Stdimage']['name'] . "<hr>";

    echo "File Size is: " . $_FILES['Stdimage']['size'] . "<hr>";

    // Display temporary file location
    echo "File Temporary is: "
         . $_FILES['Stdimage']['tmp_name'] . "<hr>";

    // Move the uploaded file
    $temp = $_FILES['Stdimage']['tmp_name'];

    $destination = "C:/Users/hp/OneDrive/Desktop/CA233/"
                 . $_FILES['Stdimage']['name'];

    if (move_uploaded_file($temp, $destination)) {
        echo "Successfully uploaded!";
    } else {
        echo "Upload failed.";
    }

} else {
    echo "Please select a file.";
}
```

## 2. Explanation of the Code

### Checking Whether a File Was Selected

```php
if (!empty($_FILES['Stdimage']['name'])) {
```

- `$_FILES` is a PHP superglobal that contains information about uploaded files.
- `Stdimage` is the name of the file input in the HTML form.
- `['name']` retrieves the original filename.
- `empty()` checks whether the value is empty.
- `!` means NOT.

The condition checks whether a filename was provided.

### Displaying the File Name

```php
echo "File name is: " . $_FILES['Stdimage']['name'] . "<hr>";
```

This displays the original filename.

Example output:

```text
File name is: profile.png
```

The `.` operator joins the text and filename. The `<hr>` tag adds a horizontal line.

### Displaying the File Size

```php
echo "File Size is: " . $_FILES['Stdimage']['size'] . "<hr>";
```

This displays the uploaded file's size in bytes.

For example:

```text
File Size is: 204800
```

The number is an example; the actual size depends on the selected file.

### Displaying the Temporary File Location

```php
echo "File Temporary is: "
     . $_FILES['Stdimage']['tmp_name'] . "<hr>";
```

PHP temporarily stores an uploaded file before it is moved to its permanent destination.

The `tmp_name` property provides the temporary server-side path.

### Storing the Temporary Path

```php
$temp = $_FILES['Stdimage']['tmp_name'];
```

This assigns the temporary file path to the variable `$temp`.

A variable beginning with `$` stores a value that can be reused later in the code.

### Defining the Destination

```php
$destination = "C:/Users/hp/OneDrive/Desktop/CA233/"
             . $_FILES['Stdimage']['name'];
```

- `$destination` stores the final path where the file should be saved.
- The folder path identifies the destination directory.
- `$_FILES['Stdimage']['name']` adds the original filename to that path.

For example, the destination could be:

```text
C:/Users/hp/OneDrive/Desktop/CA233/profile.png
```

**Important:** The destination folder must already exist and be writable by the PHP process.

### Moving the Uploaded File

```php
if (move_uploaded_file($temp, $destination)) {
    echo "Successfully uploaded!";
} else {
    echo "Upload failed.";
}
```

`move_uploaded_file()` moves a file from PHP's temporary upload location to the destination.

- If the move succeeds, the function returns `true`, and PHP displays a success message.
- If the move fails, it returns `false`, and PHP displays a failure message.

### Handling an Empty File Selection

```php
else {
    echo "Please select a file.";
}
```

This message appears when the filename is empty, such as when the user submits the form without choosing a file.

## 3. Upload Process

1. The user selects a file using the HTML file input.
2. The user clicks the Upload button.
3. PHP receives the uploaded file through `$_FILES`.
4. PHP checks the filename and displays file information.
5. PHP identifies the temporary file path.
6. `move_uploaded_file()` attempts to move the file to the destination.
7. PHP displays a success or failure message.

`$_FILES` provides information about an uploaded file, while `move_uploaded_file()` saves the uploaded file to a destination on the server.

