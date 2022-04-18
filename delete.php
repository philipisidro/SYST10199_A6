<!--deletes a row from the database based on the sport_id given-->

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
            $sport_id = strval(filter_input(INPUT_POST, 'sport_id'));
            clean($deleteName);
            $deleteCommand = "DELETE FROM sport WHERE sport_id=$sport_id";
            echo $deletCommand;
            $deleteQuery = $dbConn->prepare($deleteCommand);
            $deleteExecute = $deleteQuery->execute();
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
            <label for="sport_id">Name: </label>
            <input type="text" name="name" id="name">
        </div>
            
        <div class="buttons">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>


    
</body>
</html>
