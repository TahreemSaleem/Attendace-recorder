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
<div class="message"></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Select subject</td>
</tr>
<tr class="tablerow">
<td align="center"><input type="button" name="subject" value ="CS101" onclick = "document.location.href='tcs_attendance.php'"></td>

</tr>
<tr class="tablerow">
<td align="center"><input type="button" name="subject" value ="EE11" onclick = "document.location.href='tee_attendance.php'"></td>
</tr>
<tr class="tablerow">
<td align="center"><input type="button" name="subject" value ="SE121" onclick = "document.location.href='tse_attendance.php'"></td>
</tr>
<tr class="tableheader">
<td align="right"><input type="button" name="Logout" value ="Logout" onclick = "document.location.href='login.php'"></td>

</table>
</form>
</body>



</script>
</html>
