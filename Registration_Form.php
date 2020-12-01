<?php
require('pdo.php');
echo '<h2>Registration Results</h2>';
//the next five lines get the data from the html form
$f_Name = filter_input(INPUT_POST, 'firstName');
$l_Name = filter_input(INPUT_POST, 'lastName');
$b_Day = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$pass  = filter_input(INPUT_POST, 'password');

$conditions_met = 1;
//Cant be empty
if (strlen($f_Name) == 0) {
    echo "First Name: $f_Name<br> - should not be left empty.<br><br>";
    $conditions_met = 0;
}

//Cant be empty
if (strlen($l_Name) == 0){
    echo "Last Name: $l_Name<br> - should not be left empty.<br><br>";
    $conditions_met = 0;
}

//Cant be empty
if (strlen($b_Day) == 0) {
    echo "Birthday: $b_Day<br> - should not be left empty.<br><br>";
    $conditions_met = 0;
}

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
    $query = "INSERT INTO accounts (email, fname, lname, birthday, password) VALUES (:email, :fname, :lname, :birthday, :password)";

// Create PDO statement

    $statement = $db->prepare($query);
// Bind form values to SQL
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $f_Name);
    $statement->bindValue(':lname', $l_Name);
    $statement->bindValue(':birthday', $b_Day);
    $statement->bindValue(':password', $pass);

// Execute the SQL Query
    $statement->execute();

// Close the DB connection
    //$statement->closeCursor();
    echo "Page is being redirected . . .";
    header( "Location: display.php?email=$email" );
}else{
    echo "Page is being redirected . . .";
    header("refresh: 4, url=Registration_Form.html");
}
?>