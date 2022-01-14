<?php

//signup functions

function emptyInputSignup($fname, $lname, $gender, $age, $email, $pwd, $pwdRepeat) {
     $result;

    /*check the empty input fields */
    if (empty($fname) || empty($lname) || empty($gender) || empty($age) || empty($email) ||empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}




function emailExists($conn, $email) {
    $sql = "SELECT * FROM member WHERE email = ?;";
    /*initialize new prepare statement */
    $stmt = mysqli_stmt_init($conn);
    /*check whether any mistake happens in prepare statement */
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("location: ../signup.php?error=stmtfailed");
        exit();
    }

    /*if no errors, then pass the data from the user */
    mysqli_stmt_bind_param($stmt, "s",  $email);  
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;     /*return all the data from the databse if the user exists inside the database */
    }
    else {
        $result = false;
        return $result;
    }
    /*close the prepare statement */
    mysqli_stmt_close($stmt);
}


function createUser($conn, $fname, $lname, $gender, $age, $email, $pwd) {
   
    $sql = "INSERT INTO member (firstName, lastName, gender, age, email, password) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, 'ssssss', $fname, $lname, $gender, $age,$email, $hashedPwd);   
    mysqli_stmt_execute($stmt);       
    mysqli_stmt_close($stmt);            
}






//login functions

function emptyInputLogin($email, $pwd) {
    $result;
    /*check whether inputs are empty */
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function  loginUser($conn, $email, $pwd) {
    $emailExists = emailExists( $conn, $email, $email);

    /*check whether the email is already exists */
    if ($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
            exit();
    }
    $pwdHashed = $emailExists["password"];            //read the encrypted password
    $checkPwd = password_verify($pwd, $pwdHashed);   //verify the password in the databse
    /*check whether the encrypted password and entered password are different */
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
            exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["memberID"] = $emailExists["memberID"];
        
        header("location: ../index.html");
        exit();
    }        
}


?>
