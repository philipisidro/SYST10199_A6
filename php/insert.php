<!DOCTYPE html>
<html lang="en">
    
<?php require('./connect.php');?>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Insert</title>
</head>
<body>
    
    <?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<h1> Connection was successfull </h1>";  
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        if (isset($submitButton)){
            $sportsID = intval(filter_input(INPUT_POST, 'sportsID'));
            $name = strval(filter_input(INPUT_POST, 'name'));
            $playerCount = intval(filter_input(INPUT_POST, 'playerCount'));
            $indoor = strval(filter_input(INPUT_POST, 'indoor'));
            $referee = intval(filter_input(INPUT_POST, 'referee'));
            $origin = strval(filter_input(INPUT_POST, 'origin'));
            
            $inputs[] = [$sportsID, $name, $playerCount, $indoor, $referee, $origin];
            
            for ($i = 0; $i < count($inputs); $i++){
                clean($inputs[$i]);
            }
                   
            $insertCommand = "INSERT INTO sport (sport_id, name, player_count, indoor, referee_count, origin) VALUES($sportsID, '$name', $playerCount, '$indoor', $referee, '$origin')";
            $insertQuery = $dbConn->prepare($insertCommand);
            $insertExecute = $insertQuery->execute();
            
            if($insertExecute){
                echo "Query executed successfully";
            } else {
                echo "Not so successful";
            }
        }
        } catch (PDOException $error) {
            echo "connection error".$error->getMessage();
        }
        
        function clean($d){
        $data = trim($d);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        
        ?>
    <h1>Insert change</h1>
    <form action="" method="post">
        <label for="sportsID"> Sports ID:</label>
        <input type="number" name="sportsID" id="sportsID">
        
        <label for="Name"> Name:</label>
        <input type="text" name="name" id="name">
        
        <label for="playerCount"> Player Count:</label>
        <input type="number" name="playerCount" id="playerCount">
        
        <label for="indoor"> Indoor:</label>
        <input type="text" name="indoor" id="indoor">
        
        <label for="referee"> Referee:</label>
        <input type="number" name="referee" id="referee">
        
        <label for="origin"> Origin:</label>
        <input type="text" name="origin" id="origin">
        
        <input type="submit" name="submit" value="Submit">
        
    </form>
    
   
</body>
</html>
