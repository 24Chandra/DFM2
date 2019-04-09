<?php

session_start();
ini_set("display_errors", 0);
include('script/koneksi.php');
$username = $_POST['username'];
$pas = $_POST['password'];
$passwd = md5($pas);


$sql = mysqli_query($dbhandle, "SELECT id,name,username,password FROM userlogin WHERE username = '$username' AND PASSWORD = '$passwd'");
$hsl = mysqli_fetch_array($sql);
$user = $hsl['username'];

if ($user != '') {
    $_SESSION["name"] = $hsl['name'];
    echo "<script>location.href='main.php?page=main/index'</script>";
    exit;
} else {
    echo "<script type='text/javascript'> alert ('Incorect Password and Username')</script> ";
    include_once "index.php";
    exit;
}
?>
 
