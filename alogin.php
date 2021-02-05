<?php
session_start();
include "database.php";

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
<h3 id="head"> Admin Login Here</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="select *from admin where aname='{$_POST["aname"]}'and apass='{$_POST["apass"]}'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$row=$res->fetch_assoc();
	$_SESSION["id"]=$row["id"];
	$_SESSION["name"]=$row["aname"];
	
		header("location: ahome.php");
	}
	else{
		echo "<p class='error'> Invalid User</p>";
	}
	
}


?>
<form action="alogin.php" method="post" >
<label>Name</label>
<input type="text" name="aname" required>
<label> Password</label>
<input type="password" name="apass" required>
<button type="submit" id="button" name="submit"> Login Now</button>
</form>
</div>
</div>
<div id="navi">
<?php
include "sidebar.php"


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
