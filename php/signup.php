<?php include_once("..\php\header.php")?>
<link rel="stylesheet" href="../css/styles.css">
<form action="..\includes\signup.inc.php" method="post">
    <h2>Sign Up</h2>
    <label for="fullname">Fullname:</label>
    <input type="text" id="name" name="name" placeholder="Full Name..." >
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="E-Mail..." >
    <label for="username">User name:</label>
    <input type="text" id="uid" name="uid" placeholder="User Name..." >
    <label for="password">Password:</label>
    <input type="password" id="pwd" name="pwd" placeholder="PassWord..." >
    <label for="passwordrepeat">Re-type Password:</label>
    <input type="password" id="pwdrepeat" name="pwdrepeat" placeholder="Re-type Password..." >
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php
    if(isset($_GET["error"])){
      if($_GET["error"]== "emptyinput"){
        echo "<p class='error-msg'>Fill the fields</p>";
      }
      else if($_GET["error"]== "invaliduid"){
        echo "<p class='error-msg'>select proper uid</p>";
      }
      
      else if($_GET["error"]== "invalidemail"){
        echo "<p class='error-msg'>select proper email</p>";
      }
  
      else if($_GET["error"]== "passwordsdontmatch"){
        echo "<p class='error-msg'>Passwords doesn't match</p>";
      }
  
      else if($_GET["error"]== "usernametaken"){
        echo "<p class='error-msg'>user name not available</p>";
      }
  
      else if($_GET["error"]== "stmtfailed"){
        echo "<p class='error-msg'>something went wrong try again</p>";
      }
  
      else if($_GET["error"]== "none"){
        echo "<p class='error-msg'>You have signed up!</p>";
      }

    }

   



  ?>
  <?php include_once "footer.php"?>