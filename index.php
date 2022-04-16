<!DOCTYPE html>

<?php require './php/connect.php'?>;

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try{
            
           $dbConn = new PDO("mysql:host=localhost;dbname=isidrop_college", $user, $password );
           echo "<h1> Connection was successfull </h>";
           
           
           
        } catch (PDOException $error) {
            echo "connection error".$error->getMessage();
        }
        
        
        ?>

      <?php
        echo 'change';
        
        $submitButton = filter_input(INPUT_POST, 'submit');
        if (isset($submitButton)){                        
            if (filter_input(INPUT_POST, 'insert')){
                echo '<p>we going to insert</p>';
            }else if (filter_input(INPUT_POST, 'update')){
                echo '<p>we going to update</p>';
            }else if(filter_input(INPUT_POST, 'delete')){
                echo '<p> we going to delete</p>';
            }else {
                echo '<p> It was empty </p>';
            }
        }
        ?>

        <h1> Insert </h1>
        
        <form action="" method="post">
            
            <label for="insert">Insert</label>
            <input type="radio" name="insert" id="insert">
            
            <label for="Update">Update</label>
            <input type="radio" name="update" id="update">
            
            <label for="delete">Delete</label>
            <input type="radio" name="delete" id="delete">
           
            <label for="submitButton"> </label>
            <input type="submit" name="submit" value="Submit">
            
            <label for="viewTable"> </label>
            <input type="button" value="View Table">
           
        </form>
    </body>
</html>
