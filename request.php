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
<h3 id="head"> New Book Request</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="insert into request(id,message,logs) values({$_SESSION["uid"]},'{$_POST["message"]}',now())";
	$db->query($sql);
	echo "<p class='success'> Message Sent</p>";
	
	
}

?>

<form action="<?php  echo $_SERVER["PHP_SELF"];?>" method="post">
<label>Message</label>
<textarea name="message"></textarea>


<button type="submit" name="submit">Send Message</button> 
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
