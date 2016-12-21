<html>
<head>

</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$productname = $_POST["productname"]; 
$producttype = $_POST["producttype"]; 
$unitprice = $_POST["unitprice"]; 
$totalproductquantity = $_POST["totalproductquantity"]; 
$ordered = $_POST["quantity"]; 
$image = $_POST["image"]; 
$customer = $_POST["customerID"];
$today = date("Y-m-d H:i:s");


$totalquantity = $totalproductquantity-$ordered;
// SQL Insert using variable names 
$sql = "SELECT productID FROM product WHERE productID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no product with such ID";
}
else {
	if($totalquantity<0)
	{
		echo "There is no product left in stock";
		header("Refresh:2; url=custProducts.php", true, 303);
	}
	else{
		
mysql_query("Update product SET productName = '$productname', productType = '$producttype', unitPrice = '$unitprice', totalProductQuantity = '$totalquantity' , image = '$image'  WHERE productID = '$id'", $db); 
mysql_query("INSERT INTO customerOrder(orderQuantity, orderDate, productID, customerID) 
VALUES ('$ordered', '$today', '$id', '$customer')", $db);
echo "Product was updated successfully <br>"; 	
header("Refresh:2; url=custOrder.php", true, 303);
}
}
?> 
</body>
</html>