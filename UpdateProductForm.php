<html>
<head>
<meta http-equiv="refresh" content="0; url=Product.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$productname = $_POST["productname"]; 
$producttype = $_POST["producttype"]; 
$unitprice = $_POST["unitprice"]; 
$totalquantity = $_POST["totalquantity"]; 
$image = $_POST["image"]; 

// SQL Insert using variable names 
$sql = "SELECT productID FROM product WHERE productID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no product with such ID";
}
else{
if($unitprice==null)
{
	$unitprice = 0;
}
if($totalquantity==null)
{
	$totalquantity = 0;
}
mysql_query("Update product SET productName = '$productname', productType = '$producttype', unitPrice = '$unitprice', totalProductQuantity = '$totalquantity' , image = '$image'  WHERE productID = '$id'", $db); 
echo "Product was updated successfully <br>"; 	
}
?> 
</body>
</html>