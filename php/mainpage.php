<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MainPage</title>
    <!-- Fonts and CSS -->
    <link rel="stylesheet" href="../css/styles.css">
  </head>
  <body>
  <?php include_once("..\php\header.php")?>
    <div class="welcome-header">
        <h1>Welcome User!</h1>
    </div>
    <div>
    <h1>Active Users Now!</h1>
        <?php
        include_once ("..\includes\dbh.inc.php");
        //$stat=$_SESSION['uid'];//
        $useremail=$_SESSION["useremail"];
        $user1=$_SESSION["useruid"];
       

        
       


        $sql = "SELECT usersStatus FROM users WHERE usersEmail='$useremail' OR usersUid = '$user1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['usersStatus'] == 1){
          echo "<p>user $useremail or $user1 online</p>";
        }
        ?>
    
    </div>









    <?php include_once "footer.php"?>
  </body>
</html>
