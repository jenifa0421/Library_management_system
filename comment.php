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
<h3 id="head"> Send Your Comment</h3>
<?php
if(isset($_POST["submit"]))
{
 $sq="insert into comment (bid,sid,comm,logs)values({$_GET["id"]},{$_SESSION["uid"]},'{$_POST["com"]}',now())";
$db->query($sq);


}
$sql="select*from bibook where bid=".$_GET["id"];
$res=$db->query($sql);
if($res->num_rows>0)
{
	echo"<table>";
	$row=$res->fetch_assoc();
	echo 
	    "<tr>
		
		<th>BOOK NAME</th>
		<td>{$row["btitle"]}</td>
	    </tr>
		<tr>
		<th>KEYWORDS</th>
		<td>{$row["keywords"]}</td>
		</tr>
	";
	echo "</table>";
}
else
{
echo "<p class='error'>NO BOOKS FOUND</p>";	
}


?>
<div id="center">
<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post">
<label>YOUR COMMENTS</label>
<textarea name="com" required></textarea>
<button type="submit" name="submit">POST NOW</button>
</form>


</div>
<?php

$s="SELECT student.name ,comment.comm,comment.logs from comment inner join student on comment.sid=student.id where comment.bid={$_GET["id"]} order by comment.cid desc";
$res=$db->query($s);

if($res->num_rows>0)
{
	while($row=$res->fetch_assoc())
	{
		echo "<p>
		<strong>{$row["name"]}   :</strong>
			{$row["comm"]}
			<i>{$row["logs"]}</i>
		
		
		</p>"; 
	}
}
else
{
	echo "<p class='error'>NO COMMENTS FOUND</p>";
	
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
