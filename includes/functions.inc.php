<?php
include_once dbh.inc.php;
// identify empty login inputs
function emptyInputsLogin($username,$pwd){
    $result;
    if(empty($username)||empty($pwd)){
        $result =true;
    }else{
        $result= false;
    }
    return $result;
}

// admin idenification
function adminExits($conn,$username){
    $sql = "SELECT * FROM admin WHERE name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:../public/index.php?error =stmtfailed');
        exit();
    }
   else{
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
   
   }
   mysqli_stmt_close($stmt);
}

function loginUser($conn,$username,$pwd){
$admimExit =  adminExit($conn,$username);
if($admimExit === false){
    header("location: ../public/index.php?error=wronglogin");
    exit();
}
$pwdCheck = $admimExit['password'];
if($pwdCheck !== $pwd){
    header('location: ../public/index.php?error=wrongUser');
    exit();
}
else if($pwdCheck === $pwd){
session_start();
$_SESSION["adminName"] = $admimExit["name"];
$_SESSION["adminPwd"] = $admimExit["password"];
header("location: ../public/main.php");
exit();
}
}