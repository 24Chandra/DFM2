<?php session_start(); 
unset($_SESSION['username']); 
unset($_SESSION['password']); 
unset($_SESSION['name']); 
session_destroy();		

echo "<script>location.href='index.html'</script>";		
exit();
?>
 