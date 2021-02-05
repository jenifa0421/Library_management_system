<?php

session_start();

if(!isset($_SESSION["uid"]))
	{
		header("location:ulogin.php");
	}


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
<h3 id="head"> Welcome <?php echo $_SESSION["uname"];?> </h3>
<div id="center">


</div>
</div>
<div id="navi">
<?php
include"usersidebar.php"


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
