<html>
	<head>
	<title>All Products</title>
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
					<li><a href="register.php">Register</a></li>
					<li><a href="custLogin.php">Login</a></li>
					<li id="intranet"><a href="login.php">Staff Intranet</a></li>
					<?php
				}

				?>
				

    </ul>
	</nav>
	
<body>
	<?php
include "db.php";
include "custLoginForm.php"; 

$order = isset($_GET['sort'])?$_GET['sort']:'productID';

error_reporting(0);
$id = $_POST["search"];
if($id==null)
{
	$sql = "SELECT productID, productName, productType, unitPrice, totalProductQuantity, image FROM product ORDER BY $order";
}
else
{
	$sql = "SELECT productID, productName, productType, unitPrice, totalProductQuantity, image FROM product WHERE productID='$id' or productName='$id' or productType='$id' or unitPrice='$id' or totalProductQuantity='$id' or image='$id' ORDER BY $order";

}
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='table2'>";
    while($row = mysql_fetch_array($result)) {
		if($row["totalProductQuantity"] >= 1) {
		echo "<tr class='table2'><td class='table2'>" . 'Product: ' . $row["productName"] . "<br>" . 'Price: &pound' . $row["unitPrice"] . "<br>" . 'Left in stock: ' . $row["totalProductQuantity"] . "<br>" . "</td>";
		if ($row["image"] == null)
		{
			echo "<td class='table2'>" . "No image available";
		}
		else 
		{
			echo "<td class='table2'>" . "<img src='" . $row["image"] . "' style='width:150px;height:150px;'>";
		}
		echo "</td>";
		echo "<td>" . " <form action='OrderProduct.php' method='post' id = 'update' placeholder='Enter Amount'>";
		echo"<input type='hidden' name='ID' value='" . $row["productID"] . "'><br>";
		echo"<input type='hidden' name='productname' value='" . $row["productName"] ."'><br>";
		echo"<input type='hidden' name='producttype' value='" . $row["productType"] ."'><br>";
		echo"<input type='hidden' name='unitprice' value='" . $row["unitPrice"] ."'><br>";
		echo"<input type='hidden' name='totalproductquantity' value='" . $row["totalProductQuantity"] ."'><br>";	
		echo"<input type='hidden' name='image' value='" . $row["image"] ."'><br>";
		?>
		<input type='submit' value='Buy' class='BuyBtn'>
		<?php
		
		include "include/OrderProduct.php";
		echo "</form>";
		
		echo"</tr>";
		}
    }
	echo " </table>";
	
	
?> 
	
	
	</body>
</body>
</html>