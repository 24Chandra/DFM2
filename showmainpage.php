<?php
$page=$_GET['page'];
if($page==""){$page="main/main";}
$pageopen="$page.php";
if (file_exists("$page.php"))
{include("$page.php");}
else 
{
echo"halaman $page.php tidak ada<br />";
include("main/main.php");
}

?>

