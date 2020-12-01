<?php
require('pdo.php');
echo "<h2>Display Form</h2>";

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
echo "QUESTIONS ASSOCIATED WITH CURRENT USER:<br><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Display.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <table border="2" class="table table-hover table-sm">
        <thead class="thead-dark">
        <tr class ="table-dark text-dark">
            <th>ID</th>
            <th>Owner Email</th>
            <th>Owner ID</th>
            <th>Date Created</th>
            <th>Title</th>
            <th>Body</th>
            <th>Skills</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questions as $val) :?>
            <tr class="table-success">
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
        </tbody>
    </table>
    <a href="https://web.njit.edu/~jac234/fall2020/IS218/Proj_2/New_Question_Form.html" class="btn btn-success" role="button">Add New Question<br></a>
</div>


<style>
    body {
        background-image: url('img1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align: center;
    }
</style>
</body>
</html>
