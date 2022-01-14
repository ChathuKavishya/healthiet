<?php
    if (isset($_POST["submit"])) {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["repwd"];

        require_once 'database.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($fname, $lname,  $gender, $age,$email, $pwd, $pwdRepeat) !== false) {
            header ("location: ../signup.php?error=emptyinput");
            exit();
        }

        if (invalidEmail($email) !== false) {
            header ("location: ../signup.php?error=invalidemail");
            exit();
        }
         
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header ("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        if (emailExists($conn, $email) !== false) {
            header ("location: ../signup.php?error=emailtaken");
            exit();
        }
        else{
            createUser($conn, $fname, $lname,$gender, $age, $email, $pwd);
            header ("location: ../login.php");
            exit(); 
        }
    }

    else {
        header ("location: ../signup.php");
        exit();
    }
?>