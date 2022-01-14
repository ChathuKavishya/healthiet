
<head>
  <meta charset="UTF-8">
  <title>Login Page </title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>
<section>
<form method="POST" action="includes/login.inc.php">
    <div class="form-field">
        <input type="email" name="email" placeholder="Email / Username" required/>
      </div>
  
  <div class="form-field">
    <input type="password" name="pwd" placeholder="Password" required/>          </div>
   
    <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
 
    <div class="form-field">
    <button class="btn" type="submit" name="log">Log in</button>


    <?php
    /*check whether empty inputs */
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            
            echo '<script language="javascript">';
            echo 'alert("Fill in all fields!")';
            echo '</script>';
        }
 
        else if ($_GET["error"] == "wronglogin") {
            
            echo '<script language="javascript">';
            echo 'alert("Incorrect login information!")';
            echo '</script>';
        }
    
    }
?>
    
  </div>
  <a href="index.html" class="hm">Home</a>
</form>


</section>

</body>

<style>
@import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {
  background: rgb(131, 236, 70);
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  filter: blur(5px);
}

body {
  font-family: 'Lato', sans-serif;
  color: #4A4A4A;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

form {
  position: relative;
  width: 100%;
  max-width: 380px;
  padding: 80px 40px 40px;
  border-radius: 10px;
  color:#fff;
  background: #000000;
  box-shadow: 0 15px 25px #000000;
}
label{
    color: #666;
    font-size: .875rem;
  
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}
form .form-field:nth-child(1)::before {
  background-image: url(images/user-icon.png);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(2)::before {
  background-image: url(images/lock-icon.png);
  width: 16px;
  height: 16px;
}
form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: #47AB11;
  color: #fff;
  border-radius: 4px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
}

.hm{
    position: center;
    padding: 175px;
    font-size: 20px;

}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

</style>
  


