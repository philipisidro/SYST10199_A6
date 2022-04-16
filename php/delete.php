<!DOCTYPE html>
<html lang="en">
    
<?php require('./connect.php');?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Delete</h1>

    <form action="POST">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">

        <input type="button" value="Submit">
        <input type="button" value="Home Page">
    </form>

    <?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<h1> Connection was successfull </h>";
        
        
        $deleteName = filter_input(INPUT_POST, $name);
        $deleteCommand = "DELETE FROM sport WHERE name = '$name'";
        $deleteQuery = $dbConn->prepare($deleteCommand);
        $deleteExecute = $deleteQuery->execute();
        
        
    }catch(PDOException $error) {
        echo "connection error".$error->getMessage();
    }
    ?>
    
</body>
</html>