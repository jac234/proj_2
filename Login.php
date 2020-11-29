<?php
    echo '<h2>Login Results</h2>';
    //the next two lines get the data from the html form
    $email = filter_input(INPUT_POST, 'email');
    $pass  = filter_input(INPUT_POST, 'pass');

    //Cant be empty & contains @ character
    if((strlen($email) > 0) and (strpos($email, "@") != FALSE)){
        echo "Email Address: $email <br><br>";
    }elseif (strlen($email) == 0){
        echo "Email Address: $email<br> - should not be left empty.<br><br>";
    }elseif (strpos($email, "@") != TRUE){
        echo "Email Address: $email<br> - should contain '@' symbol.<br><br>";
    }

    //Cant be empty & at least 8 character
    if((strlen($pass) > 0) and (strlen($pass) >= 8)){
        echo "Password: $pass <br><br>";
    }elseif ((strlen($pass) == 0)){
        echo "Password: $pass<br> - should not be left empty.<br><br>";
    }elseif ((strlen($pass) < 8)){
        echo "Password: $pass<br> - should be 8 characters or longer.<br><br>";
    }
?>