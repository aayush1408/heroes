<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Become a hero!!</h1>
<?php 
mysql_connect('localhost','root','');
mysql_select_db('boku_no_hero');
  ?>
<?php 
if( isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rpassword']) )
{
$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];
   if( !empty($name) && !empty($username) && !empty($email) && !empty($password)  && !empty($rpassword) )
   {
   $q=1;
   if(strlen($password)>5)
    {
    if($password==$rpassword)
	  {
      	$password_hash=md5($password);
		$query="SELECT `Username` FROM `users`";
		if($query_run=mysql_query($query))
            {
			while($row=mysql_fetch_array($query_run))
			  {
			  if($row['Username']==$username)
			     {
			        echo "Username already exists";
					$q=0;
					break;
				 }
				 
			   }
			 } 
		else 
		{
		echo mysql_error();
		}
		if($q == 1){	     	  	 
		      $query="INSERT INTO `users` VALUES('','$name','$username','$email','$password_hash','$password_hash')";
		      if($query_run=mysql_query($query))
		          {
		          header("Location:homepage.php");
		          }
		          else
		          {
		               echo mysql_error();
		          }
                 }
	}
	 else
	 {
	 echo "Password aren't same";
	 } 
   }
   
   else{
   echo "Password is not strong";
   }}
   else
   {
  echo "Fill in all the fields";
  }

}

?>
<form action=""  method="post" ><br />
Name<input type="text" name="name" /><br />
<br />
Hero-name<input type="text" name="username" /><br />
<br />
Email<input type="email" name="email" /><br />
<br />
Enter your Password:<input type="password" name="password" /><br />
<br />
Enter your password again:<input type="password" name="rpassword" /><br />
<br>
<input type="submit" />
</form>
</body>
</html>
