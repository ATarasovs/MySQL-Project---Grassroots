<html>
<head>
<meta http-equiv="refresh" content="0; url=RestockOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$branchid = $_POST["branchid"]; 
$restockprice = $_POST["restockprice"];
$quantity = $_POST["quantity"];
$productid = $_POST["productid"];
$supplierid = $_POST["supplierid"];

if($restockprice==null)
{
	$restockprice = 0;
}
if($quantity==null)
{
	$quantity = 0;
}
// SQL Insert using variable names 
$sql = "SELECT restockID FROM restockorder WHERE restockID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no restock order with such ID";
}

else{
mysql_query("Update restockorder SET branchID = '$branchid', restockPrice = '$restockprice', restockQuantity = '$quantity',
  supplierID = '$supplierid', productID = '$productid' WHERE restockID = '$id'", $db); 
echo "A restock order was successfully updated <br>"; 	
}

?> 
</body>
</html>