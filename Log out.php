<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
session_start();  
mysql_connect('localhost','root','');
mysql_select_db('boku_no_hero');

?>

<?php


if(isset($_POST['Username']) && isset($_POST['password']))
{
$username=$_POST['Username'];
$password=$_POST['password'];
$password_hash=md5($password);
if(!empty($username) && !empty($password))
{
$query="SELECT `Username` , `password` ,`Id` FROM `users`";
if($query_run=mysql_query($query))
{
while($row=mysql_fetch_assoc($query_run))
{
if($row['Username']==$username && $row['password']==$password_hash){

echo $_SESSION['id']=$row['Id'];
header ("Location:login.php");
}

}
}

}
}


?>

<form method="post" action="">
Hero name:<input type="text" name="Username" />
Password:<input type="password" name="password" />
<input type="submit" />
</form>
</body>
</html>
