<?php
    require('pdo.php');
    echo '<h2>Login Results</h2>';
    //the next two lines get the data from the html form
    $email = filter_input(INPUT_POST, 'email');
    $pass  = filter_input(INPUT_POST, 'pass');

    $conditions_met = 1;

    //Cant be empty & contains @ character
    if (strlen($email) == 0){
        echo "Email Address: $email<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }
    if (strpos($email, "@") != TRUE){
        echo "Email Address: $email<br> - should contain '@' symbol.<br><br>";
        $conditions_met = 0;
    }

    //Cant be empty & at least 8 character
    if ((strlen($pass) == 0)){
        echo "Password: $pass<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }
    if ((strlen($pass) < 8)){
        echo "Password: $pass<br> - should be 8 characters or longer.<br><br>";
        $conditions_met = 0;
    }

    if ($conditions_met == 1){
        $query = "SELECT * FROM `accounts` WHERE email = '$email' AND password = '$pass' ";
        // Create PDO statement

        $statement = $db->prepare($query);




        // Execute the SQL Query
        $statement->execute();

        // Find out if a matching email and password was found
        $count = $statement->rowCount();



        if ($count == 1){
            header( "Location: display.php?email=$email" );
        }else{
            echo "LOGIN FAILED<br><br>Page is being redirected . . .";
            header("refresh: 4, url=Login.html");
        }
    }else{
        echo "Page is being redirected . . .";
        header("refresh: 4, url=Login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-image: url('img1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align: center;
    }
</style>
</html>
