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
.yellow{
color: yellow;
font-weight: bold;
text-align: center;
width: 100%;

}
.red{
color: red;
font-weight: bold;
text-align: center;
width: 100%;

}
.green{
color: green;
font-weight: bold;
text-align: center;
width: 100%;

}
</style>
<?php
$conn = mysqli_connect("localhost","root","");
		mysqli_select_db($conn, "lab11");
		$query = "SELECT isPresent FROM attendance WHERE classid = 'SE' and studentid = 'Neelam Shoaib'" ;

		$result = mysqli_query($conn,$query);

		$count  = mysqli_num_rows($result);

		if($count!=0) 
		{	$sum = 0;
			while($row = mysqli_fetch_assoc($result)) {
				$sum +=  $row['isPresent'];

			}
			$sum = $sum/$count*100;
			
		}
		$conn->close();
?>
<body>
<form name="cs_attendance" method="post" action="">
<div class="message"></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Your Attendance</td>
</tr>
<tr class="tablerow">
<td align="center">Subject</td>
<td align="center">SE</td>

</tr>
<tr class="tablerow">
<td align="center">Percenatge</td>
<td align="center" class= "
<?php
 if ($sum<75)
  echo 'red';
 else if ($sum<85) 
 echo 'yellow';
  else if ($sum>85) 
 echo 'green';
?>"><?php if($sum!="") { echo $sum.'%'; } ?></td>
</tr>

<tr class="tableheader">
<tr class="tableheader">
	<td align="left"><input type="button" name="Back" value ="Back" onclick = "document.location.href='student.php'"></td>
	<td align="right"><input type="button" name="Logout" value ="Logout" onclick = "document.location.href='login.php'"></td>

</tr>
</table>
</form>
</body>
</html>
