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
    <H1>Update</H1>

    <form action="" method="post">

        
        <label for="where">Where:</label>
        <input type="text" name="where1" id="where">
        
        <label for"where2"> = </label>
        <input type="text" name="where2" id="where">
        
        <label for="newName">New Name: </label>
        <input type="text" name="newName" id="newName">
        
        <label for="newPlayerCount"> New Player Count:</label>
        <input type="text" name="newPlayerCount" id="newPlayerCount">
        
        <label for="newIndoor"> New Indoor:</label>
        <input type="text" name="newIndoor" id="newIndoor">
        
        <label for="newRefereeCount">New Referee Count: </label>
        <input type="text" name="refereeCount" id="refereeCount">
        
        <label for="newOrigin">New Referee Count:</label>
        <input type="text" name="newOrigin" id="newOrigin">
        
        <input type="button" value="Submit">
        <input type="button" value="Home Page">
    
    </form>

    <?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<h1> Connection was successfull </h>";  
        } catch (PDOException $error) {
            echo "connection error".$error->getMessage();
        }
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        if (isset($submitButton)){
            
            $where1 = filter_input(INPUT_POST, 'where1');
            $where2 = filter_input(INPUT_POST, 'where2');
            
            $newName = filter_input(INPUT_POST, 'newName');
            $newPlayerCount = filter_input(INPUT_POST, 'newPlayerCount');
            $newIndoor = filter_input(INPUT_POST, 'newIndoor');
            $newReferee = filter_input(INPUT_POST, 'newReree');
            $newOrigin = filter_input(INPUT_POST, 'newOrigin');
            
            $updateCommand;
            
            if ($where1 == 'name'){
                $updateCommand = "UPDATE sport SET name = '$newName' WHERE name ='$hwere2'";
            }else if ($where1 == 'playerCount'){
                $updateCommand = "UPDATE sport SET playerCount = '$newPlayerCount' WHERE playerCount = '$where2'";
            }else if ($where1 == 'indoor'){
                $updateCommand = "UPDATE sport SET indoor = '$newIndoor' WHERE indoor = '$where2'";
            }else if ($where1 == 'referee'){
                $updateCommand = "UPDATE sport SET referee = '$newReferee' WHERE referee = '$where2'"; 
            }else if ($where1 == "origin"){
                $updateCommand = "UPDATE sport SET origin = '$newReferee' WHERE referee = '$where2'";
            }else {
                echo "<p> no valid entry within database </p>";
            }
            
            function sendQuery(){
                $updateQuery = $bConn->prepare("$updateCommand");
                $updateExecute = $updateQuery->execute();
            }
            
        }
        

    ?>

    
</body>
</html>