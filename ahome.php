<?php

session_start();

if(!isset($_SESSION["id"]))
	{
		header("location:alogin.php");
	}
function countrecord($sql,$db)
{
	
	$res=$db->query($sql);
	return $res->num_rows;
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
<h3 id="head"> Welcome Admin </h3>
<div id="center">
<ul class="record">
<li> Total Students :<?php echo countrecord("select *from student",$db)?></li>
<li> Total Books    :<?php echo countrecord("select *from bibook",$db)?></li>
<li> Total Request  :<?php echo countrecord("select *from request",$db)?></li>
<li>Total Comments  :<?php echo countrecord("select *from comment",$db)?></li>



</ul>

</div>
</div>
<div id="navi">
<?php
include"adminsidebar.php"


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
