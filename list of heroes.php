<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
a
{
text-decoration:none;
color:#000000;
font-family:cursive, fantasy, Roman;
}
.hero-names{
color:#009999;
font-size:24px;
}
.written-portion{
margin-right:900px;
opacity:0.9;
}
h3{

font-family:cursive, fantasy, Roman;
font-size:34px;
color:#003366;
}
body{
background-image:url(image/thumb-1920-807953.png);
/*background-position:right;
background-repeat:no-repeat;
background-size:900px 700px;*/
}
.all{
/*background-image:url(image/eb4662da15a0f4cc647fdb853b238656.jpg);*/
;
background-position:left
background-repeat:no-repeat;


}
.link{
/*background-color:#FFFFFF;}*/
.only_hero_names{
/*background-color:#CCCCCC;*/
}
</style>
</head>

<body>
<?php
session_start();
?>


<h3><b>Rate your favourite hero!!</b></h3>
<?php
//connectiin to database
mysql_connect('localhost','root','');
mysql_select_db('boku_no_hero');
$query="SELECT `hero_name` FROM `hero names`";
$query_run=mysql_query($query);
?>


<div class="all">
<?php while($row=mysql_fetch_array($query_run)):?>
<div class="written-portion">
<div class="hero-names">
  <span class="only_hero_names"><b><?php echo $name=$row['hero_name'];  ?></b></span><br />
</div>
  <span class="link"><a href="list of heroes.php?like=<?php echo $name; ?>" id="link1">Like</a></span>
  <span class="link"><a href="list of heroes.php?dislike=<?php echo $name; ?>" id="link2">UnLike</a></span>
<br />
</div>
  <?php echo "<br>"; ?>
  <?php endwhile;?>
</div>



<?php
if(isset($_REQUEST['like']))
{
$like=$_REQUEST['like'];


$query="UPDATE `hero names` SET `like`=`like`+1 where `hero_name`='$like' ";
if($query_run=mysql_query($query))
{
echo "Got it";
	}
else{
echo mysql_error();
}
}

if(isset($_REQUEST['dislike']))
{
$dislike=$_REQUEST['dislike'];


$query="UPDATE `hero names` SET `dislike`=`dislike`+1 where `hero_name`='$dislike' ";
if($query_run=mysql_query($query))
{
echo "Got it";
	}
else{
echo mysql_error();
}
}
?>


</body>
</html>