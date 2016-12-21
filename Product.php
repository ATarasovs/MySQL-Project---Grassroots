<html> 
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
window.onload = function(){
		$("#add")	.hide();
		$("#delete").hide();
		$("#update").hide();
	}
$(document).ready(function(){
    $("#showAdd").click(function(){
        $("#add").show();
		$("#delete").hide();
		$("#update").hide();
    });
    $("#showDelete").click(function(){
        $("#add").hide();
		$("#delete").show();
		$("#update").hide();
    });
	$("#showUpdate").click(function(){
        $("#add").hide();
		$("#delete").hide();	
		$("#update").show();
    });

});
</script>
	</head> 
	<header>
		<h3><a href="intranet.php">Back</a><h3>
	</header>
	<body> 
	<form action="Product.php" method="post">
	<input type="search" name="search" placeholder="Search.."> 
	</form>	
	
	 <?php
include "db.php"; 
include "loginform.php";

echo "ID = ";
echo $_SESSION['login_user'];
echo "<br>";
echo $_SESSION['firstname'] . " ";
echo $_SESSION['surname'];
echo "<br>";
echo "Privileges = ";
echo $_SESSION['privileges'];

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}

$order = isset($_GET['sort'])?$_GET['sort']:'productID';

error_reporting(0);
$id = $_POST["search"];
if($id==null)
{
	$sql = "SELECT productID, productName, productType, unitPrice, totalProductQuantity, image FROM product ORDER BY $order";
}
else
{
	$sql = "SELECT productID, productName, productType, unitPrice, totalProductQuantity, image FROM product where productID='$id' or productName='$id' or productType='$id' ORDER BY $order";
}
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Product</h2></caption>
	<tr>
		<th><a href='Product.php?sort=productID'>ID</a></th>
		<th><a href='Product.php?sort=productName'>Product Name</a></th>
		<th><a href='Product.php?sort=productType'>Product Type</a></th>
		<th><a href='Product.php?sort=unitPrice'>Unit Price</a></th>
		<th><a href='Product.php?sort=totalProductQuantity'>Total Quantity</a></th>
		<th><a href='Product.php?sort=image'>Image</a></th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		if($row["image"]==null)
		{
		echo "<tr> <td align='center'>" . $row["productID"] . "</td> <td align='center'>" . $row["productName"] . "</td> <td align='center'>" . $row["productType"] . "</td> <td align='center'>" . 
		$row["unitPrice"] . "</td> <td align='center'>" . $row["totalProductQuantity"] . "</td> <td align='center'>" . 'There is no image';
		echo "</td></tr>";
		}
		else{
			
		echo "<tr> <td align='center'>" . $row["productID"] . "</td> <td align='center'>" . $row["productName"] . "</td> <td align='center'>" . $row["productType"] . "</td> <td align='center'>" . 
		$row["unitPrice"] . "</td> <td align='center'>" . $row["totalProductQuantity"] . "</td> <td align='center'>" . "<a href='" . $row["image"] . "'>" . 'Image link' . "</a>";
		echo "</td></tr>";
		}
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

?> 
<br>
<br>
<?php 
 if ($_SESSION['privileges'] == "manager"){
?>
<table width="100%">
<tr>
<td width = "33.3%" align="center"><button id="showAdd">Add Product</button></td>
<td width = "33.3%" align="center"><button id="showDelete">Delete Product</button></td>
<td width = "33.3%" align="center"><button id="showUpdate">Update Product</button></td>
</tr>
<tr >
	<td width = "33.3%" align="center">
	<form name="Add Product" action="AddProductForm.php" method="post" id = "add" class="center"> 
	<div class="field">
	<label>Product Name</label>
	<input type="text" name="productname"><br>
	<label>Product Type</label>
	<input type="text" name="producttype"><br>
	<label>Unit Price</label>
	<input type="text" name="unitprice"><br>
	<label>Total Quantity</label>
	<input type="text" name="totalquantity"><br>
	<label>Image</label>
	<input type="text" name="image"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	<td width = "33.3%" align="center">
	<form name="Delete Product" action="DeleteProductForm.php" method="post" id = "delete" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	
	<td width = "33.3%" align="center">
	<form name="Update Product" action="UpdateProductForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Product Name</label>
	<input type="text" name="productname"><br>
	<label>Product Type</label>
	<input type="text" name="producttype"><br>
	<label>Unit Price</label>
	<input type="text" name="unitprice"><br>
	<label>Total Quantity</label>
	<input type="text" name="totalquantity"><br>
	<label>Image</label>
	<input type="text" name="image"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
</tr>
</table>	
<?php
 }
 ?>
	</body>
</html>
