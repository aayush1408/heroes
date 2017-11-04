<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>

</style>
</head>

<body>
<?php
mysql_connect('localhost','root','');
$query="CREATE DATABASE IF NOT EXISTS `boku_no_hero`";
if($query_run=mysql_query($query)){
echo "DATABSE CREATED";
}
?>
</body>
</html>
