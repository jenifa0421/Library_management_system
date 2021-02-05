<?php
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
<h3 id="head">New User Registration</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
$sql="insert into student(name,pass,mail,dep)values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
$db->query($sql);
echo"<p class='success'>User Registration Success</p>";

}

?>

<form action="<?php  echo $_SERVER["PHP_SELF"];?>" method="post">
<label>Name</label>
<input type="text" name="name" required>
<label> Password</label>
<input type="password" name="pass" required>
<label>Email ID</label>
<input type="email" name="mail" required>
<label> Department</label>
<select name="dep" required>
<option value="">select</option>
<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EIE">EIE</option>
<option value="OTHERS">OTHERS</option>

</select>
<button type="submit" name="submit">Register</button> 
</form>
</div>
</div>
<div id="navi">
<?php
include"sidebar.php";

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
