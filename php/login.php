<?php include_once("..\php\header.php")?>
<link rel="stylesheet" href="../css/styles.css">
<form action="../includes/login.inc.php" method="post">
<h2>Log In</h2>
    <label for="fullname">User Name / Email:</label>
    <input type="text" id="name" name="uid" placeholder="UserName/Email..." >
    <label for="password">Password:</label>
    <input type="password" id="pwd" name="pwd" placeholder="PassWord..." >
    <button type="submit" name="submit">Submit</button>
</form>
<?php 
    if(isset($_GET["error"])){
        if($_GET["error"]== "emptyinput"){
          echo "<p class='error-msg'>Fill the fields</p>";
        }
        else if($_GET["error"]== "wronglogin"){
          echo "<p class='error-msg'>Incorrect log in information</p>";
        }
        
    }
?>
<?php include_once "footer.php"?>