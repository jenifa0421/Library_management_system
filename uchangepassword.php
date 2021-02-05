<?php
session_start();
include "database.php";
if(!isset($_SESSION["uid"]))
	{
		header("location:ulogin.php");
	}


?>

<html>
<head>
<title>
library
</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="con">
<div id="header">
<h1> E-Library Management system</h1>

</div>
<div id="wrapper">
<h3 id="head"> Change Password</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="select *from student where pass='{$_POST["opass"]}' and id='{$_SESSION["uid"]}'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$s="update student set pass='{$_POST["npass"]}' where id='{$_SESSION["uid"]}'";
		$db->query($s);
		echo"<P class='success'>Password Changed</P>";
		
	}
	else
	{
		echo "<p class='error'>Invalid Password</p>";
	}
	
	
}

?>

<form action="<?php  echo $_SERVER["PHP_SELF"];?>" method="post">
<label>Old Password</label>
<input type="password" name="opass" required>
<label> New Password</label>
<input type="password" name="npass" required>
<button type="submit" name="submit">Update Password</button> 
</form>
</div>
</div>
<div id="navi">
<?php
include"usersidebar.php";

?>
</div>
<div id="footer">
<p>
copyright &copy; jeni2017
</p>
</div>
</div>
</body>
</html>
