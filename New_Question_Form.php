<?php
    echo '<h2>Login Results</h2>';
    //the next two lines get the data from the html form
    $Q_Name    = filter_input(INPUT_POST, 'Q_Name');
    $Q_Body    = filter_input(INPUT_POST, 'Q_Body');
    $Q_Skills  = filter_input(INPUT_POST, 'Q_Skills');

    //Cant be empty & contains at least 3 char
    if ((strlen($Q_Name) > 0) and (strlen($Q_Name) >= 3)){
        echo "Question Name: $Q_Name <br><br>";
    }elseif (strlen($Q_Name) == 0){
        echo "Question Name: $Q_Name<br> - should not be left empty.<br><br>";
    }elseif (strlen($Q_Name) < 3){
        echo "Question Name: $Q_Name<br> - should be 3 characters or longer.<br><br>";
}

    //At least 2 skills must be entered, display in an array if conditions are met
    $skills = explode(",", $Q_Skills);
    if ((count($skills) >= 2)){
        echo "Question Skills: ";
        print_r($skills);
        echo "<br><br>";
    }elseif ((count($skills) == 0) or (count($skills) <2)){
        echo "Question Skills: $Q_Skills<br> - should have 2 or more skills.<br><br>";
    }

    //Cant be empty & contains at most 500 char
    if ((strlen($Q_Body) > 0) and (strlen($Q_Body) <= 500)){
        echo "Question Body: $Q_Body <br><br>";
    }elseif (strlen($Q_Body) == 0){
        echo "Question Body: $Q_Body<br> - should not be left empty.<br><br>";
    }elseif (strlen($Q_Body) > 500){
        echo "Question Body: $Q_Body<br> - should be 500 characters or less.<br><br>";
    }
?>