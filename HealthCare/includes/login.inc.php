<?php

    if (isset($_POST["log"])){
        
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        require_once 'database.inc.php';
        require_once 'functions.inc.php';

        /*check whether the inputs are empty */
        if(emptyInputLogin( $email, $pwd) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $pwd);
    }

    else{

        header("location: ../login.php");
        exit();
    }
?>    
