<!--Uses the sport_id number to a certain row of information or display all infomration form the table-->  

<!DOCTYPE html>
<?php require('./connect.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">    
    <title>View</title>
</head>
<body>
    <h1> View </h1>
<?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
        echo "<div class='connectionMsg'>Connection was successfull</div>";

        $submitButton = filter_input(INPUT_POST, 'submit');
        $viewTableButton = filter_input(INPUT_POST, 'viewTable');
        if (isset($submitButton)){
            $recordNumbers = filter_input(INPUT_POST, 'recordNumber');
            $viewCommand = "SELECT * FROM sport WHERE sport_id='$recordNumbers'";   
            $results = mysqli_select_db($dbConn, $viewCommand);
            echo $results;
        }else if (isset($viewTableButton)){
            $viewCommand = "SELECT * FROM sport";
        }
    }catch (PDOException $error){
        echo "<div class='connectionMsg'>'connection error'.$error->getMessage()</div>";
    }
?>
    <form action="" method="post">
        <label for="recordNumbers">Number of Records</label>
        <input type="number" name="recordNumbers" id="recordNumber">
        
        <div class="button"> 
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="viewTable" value ="View Table">
        </div>
    </form>
</body>
</html>
