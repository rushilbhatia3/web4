<?php
    $password= $_POST["psw"];
    $conn = new mysqli("localhost","rbhatia", $password, "rbhatia");
    if($conn->connect_error){
        echo"<p>failed to conect</p>";
        
        die($conn->error);
    }
    else{
        $myQuery = "select * from eastern";
        $result= $conn->query($myQuery);
        if(!$result){
            echo"<p>empty db</p>";
            die($conn->error);
        }
        else{
            header('Location: yippee.html');
exit;

    }
    ?>
