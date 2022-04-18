<!--ask for sport_id number that pulls single row, what coloumn to update and what the new information is-->

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
            $sport_id = intVal(filter_input(INPUT_POST, 'sport_id'));
            $field = filter_input(INPUT_POST, 'fields');
            
            $input = filter_input(INPUT_POST, "type");
        
    
            if ($field === 'name'){
                echo "name ran";
                echo $sport_id;
                $newName = strval($input);
                echo $newName;
                $updateCommand = "UPDATE sport SET name='$newName' WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }else if ($field === 'playerCount'){
                echo "player ran";
                $newPlayerCount = intval($input);
                $updateCommand = "UPDATE sport SET player_count=$newPlayerCount WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }else if($field === 'indoor'){
                echo "indoor ran";
                $newIndoor = intval($input);
                $updateCommand = "UPDATE sport SET indoor='$newIndoor' WHERE sport_id=$sport_id";
                $updateQuery =$dbConn->prepare($updateCommmand);
                $updateExecute = $updateQuery->execute();
            }else if($field === 'referee'){
                echo ("referee ran");
                $newReferee = intval($input);
                $updateCommand = "UPDATE sport SET referee_count=$newReferee WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }else if($origin === 'origin'){
                echo ("origin ran");
                $newOrigin = strval($input);
                $updateCommand = "UPDATE sport SET origin='$newOrigin' WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }else {
                echo "it failed";
            }
        }
    }catch (PDOException $error) {
        echo "<div class='connectionMsg'>'connection error'.$error->getMessage()</div>";
    }  
    ?>

    <form action="" method="post">   

        <h1>Update</h1>
        
        <div class="inputs">
            <label for="sportid">Where:</label>
            <input type="text" name="sport_id" id="sportid" required>
        </div>
        
        <div class="inputs">
            <select name="fields" id="fields">
                <option value="name">Name</option>
                <option value="playerCount">Player Count</option>
                <option value="indoor">Indoor</option>
                <option value="referee">Referee Count</option>
                <option value="origin">Origin</option>
            </select>
        </div>
        
        <div class="inputs">
            <label for="input">Update:</label>
            <input type="text" name="type" id="type">
        </div>
        <div class="buttons">
            <input type="submit" name="submit" value="Submit">
        </div>

    </form>



    
</body>
</html>
