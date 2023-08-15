<? session_start()?>
<?php
include_once dbh.inc.php;


if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($conn,$_POST["uid"]);
$pwd =mysqli_real_escape_string($conn,$_POST["pwd"]) ;
$qury =  "SELECT * FROM admin WHERE name = '{$username}' AND password = '{$pwd}' LIMIT 1";
$result_set = mysqli_query($conn,$qury);
if($result_set){
    if(mysqli_num_rows($result_set)==1){
        $admin = mysqli_fetch_assoc($result_set);
        $_SESSION['admin_id'] = $admin['name'];
        $_SESSION['first_name']=$admin['password'];
        header("Location: ../public/main.php");
    }
}

}
?>