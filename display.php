<?php
require('pdo.php');

$firstName = filter_input(INPUT_GET, 'f_Name');
$lastName = filter_input(INPUT_GET, 'l_Name');
//$birthday = filter_input(INPUT_POST, 'birthday');
//$email = filter_input(INPUT_POST, 'email');
//$password = filter_input(INPUT_POST, 'pass');

//if (strlen($password) >= 8){
echo "Name: $firstName $lastName";
//echo " Last Name $lastName <br>";
//echo "Birthday: $birthday <br>";
//echo "Email: $email <br>";
//echo "Password: $password <br>";

//$query = "INSERT INTO accounts (email, fname, lname, birthday, password) VALUES (:email, :fname, :lname, :birthday, :password)";

// Create PDO statement

//$statement = $db->prepare($query);
// Bind form values to SQL
//$statement->bindValue(':email', $email);
//$statement->bindValue(':fname', $firstName);
//$statement->bindValue(':lname', $lastName);
//$statement->bindValue(':birthday', $birthday);
//$statement->bindValue(':password', $password);

// Execute the SQL Query
//$statement->execute();

// Close the DB connection
//$statement->closeCursor();
//}else{
//    echo"form is invalid";
//}