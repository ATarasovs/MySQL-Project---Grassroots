<html>
<head>
<meta http-equiv="refresh" content="0; url=Product.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$productname = $_POST["productname"]; 
$producttype = $_POST["producttype"];
$unitprice = $_POST["unitprice"];
$totalquantity = $_POST["totalquantity"];
$image = $_POST["image"];
// SQL Insert using variable names 

if($unitprice==null)
{
	$unitprice = 0;
}
if($totalquantity==null)
{
	$totalquantity = 0;
}

//if($phonenumber==null)
//{
	//$phonenumber = 0;
//}
mysql_query("INSERT INTO product(productID, productName, productType, unitPrice, totalProductQuantity, image) 
VALUES (productID, '$productname', '$producttype', '$unitprice', '$totalquantity', '$image')", $db);
echo "New product added <br>"; 


?> 
</body>
</html>