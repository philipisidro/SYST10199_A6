<!DOCTYPE html>
<!--change-->

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
        echo "<div class='connectionMsg'>Connection was successfull</div>";  
        
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
        <h1>Insert change</h1>
        <div class="inputs">
            <label for="sportsID"> Sports ID:</label>
            <input type="number" name="sportsID" id="sportsID">
        </div>
        
        <div class="inputs">
            <label for="Name"> Name:</label>
            <input type="text" name="name" id="name">
        </div>
        
        <div class="inputs">
            <label for="playerCount"> Player Count:</label>
            <input type="number" name="playerCount" id="playerCount">
        </div>
        
        <div class="inputs">
            <label for="indoor"> Indoor:</label>
            <input type="text" name="indoor" id="indoor">
        </div>
        
        <div class="inputs">
            <label for="referee"> Referee:</label>
            <input type="number" name="referee" id="referee">
        </div>
        
        <div class="inputs">
            <label for="origin"> Origin:</label>
            <input type="text" name="origin" id="origin">
        </div>
        
        <input type="submit" name="submit" value="Submit">
        
    </form>
    
   
</body>
</html>
