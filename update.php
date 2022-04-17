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
        $updateCommand; 
        if (isset($submitButton)){
            $sport_id = filter_input(INPUT_POST, 'sport_id');
            $newName = filter_input(INPUT_POST, 'newName');
            $newPlayerCount = filter_input(INPUT_POST, 'newPlayerCount');
            $newIndoor = filter_input(INPUT_POST, 'newIndoor');
            $newRefereeCount = filter_input(INPUT_POST, 'newRefereeCount');
            $newOrigin = filter_input(INPUT_POST, 'newOrigin');
                                    
            if(!isset($newName)){
                $updateCommand = "UPDATE sport SET name='$newName' WHERE sport_id='$sport_id'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }
            
            if(!isset($newPlayerCount)){
                $updateCommand = "UPDATE sport SET playerCount = $newPlayerCount WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }
            
            if(!isset($newIndoor)){
                $updateCommand = "UPDATE sport SET name='$newIndoor' WHERE sport_id=$sport_id";
                $updateQuery =$dbConn->prepare($updateCommmand);
                $updateExecute = $updateQuery->execute();
            }
            
            if(!isset($newReferee)){
                $updateCommand = "UPDATE sport SET name=$newReferee WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }
            
            if(!isset($newOrigin)){
                $updateCommand = "UPDATE sport SET name='$newOrigin' WHERE sport_id=$sport_id";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
            }
        }
    }catch (PDOException $error) {
        echo "<div class='connectionMsg'>'connection error'.$error->getMessage()</div>";
    }
    function clean($d){
        $data = trim($d);
        $dataStripped = stripslashes($data);
        $dataHtml = htmlspecialchars($dataStripped);
        return $dataHtml;
    }   
    ?>

    <form action="" method="post">

        <h1>Update</h1>
        
        <div class="inputs">
            <label for="sportid">Where:</label>
            <input type="text" name="sport_id" id="sportid">
        </div>
        
        <div class="inputs">
            <label for="newName">New Name: </label>
            <input type="text" name="newName" id="newName">
        </div>
        
        <div class="inputs">
            <label for="newPlayerCount"> New Player Count:</label>
            <input type="text" name="newPlayerCount" id="newPlayerCount">
        </div>
        
        <div class="inputs">
            <label for="newIndoor"> New Indoor:</label>
            <input type="text" name="newIndoor" id="newIndoor">
        </div>

        <div class="inputs">
            <label for="newRefereeCount">New Referee Count: </label>
            <input type="text" name="newRefereeCount" id="refereeCount">
        </div>
        
        <div class="inputs">
            <label for="newOrigin">New Referee Count:</label>
            <input type="text" name="newOrigin" id="newOrigin">
        </div>
        
        <div class="buttons">
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="homePage "value="Home Page">
        </div>
        
        <?php
            if (isset($submitButton)){
                if($updateExecute){
                    echo "Query executed successfully";
                }else {
                    if (empty($errMsg)){
                        echo "Query failed Bad Query";
                    }
                    echo "Query failed! ".$errMsg;
                }
            }
            ?>
    </form>



    
</body>
</html>
