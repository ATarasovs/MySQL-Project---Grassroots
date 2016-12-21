<html>
	<head>
	<title>My Orders</title>
	<link rel="stylesheet" type="text/css" href="CUStyle.css">
</head>
<body>
	<header> 
		<table width="100%">
			<tr>
				<td>
				<h1 class="grassroots">Grassroots</h1>
				</td>
				<td>
				<h2 class="title">Your home of soccer equipment</h2>
				</td>
			</tr>
		</table>
	</header>
		<nav>
			<ul>
				<li class="footer"><a href="index.php">Home</a></li>
				<li><a href="custProducts.php">Products</a></li>		
				<li><a href="custBranch.php">Contact Us</a></li>
				
				<?php
				include "db.php";
include "custLoginForm.php"; 
if(isset($_SESSION['isLoggedIn'])){
if (($_SESSION['isLoggedIn'] == "yes"))
{
    ?>
	<li><a href="custProfile.php">Profile</a></li>
	<li><a href="custOrder.php">Your Orders</a></li>
    <li><a href="logout.php">Log out</a></li>
    <?php
}
}
else
{
    ?>
    <li><a href="custLogin.php">Login</a></li>
	<li id="intranet"><a href="login.php">Staff Intranet</a></li>
	<?php
}

	?>

            </ul>
		</nav>	
			 <?php
include "db.php"; 

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}



error_reporting(0);
	//$sql = "SELECT orderID, orderQuantity, orderDate, productID, customerID FROM customerorder WHERE customerID='{$_SESSION['login_user']}'";
	$sql ="SELECT customerorder.orderID, customerorder.orderQuantity, customerorder.orderDate, product.productName, product.productType, product.unitPrice
	FROM customerorder 
	INNER JOIN product 
	ON customerorder.productID=product.productID
	WHERE customerID='{$_SESSION['login_user']}'
    ORDER BY orderDate";
$result = mysql_query($sql, $db);

echo "<table width = '100%' class='table2'>
	<caption><h2>Customer Orders</h2></caption>
	<tr>
		<th>ID</th>
		<th>Quantity</th>
		<th>Order Date</th>
		<th>Product Name</th>
		<th>Product Type</th>
		<th>Unit Price</th>
		<th>Total Price</th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		$totalprice = $row["orderQuantity"] * $row["unitPrice"];
		echo "<tr align='center'> <td>" . $row["orderID"] . "</td> <td>" . $row["orderQuantity"] . "</td> <td>" . 
		$row["orderDate"] . "</td> <td>" . $row["productName"] . "</td> <td>" . $row["productType"] . "</td> <td>" . $row["unitPrice"] . "</td> <td>" . $totalprice;
		echo "</td></tr>";
    }
	echo " </table>";
	?>
		
</body>
</html>