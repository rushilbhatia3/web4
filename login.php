<?php
    $password= $_POST["psw"];
    echo "<p>psw:</p>" +$_POST["psw"]
    $conn = new mysqli("localhost","rbhatia", "5926", "rbhatia");
    if($conn->connect_error){
        echo"<p>failed to conect</p>";
        
        die($conn->error);
    }
    else{
        header("Location:/fotofan.php");
            //die();
        exit();
            //echo file_get_contents()

    }
    ?>
