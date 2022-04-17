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
        echo "<h1> Connection was successfull </h1>";
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        $updateCommand; 
        if (isset($submitButton)){
            echo "submite worked";
            $where1 = filter_input(INPUT_POST, 'where1');
            $where2 = filter_input(INPUT_POST, 'where2');
            
            $newName = filter_input(INPUT_POST, 'newName');
            $newPlayerCount = filter_input(INPUT_POST, 'newPlayerCount');
            $newIndoor = filter_input(INPUT_POST, 'newIndoor');
            $newRefereeCount = filter_input(INPUT_POST, 'newRefereeCount');
            $newOrigin = filter_input(INPUT_POST, 'newOrigin');
            
            echo "variable assignments worked";
            
            $inputs[] = [$where1, $where2, $newName, $newPlayerCount, $newIndoor, $newReferee, $newOrigin];
            
            for ($i = 0; $i < count($inputs); $i++){
                clean($inputs[$i]);
            }
            if ($where1 == 'name'){
                echo "if statement worked";
                $updateCommand = "UPDATE sport SET name='$newName' WHERE name='$where2'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
                if($updateExecute){
                echo "Query executed successfully";
                } else {
                echo "Not so successful";
                }
            }else if ($where1 == 'playerCount'){
                $updateCommand = "UPDATE sport SET playerCount = $newPlayerCount WHERE playerCount = $where2";
                $updateCommand = "UPDATE sport SET name='$newName' WHERE name='$where2'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
                if($updateExecute){
                echo "Query executed successfully";
                } else {
                echo "Not so successful";
                }
            }else if ($where1 == 'indoor'){
                $updateCommand = "UPDATE sport SET indoor = $newIndoor WHERE indoor = $where2";
                $updateCommand = "UPDATE sport SET playerCount = $newPlayerCount WHERE playerCount = $where2";
                $updateCommand = "UPDATE sport SET name='$newName' WHERE name='$where2'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
                if($updateExecute){
                echo "Query executed successfully";
                } else {
                echo "Not so successful";
                }
            }else if ($where1 == 'referee'){
                $updateCommand = "UPDATE sport SET referee = '$newReferee' WHERE referee = '$where2'";
                $updateCommand = "UPDATE sport SET playerCount = $newPlayerCount WHERE playerCount = $where2";
                $updateCommand = "UPDATE sport SET name='$newName' WHERE name='$where2'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
                if($updateExecute){
                echo "Query executed successfully";
                } else {
                echo "Not so successful";
                } 
            }else if ($where1 == "origin"){
                $updateCommand = "UPDATE sport SET origin = '$newReferee' WHERE referee = '$where2'";
                $updateCommand = "UPDATE sport SET playerCount = $newPlayerCount WHERE playerCount = $where2";
                $updateCommand = "UPDATE sport SET name='$newName' WHERE name='$where2'";
                $updateQuery = $dbConn->prepare($updateCommand);
                $updateExecute = $updateQuery->execute();
                if($updateExecute){
                echo "Query executed successfully";
                } else {
                echo "Not so successful";
                }
            }else {
                echo "<p> no valid entry within database </p>";
            }
            

            
        }
        
        } catch (PDOException $error) {
            echo "connection error".$error->getMessage();
        }
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        
    function clean($d){
        $data = trim($d);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="" method="post">

        <h1>Update</h1>
        
        <div class="inputs">
            <label for="where1">Where:</label>
            <input type="text" name="where1" id="where">
        
            <label for="where2"> = </label>
            <input type="text" name="where2" id="where">
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
        
    
    </form>



    
</body>
</html>