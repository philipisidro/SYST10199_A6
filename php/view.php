<!DOCTYPE html>
<?php require('./connect.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>

<?php
    try{
        $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );

        $submitButton = filter_input(INPUT_POST, 'submit');
        if (isset($submitButton)){
            $recordNumbers = filter_input(INPUT_POST, 'recordNumber');

            $viewCommand = "SELECT * FROM sport WHERE '$recordNumbers";
            $viewQuery = $dbConn->prepare($viewCommand);
            $viewExecute = $viewQuery->execute();
            
            if($insertExecute){
                echo "Query executed successfully";
            } else {
                echo "Not so successful";
            }
        }
    }catch (PDOException $error){
        echo "Connection error".$error->getMessage();
    }
?>
    <form action="" method="post">
        <label for="recordNumbers">Number of Records</label>
        <input type="number" name="recordNumbers" id="recordNumber">
        <input type="submit" value="Submit">
        <p>or</p>
        <button id="AllRecords">All Records</button>
    </form>
</body>
</html>