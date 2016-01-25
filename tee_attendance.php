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

	<?php
		$f='';
		$g='';
		$h='';
		$i='';
		
		$conn = mysqli_connect("localhost","root","");
		mysqli_select_db($conn, "lab11");
		$query = "SELECT * FROM attendance WHERE classid = 'EE'" ;

		$result = mysqli_query($conn,$query);

		$count  = mysqli_num_rows($result);
		if($count!=0) 
		{
			mysqli_data_seek($result,0);
			$row = mysqli_fetch_row($result);
			$f = $row[1];

			
			mysqli_data_seek($result,1);
			$row = mysqli_fetch_row($result);
			$g =$row[1];

			mysqli_data_seek($result,2);
			$row = mysqli_fetch_row($result);
			$h = $row[1];

			mysqli_data_seek($result,3);
			$row = mysqli_fetch_row($result);
			$i = $row[1];
		}
		$conn->close();

		if($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			
			$conn = mysqli_connect("localhost","root","");
			mysqli_select_db($conn, "lab11");

		    if (isset($_POST['check1']))
		    {	
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE','$f', 1,CURDATE())";
				$result = mysqli_query($conn,$sql);
				if(! $result )
				   {
				      die('Could not enter data: ' . mysql_error());
				   }
				  else echo "data inserted ";
		    		
		    }
		    else 
		    {
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$f', 0,CURDATE())";
				$result = mysqli_query($conn,$sql);

			}

		     if (isset($_POST['check2']))
		    {
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$g', 1,CURDATE())";
				$result = mysqli_query($conn,$sql);
		    }
		    else{
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$g', 0,CURDATE())";
				$result = mysqli_query($conn,$sql);
			}
		     if (isset($_POST['check3']))
		    {
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$h', 1,CURDATE())";
				$result = mysqli_query($conn,$sql);
		    		
		    }
		    else{
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$h', 0,CURDATE())";
				$result = mysqli_query($conn,$sql);
			}
		     if (isset($_POST['check4']))
		    {
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$i', 1,CURDATE())";
				$result = mysqli_query($conn,$sql);
		    		
		    }
		    else{
		    	$sql = "INSERT INTO attendance (classid, studentid, isPresent,date_taken)
				VALUES ('EE', '$i', 0,CURDATE())";
				$result = mysqli_query($conn,$sql);
			}
			$conn->close();
			header("Location: http://localhost/lab11/teacher.php");
			
		}
	?>


</script>

<body>
<form name="frmUser" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="message"></div>
	<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
		<tr class="tableheader">
			<td align="center" colspan="2">Attendance</td>
		</tr>
		<tr class="tablerow">
			<td align="center">Student Name</td>
			<td>Present</td>
		</tr>
		<tr class="tablerow">
			<td align="center"><?php if($f!="") { echo $f; } ?></td>
			<td> <input type="checkbox" name = 'check1'> </td>
		</tr>
		<tr class="tablerow">
			<td align="center"><?php if($g!="") { echo $g; } ?></td>
			<td><input type="checkbox" name = 'check2'> </td>
		</tr>
		<tr class="tablerow">
			<td align="center"><?php if($h!="") { echo $h; } ?></td>
			<td><input type="checkbox" name = 'check3'> </td>
		</tr>
		<tr class="tablerow">
			<td align="center"><?php if($i!="") { echo $i; } ?></td>
			<td><input type="checkbox" name = 'check4'> </td>
		</tr>
		<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" ></td>
		</tr>
		<tr class="tableheader">
			<td align="left"><input type="button" name="Back" value ="Back" onclick = "document.location.href='teacher.php'"></td>
			<td align="right"><input type="button" name="Logout" value ="Logout" onclick = "document.location.href='login.php'"></td>

		</tr>

	</table>
</form>
</body></html>
