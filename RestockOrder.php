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
	<form action="RestockOrder.php" method="post">
	<input type="search" name="search" placeholder="Search.."> 
	</form>	
	
	 <?php
include "db.php"; 

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}

$order = isset($_GET['sort'])?$_GET['sort']:'restockID';

error_reporting(0);
$id = $_POST["search"];
if($id==null)
{
	$sql = "SELECT restockID, branchID, restockPrice, restockQuantity, restockOrderDate, productID, supplierID FROM restockorder ORDER BY $order";
}
else
{
	$sql = "SELECT restockID, branchID, restockPrice, restockQuantity, restockOrderDate, productID, supplierID FROM restockorder WHERE restockID='$id' or branchID='$id' or restockPrice='$id' or restockQuantity='$id' or restockOrderDate='$id' or productID='$id' or supplierID='$id' ORDER BY $order";
}
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Restock Orders</h2></caption>
	<tr>
		<th><a href='RestockOrder.php?sort=restockID'>ID</a></th>
		<th><a href='RestockOrder.php?sort=branchID'>Branch ID</a></th>
		<th><a href='RestockOrder.php?sort=restockPrice'>Price</a></th>
		<th><a href='RestockOrder.php?sort=restockQuantity'>Quantity</a></th>
		<th><a href='RestockOrder.php?sort=restockOrderDate'>Order Date</a></th>
		<th><a href='RestockOrder.php?sort=productID'>Product ID</a></th>
		<th><a href='RestockOrder.php?sort=supplierID'>Supplier ID</a></th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		echo "<tr align='center'> <td>" . $row["restockID"] . "</td> <td>" . $row["branchID"] . "</td> <td>" . 
		'&pound' . $row["restockPrice"] . "</td> <td>" . $row["restockQuantity"] . "</td> <td>" . $row["restockOrderDate"] 
		. "</td> <td>" . $row["productID"] . "</td> <td>" . $row["supplierID"];
		echo "</td></tr>";
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo "</table>"

?> 
<br>
<br>
<table width="100%">
<tr>
<td width = "33.3%" align="center"><button id="showAdd">Add Order</button></td>
<td width = "33.3%" align="center"><button id="showDelete">Delete Order</button></td>
<td width = "33.3%" align="center"><button id="showUpdate">Update Order</button></td>
</tr>
<tr >
	<td width = "33.3%" align="center">
	<form name="Add Customer Order" action="AddRestockOrderForm.php" method="post" id = "add" class="center"> 
	<div class="field">
	<label>Branch ID</label>
	<input type="text" name="branchid"><br>
	<label>Restock Price</label>
	<input type="text" name="restockprice"><br>
	<label>Quantity</label>
	<input type="text" name="quantity"><br>
	<label>Product ID</label>
	<input type="text" name="productid"><br>
	<label>Supplier ID</label>
	<input type="text" name="supplierid"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	<td width = "33.3%" align="center">
	<form name="Delete Product" action="DeleteRestockOrderForm.php" method="post" id = "delete" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	
	<td width = "33.3%" align="center">
	<form name="Update Product" action="UpdateRestockOrderForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Branch ID</label>
	<input type="text" name="branchid"><br>
	<label>Restock Price</label>
	<input type="text" name="restockprice"><br>
	<label>Quantity</label>
	<input type="text" name="quantity"><br>
	<label>Product ID</label>
	<input type="text" name="productid"><br>
	<label>Supplier ID</label>
	<input type="text" name="supplierid"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
</tr>
</table>	
	</body>
</html>
