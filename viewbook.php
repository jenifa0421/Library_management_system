<?php
session_start();
if(!isset($_SESSION["id"]))
	{
		header("location:alogin.php");
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
<h3 id="head"> View Student Details</h3>
<?php
$sql="select *from bibook";
$res=$db->query($sql);
if($res->num_rows>0)
{
	echo"<table>
	<tr>
	<th> SNO</th>
	<th> BOOK NAME</th>
	<th> KEYWORDS</th>
	<th>VIEW </th>
	</tr>";
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		echo "<tr>";
		echo"<td>{$i}</td>";
		echo"<td>{$row["btitle"]}</td>";
		echo"<td>{$row["keywords"]}</td>";
		echo"<td><a href='{$row["file"]}' target='-blank'>view</a></td>";
		echo"</tr>";
		
		
	}
	
	echo "</table>";
	
	
}
else
{
	echo "<p class='error'>NO BOOKS FOUND</p>";
}
?>
</div>
<div id="navi">
<?php
include"adminsidebar.php";

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
