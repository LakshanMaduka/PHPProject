<?php
include_once dbh.inc.php;
include_once functions.inc.php;

if(isset($_POST['submit'])){
$username = $_POST["uid"];
$pwd = $_POST["pwd"];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputsLogin($username,$pwd) !== false){
    exit();
}

    loginUser($conn,$username,$pwd);


}else{
    header('Location:../public/index.php');
    exit();
}
?>