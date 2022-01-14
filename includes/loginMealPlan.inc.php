<?php
    if (isset($_POST["getMealPlan"])){
        
        $email = $_POST["email"];
        $bmi = $_POST["bmi"];

        require_once 'database.inc.php';
        require_once 'functions.inc.php';

        /*check whether the inputs are empty */
        if(emptyInputLoginMealPlan($email, $bmi)!== false){
            
            header ("location: ../loginMealPlan.php?error=emptyinput");
                exit();
        }
        else{
            createMealPlanUser($conn, $email,$bmi);   
            //create page for show meal plans
            header ("location: ../showMealPlan.php");
            exit();
        }

}
?>    