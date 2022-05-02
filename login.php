<?php
    $password= $POST["psw"];
    echo "psw:"; echo $POST["psw"];
    $conn = new mysqli("localhost","rbhatia", $password, "rbhatia");

    if($conn->connect_error){
        echo"<p>failed to conect</p>";
        header("Location: 404.html");
        
        die($conn->error);
    }
    else{
        header("Location: fotofan.html");
        die();
        //exit();
            //echo file_get_contents()
        
        

    }
    ?>
