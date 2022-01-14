<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Show Exercise Plan</title>
		<link href="images/Logo.png" rel="icon">
	</head>
    <body>
<?php session_start();

include('includes/database.inc.php');
 
function bmiExists($conn, $memberID) {
    $sql = "SELECT * FROM healathcare WHERE memberID = ?;";
    /*initialize new prepare statement */
    $stmt = mysqli_stmt_init($conn);
    /*check whether any mistake happens in prepare statement */
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("location: ../signup.php?error=stmtfailed");
        exit();
    }

    /*if no errors, then pass the data from the user */
    mysqli_stmt_bind_param($stmt, "s", $memberID);  
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
$memberID = $_SESSION['memberID'];
$userRaw=bmiExists($conn,$memberID);
$bmi = $userRaw["bmi"];

if($bmi < 12){
    $exerciseID =1;
}
else if($bmi <20){
    $exerciseID =1;
}
else if($bmi<30 ){
    $exerciseID =3;
}
else if($bmi > 30){
    $exerciseID =4;
}

$sql = "SELECT* FROM exercisetable WHERE exerciseID = ?;";
$stmt = mysqli_stmt_init($conn);
    /*check whether any mistake happens in prepare statement */
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $exerciseID);  
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
       $exercisePlanRaw =  $row;     /*return all the data from the databse if the user exists inside the database */
       $photo = $exercisePlanRaw["exerciseplan"];
       $exercisePlanRaw["exerciseID"];
    
       echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>';
     }
    else {
        $result = false;
    }

?>
</body>

</html>


