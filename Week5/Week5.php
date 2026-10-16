<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheapter4</title>
</head>
<body>
     <!-- SINGLE CHIOCE  -->
    <form action="" method="post">
        <select name="District" id="District" >

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
    
    
    <form action="Week5.php" method="post" enctype="multipart/form-data">
       <label>Select Your File:</label>
       <input type="file" name="Stdimage">
        <input type="submit" name="submit" value="Upload">
    </form>


    
    <br>
    <!-- //LISTBOX(MULTIPLE CHOICE) -->
 
      <form method ="post" encypte="multiple">
        <select name="Countries[]" id="Countries" multiple >

        <option value="Canda">Canda</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Shibis">Shibis</option>
        </select><br>
        <input type="submit" name="submit" value="Register">
        <hr>
    </form> 
    <?php
    // /// SINGLE CHIOCE
     if(!empty($_POST['District']))
    {
        echo $_POST['District'];

    }else
    {
        echo "Please select District";
           

    }
    echo ("<br>");
    // Multiple choice
    if (!empty($_POST['Countries'])) {
    foreach ($_POST['Countries'] as $r) {
        echo $r . "<br>";
    }
} else {
    echo "Please select Country";
}

echo "<br>";
     
           


   echo "<br>";
   echo "<br>";
    if(!empty($_FILES['Stdimage']['name'])){
        // Destination
       echo "File name is :" .$_FILES['Stdimage']['name']. "<hr>";
       echo "File Size is:" . $_FILES['Stdimage']['size']. "<hr>";
       // Temoparay file
        echo "File Tempory is:" .$_FILES['Stdimage']['tmp_name'].  "<hr>";
          // Move the upload file
       $temp=$_FILES ['Stdimage']['tmp_name'];
       $destination = "C:/Users/hp/OneDrive/Desktop/CA233/".$_FILES['Stdimage']['name'];
       if( move_uploaded_file($temp, $destination)){
        echo "Succesfully";
       }else {
        echo "Upload failed";
       }
        
    }else{
        echo "plse";
    }  
    
    ?>
    
</body>
</html>