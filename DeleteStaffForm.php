<html>
<head>
<meta http-equiv="refresh" content="0; url=Staff.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$lastname = $_POST["lastname"]; 
// SQL Insert using variable names 
$sql = "SELECT staffID, sSurname FROM staff WHERE staffID='$id' and sSurname='$lastname'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("DELETE FROM staff WHERE staffID ='$id' AND sSurname ='$lastname'", $db);
echo "A staff member was successfully removed <br>"; 	
}
else
{
	echo "There is no a staff member with such ID and last name";	
}

?> 
</body>
</html>