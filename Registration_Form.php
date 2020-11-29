<?php
    echo '<h2>Registration Results</h2>';
    //the next five lines get the data from the html form
    $F_Name = filter_input(INPUT_POST, 'firstName');
    $L_Name = filter_input(INPUT_POST, 'lastName');
    $B_Day = filter_input(INPUT_POST, 'birthday');
    $email = filter_input(INPUT_POST, 'email');
    $pass  = filter_input(INPUT_POST, 'password');

    $conditions_met = 1;
    //Cant be empty
    if (strlen($F_Name) == 0) {
        echo "First Name: $F_Name<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }

    //Cant be empty
    if (strlen($L_Name) == 0){
        echo "Last Name: $L_Name<br> - should not be left empty.<br><br>";
        $conditions_met = 0;
    }

    //Cant be empty
    if (strlen($B_Day) == 0) {
        echo "Birthday: $B_Day<br> - should not be left empty.<br><br>";
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
        echo "Page is being redirected . . .";
         header( "refresh: 5, url='display.php'" );
    }else{
        echo "Page is being redirected . . .";
        header("refresh: 1, url='Registration_Form.html'");
    }
?>