<?php
session_start();
include "database.php";
if(!isset($_SESSION["id"]))
	{
		header("location:alogin.php");
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
<h3 id="head"> Upload Books</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$target_dir="upload/";
 $target_file=$target_dir.basename($_FILES["efile"]["name"]);
if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
{
	$sql="insert into bibook(btitle,keywords,file) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
	$db->query($sql);
	echo"<p class='success'> Book Uploaded Successfully</p>";
}
else
{
	echo "<p class='error'>ERROR iN UPLOAD</p>";
}

}

?>

<form action="<?php  echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
<label>Boook Title</label>
<input type="text" name="bname" required>
<label> Keywords</label>
<textarea name="keys" required></textarea>
<label>Upload File</label>
<input type="file" name="efile" required>
<button type="submit" name="submit">Upload Book</button> 
</form>
</div>
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
