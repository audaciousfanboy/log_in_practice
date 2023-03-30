<?php
//SIGN UP//
 function emptyInputSignup($name,$email, $username, $pwd, $pwdrepeat){
 
    if (empty($name)|| empty($email)|| empty($pwd)||empty($username)||empty($pwdrepeat)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){
 
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
       $result=true;
      }
    else {
        $result=false;
    }
    return $result;
}

function invalidEmail($email){

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
 
    if($pwd!==$pwdrepeat) {
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

function uidExist($conn,$username, $email){
    $sql= "SELECT * FROM users WHERE usersUid = ? OR usersEmail =? ;";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../php/signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql= "INSERT INTO users(usersName, usersEmail, usersUid, usersPwd) VALUES(?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../php/signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../php/signup.php?error=none");
    exit();
}

//LOG IN//
function emptyInputLogin($username, $pwd){
 
    if (empty($pwd)||empty($username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$username, $pwd){
    $uidExist= uidExist ($conn,$username, $username);

    if($uidExist===false){
        header("location: ../php/login.php?error=wronglogin");
        exit();
    }
    $pwdHashed=$uidExist["usersPwd"];
    $checkedPwd=password_verify($pwd, $pwdHashed);
    if ($checkedPwd===false){
        header("location: ../php/login.php?error=wronglogin");
        exit();
    } 
    elseif($checkedPwd===true){
        session_start();
        $sql = "UPDATE users SET usersStatus = 1 WHERE usersName = '$username' OR usersEmail ='$username'";
        $result=mysqli_query($conn, $sql);

        $_SESSION["useremail"]=$uidExist["usersEmail"];
        $_SESSION["useruid"]=$uidExist["usersUid"];
        
       // $_SESSION["uid"]=$username;//
        
        header("location: ..\php\mainpage.php");
        exit();
    }
}