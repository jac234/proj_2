<?php
require('pdo.php');
echo '<h2>Display Form</h2>';

$email = filter_input(INPUT_GET, 'email');


$statement = $db->prepare("SELECT fname, lname FROM accounts WHERE email=:email");
$statement->execute(['email' => $email]);
$name = $statement->fetchAll();

$statement2 = $db->prepare("SELECT * FROM questions WHERE owneremail=:owneremail");
$statement2->execute(['owneremail' => $email]);
$questions = $statement2->fetchAll(PDO::FETCH_ASSOC);


//print_r($questions);
if ($name != ""){
    echo "First Name: " . $name[0][0] . "<br>Last Name: " . $name[0][1] . '<br>' . '<br>';
}
echo "QUESTIONS ASSOCIATED WITH CURRENT USER:<br>";
//foreach ($questions as $val){
//    echo "ID: {$val['id']} <br> EMAIL: {$val['owneremail']} <br> OWNER ID: {$val['ownerid']} <br> DATE CREATED: {$val['createddate']} <br> TITLE: {$val['title']} <br> QUESTION BODY: {$val['body']} <br> SKILLS: {$val['skills']} <br> SCORE: {$val['score']}<br><br>";
//}
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Owner Email</th>
        <th>Owner ID</th>
        <th>Date Created</th>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
        <th>Score</th>
    </tr>
    <?php foreach ($questions as $val) :?>
    <tr>
        <td><?php echo $val['id']?></td>
        <td><?php echo $val['owneremail']?></td>
        <td><?php echo $val['ownerid']?></td>
        <td><?php echo $val['createddate']?></td>
        <td><?php echo $val['title']?></td>
        <td><?php echo $val['body']?></td>
        <td><?php echo $val['skills']?></td>
        <td><?php echo $val['score']?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IS218 Proj_1 Links</title>
</head>

<style>
body {text-align: center;}
</style>

<body>
    <a href="https://web.njit.edu/~jac234/fall2020/IS218/Proj_2/New_Question_Form.html"><br><br>Add New Question<br><br></a>
</body>

</html>