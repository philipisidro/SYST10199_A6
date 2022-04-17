<!DOCTYPE html>
<html lang="en">
    
<?php require('./connect.php');?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<div class='connectionMsg'>Connection was successfull</div>";
        
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
        echo "<div class='connectionMsg'>'connection error'.$error->getMessage()</div>";
    }
    
        function clean($d){
        $data = trim($d);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

    <form action="" method="post">

        <h1>Delete</h1>
        
        <div class="inputs">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </div>
            
        <div class="buttons">
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="homepage"value="Home Page">
        </div>
    </form>


    
</body>
</html>