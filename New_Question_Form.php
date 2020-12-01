<?php
    require('pdo.php');
    echo '<h2>Login Results</h2>';
    //the next two lines get the data from the html form
    $email     = filter_input(INPUT_POST, 'email');
    $Q_Name    = filter_input(INPUT_POST, 'Q_Name');
    $Q_Body    = filter_input(INPUT_POST, 'Q_Body');
    $Q_Skills  = filter_input(INPUT_POST, 'Q_Skills');
    $ownerid = rand(1,50);
    $createddate = date("Y-m-d");

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

    //Cant be empty & contains at least 3 char
    if (strlen($Q_Name) == 0){
        echo "Question Name: $Q_Name<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }
    if (strlen($Q_Name) < 3){
        echo "Question Name: $Q_Name<br> - should be 3 characters or longer.<br><br>";
        $conditions_met = 0;
    }

    //At least 2 skills must be entered, display in an array if conditions are met
    $skills = explode(",", $Q_Skills);
    $skills2 = implode(",",$skills);
    if ((count($skills) == 0) or (count($skills) <2)){
        echo "Question Skills: $Q_Skills<br> - should have 2 or more skills.<br><br>";
        $conditions_met = 0;
    }

    //Cant be empty & contains at most 500 char
    if (strlen($Q_Body) == 0){
        echo "Question Body: $Q_Body<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }
    if (strlen($Q_Body) > 500){
        echo "Question Body: $Q_Body<br> - should be 500 characters or less.<br><br>";
        $conditions_met = 0;
    }

    if ($conditions_met == 1){
        $query = "INSERT INTO questions (owneremail, ownerid, createddate, title, body, skills) VALUES (:owneremail, :ownerid, :createddate, :title, :body, :skills)";

        // Create PDO statement

        $statement = $db->prepare($query);
        // Bind form values to SQL
        $statement->bindValue(':owneremail', $email);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->bindValue(':createddate', $createddate);
        $statement->bindValue(':title', $Q_Name);
        $statement->bindValue(':body', $Q_Body);
        $statement->bindValue(':skills', $skills2);

        // Execute the SQL Query
        $statement->execute();

        echo "Page is being redirected . . .";
        header( "Location: display.php?email=$email" );
    }else{
        echo "Page is being redirected . . .";
        header("refresh: 4, url=New_Question_Form.html");
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

