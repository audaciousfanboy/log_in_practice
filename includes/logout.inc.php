<?php
 include_once("dbh.inc.php");
 session_start();
 $useremail=$_SESSION["useremail"];
 $user1=$_SESSION["useruid"];
 
    
 $sql = "UPDATE users SET usersStatus = 0 WHERE usersUid = '$user1' OR usersEmail ='$useremail'";
 $result=mysqli_query($conn, $sql);

 session_unset();
 session_destroy();



 header("location: ../php/homepage.php");
 exit();

