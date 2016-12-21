<html>
<head>
<meta http-equiv="refresh" content="0; url=RestockOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
// SQL Insert using variable names 
$sql = "SELECT restockID FROM restockorder WHERE restockID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM restockorder WHERE restockID = '$id'", $db);
echo "A restock order was successfully removed <br>"; 	
}
else
{
	echo "There is no restock order with such ID";	
}

?> 
</body>
</html>