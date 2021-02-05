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
<h3 id="head"> Search Books</h3>
<div id="center">

<form action="<?php  echo $_SERVER["PHP_SELF"];?>" method="post">
<label>Enter Name Of The Book</label>
<input type="text" name="keys" required>


<button type="submit" name="submit">Search Book</button> 
</form>
</div>
<?php

if(isset($_POST["submit"]))
{
$sql="select *from bibook where btitle like '%{$_POST["keys"]}%' or keywords like'%{$_POST["keys"]}%'";


$res=$db->query($sql);
if($res->num_rows>0)
{
	echo"<table>
	<tr>
	<th> SNO</th>
	<th> BOOK NAME</th>
	<th> KEYWORDS</th>
	<th>VIEW </th>
	<th>COMMENT</th>
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
	echo"<td><a href='comment.php?id={$row["bid"]}'>Go</a></td?";
		echo"</tr>";
		
		
	}
	
	echo "</table>";
	
	
}

else
{
	echo "<p class='error'>NO BOOOKS FOUND</p>";
}

}
?>
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
