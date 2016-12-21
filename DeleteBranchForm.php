<html>
<head>
<meta http-equiv="refresh" content="0; url=Branch.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"]; 
// SQL Insert using variable names 
$sql = "SELECT branchID FROM branch WHERE branchID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM branch WHERE branchID = '$id'", $db);
echo "A branch was successfully removed <br>"; 	
}
else
{
	echo "There is no branch with such ID";	
}

?> 
</body>
</html>