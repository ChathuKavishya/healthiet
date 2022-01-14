<?php 
      $title = 'Sign Up';
      //include 'header.php'; 
?>
<link rel="styleSheet" href="signup.css" href="index.html" />

<section class="main-container">
<div class="su-container" id="bg">
  <h1>SIGN UP</h1>
  <div class="signup-form">
    <form action="includes/signup.inc.php" method="POST">
      <div class="form-row">
        <input required placeholder="First Name..." type="text" name="fname" />
        <input required placeholder="Last Name..." type="text" name="lname" />
      </div>

    <div class="form-radio">
      <label>Gender</label>
      <input type="radio" id="male" name="gender" value="Male">Male
      
      <input type="radio" id="female" name="gender" value="Female">Female
      
    </div>
      <input required placeholder="Age..." type="text" name="age" />
      <input required placeholder="Email..." type="text" name="email" />
      <!--<input required placeholder="Username..." type="text" name="uname" />-->
      <input required placeholder="Password..." type="password" name="pwd" />
      <input required placeholder="Confirm Password..." type="password" name="repwd"/>
      
      <p>
        by submitting this form you agree to our <a href="#">terms of use</a>
      </p>
      <button class="submit-btn" type="submit" name="submit">SIGN UP</button>
    </form>
  </div>
  <p>Already a member ? <a href="login.php">Log In!</a></p>
</div>
<div class="bg-img">
  
    <img src="#" alt="Sign Up">
</div>

<?php
    /*check errors in sign up */
    
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            /*echo "<p>Fill in all fields!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("Fill in all fields!")';
            echo '</script>';
        }

        else if ($_GET["error"] == "invalidemail") {
            /*echo "<p>Choose a proper e-mail!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("Choose a proper e-mail!")';
            echo '</script>';
        }


        else if ($_GET["error"] == "passwordsdontmatch") {
            
           /* echo "<p>Passwords doesn't match!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("Passwords does not match!")';
            echo '</script>';
        }

        else if ($_GET["error"] == "stmtfailed") {
            /*echo "<p>Something went wrong, Try again!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("Something went wrong, Try again!")';
            echo '</script>';
        }

        else if ($_GET["error"] == "emailtaken") {
            /*echo "<p>E-mail already taken!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("E-mail already taken!")';
            header("Location: http://localhost/web/index.html");
            echo '</script>';
        }

        else if ($_GET["error"] == "none") {
            /*echo "<p>You have signed up!</p>";*/
            echo '<script language="javascript">';
            echo 'alert("You have signed up!")';
            header("Location: http://localhost/web/index.html");
            echo '</script>';

        }
        //header("Location: http://localhost/AP/index.html");
    }
    header("Location: http://localhost/web/index.html");
?>
</section>