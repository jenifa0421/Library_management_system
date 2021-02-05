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
<h3 id="head"> View Request Details</h3>
<?php
$sql="select bibook.btitle, student.name,comment.comm,comment.logs from comment inner join bibook on bibook.bid=comment.bid inner join student on comment.sid=student.id;";
$res=$db->query($sql);
if($res->num_rows>0)
{
	echo"<table>
	<tr>
	<th> SNO</th>
	<th> BOOK NAME</th>
	<th> STUDENT NAME</th>
	<th> COMMENT</th>
	<th>LOGS</th>
	</tr>";
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		echo "<tr>";
		echo"<td>{$i}</td>";
		echo"<td>{$row["btitle"]}</td>";
		echo"<td>{$row["name"]}</td>";
		echo"<td>{$row["comm"]}</td>";
				echo"<td>{$row["logs"]}</td>";
		echo"</tr>";
		
		
	}
	
	echo "</table>";
	
	
}
else
{
	echo "<p class='error'>NO COMMENTS FOUND</p>";
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
