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
    <?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<h1> Connection was successfull </h1>";
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        if (isset($submitButton)){
            echo "submit work";
            $deleteName = strval(filter_input(INPUT_POST, 'name'));
            clean($deleteName);
            $deleteCommand = "DELETE FROM sport WHERE name='$deleteName'";
            echo $deletCommand;
            $deleteQuery = $dbConn->prepare($deleteCommand);
            $deleteExecute = $deleteQuery->execute();
            
            if ($deleteExecute){
                echo "Query executed successfully";
            } else {
                echo "Not so successful";
            }
        }else {
            
        }     
    }catch(PDOException $error) {
        echo "connection error".$error->getMessage();
    }
    
        function clean($d){
        $data = trim($d);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

    <form action="" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">

        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="homepage"value="Home Page">
    </form>


    
</body>
</html>