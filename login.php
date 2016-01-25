<html>
<head>

<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php
$message="";
$role = "";
if(count($_POST)>0) {
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "lab11");
$query = "SELECT * FROM user WHERE fullname='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'";

$result = mysqli_query($conn,$query);

$count  = mysqli_num_rows($result);
if($count==0) {
$message = "Invalid Username or Password!";

} 
else 
{
	$message = "You are successfully authenticated!";

	while($row = mysqli_fetch_array($result))
	{
	 $role = $row["role"]; //echo $row[0];
	}
	//
	if ($role == "teacher")
		header("Location: http://localhost/lab11/teacher.php");
	if ($role == "student")
		header("Location: http://localhost/lab11/student.php");
}
}
?>
</head>
<style>
.tableheader {
background-color: #95BEE6;
color:white;
font-weight:bold;
}
.tablerow {
background-color: #A7D6F1;
color:white;
}
.message {
color: #FF0000;
font-weight: bold;
text-align: center;
width: 100%;
}
</style>
<body>
<form name="frmUser" method="post" action="">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="userName"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body></html>
