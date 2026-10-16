<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        @import url('from.css');
    </style>
    <form method="post">
        <input type="checkbox" name="Faculties[]" value="engineering">Engineering<br>
        <input type="checkbox" name="Faculties[]" value="medicine">Medicine<br>
        <input type="checkbox" name="Faculties[]" value="Computer Sceinces"> Computer Sceince <br>
        <input type="radio" name="sex" value="male">Male <br>
        <input type="radio" name="sex" value="Female">Female<br>
        <input type="submit" name="submit" value="Register">t
        <label for="name">Name:</label>
        <input 
            type="text" 
            id="name" 
            name="name"
            placeholder="Enter your name"
        >
        <br><br>
        <label for="password">Password:</label>
        <input 
            type="password" 
            id="password" 
            name="password"
            placeholder="Enter your password"
        >
        <br><br>
        <textarea name="comment" cols="35"></textarea>
        <button type="reset">Reset</button>
        <button type="submit">Submit</button>
        <input type="submit" name="submit" value="Register">
    </form>
    <br>
    <?php
    if(!empty($_POST['sex']))
        echo("<br>sex:".$_POST['sex']);
    echo("<br>");
    echo ("name:".$_POST['name']);
    echo("<br>");
    echo("<br>Password: ".$_POST['password']);
    echo("<br>");

     if(!empty($_POST['Faculties'])){
        foreach($_POST ['Faculties'] as $faculty){
            echo("<br>");
            echo $faculty."<br>";

        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    ?>
</body>
</html>