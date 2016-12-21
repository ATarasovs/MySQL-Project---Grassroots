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
	<form action="CustomerOrder.php" method="post">
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

$order = isset($_GET['sort'])?$_GET['sort']:'orderID';

error_reporting(0);
$id = $_POST["search"];
if($id==null)
{
	$sql = "SELECT orderID, orderQuantity, orderDate, productID, customerID FROM customerorder ORDER BY $order";
}
else
{
	$sql = "SELECT orderID, orderQuantity, orderDate, productID, customerID FROM customerorder WHERE orderID='$id' or orderQuantity='$id' or orderDate='$id' or productID='$id' or customerID='$id' ORDER BY $order";
}
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Customer Orders</h2></caption>
	<tr>
		<th><a href='CustomerOrder.php?sort=orderID'>ID</a></th>
		<th><a href='CustomerOrder.php?sort=orderQuantity'>Quantity</a></th>
		<th><a href='CustomerOrder.php?sort=orderDate'>Order Date</a></th>
		<th><a href='CustomerOrder.php?sort=productID'>Product ID</a></th>
		<th><a href='CustomerOrder.php?sort=customerID'>Customer ID</a></th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		$orderid = $row["orderID"];
		echo "<tr align='center'> <td>" . $row["orderID"] . "</td> <td>" . $row["orderQuantity"] . "</td> <td>" . 
		$row["orderDate"] . "</td> <td>" . $row["productID"] . "</td> <td>" . $row["customerID"];
		echo "</td></tr>";
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

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
	<form name="Add Customer Order" action="AddCustomerOrderForm.php" method="post" id = "add" class="center"> 
	<div class="field">
	<label>Quantity</label>
	<input type="text" name="quantity"><br>
	<label>Product ID</label>
	<input type="text" name="productid"><br>
	<label>Customer ID</label>
	<input type="text" name="customerid"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	<td width = "33.3%" align="center">
	<form name="Delete Product" action="DeleteCustomerOrderForm.php" method="post" id = "delete" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	
	<td width = "33.3%" align="center">
	<form name="Update Product" action="UpdateCustomerOrderForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Quantity</label>
	<input type="text" name="quantity"><br>
	<label>Product ID</label>
	<input type="text" name="productid"><br>
	<label>Customer ID</label>
	<input type="text" name="customerid"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
</tr>
</table>	
	</body>
</html>
