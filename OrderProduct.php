<html>
	<head>
	<title>All Products</title>
	<link rel="stylesheet" type="text/css" href="CUStyle2.css">
	
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

if(isset($_POST['ID'])){
	$productID = $_POST['ID'];
}
if(isset($_POST['productname'])){
	$productname = $_POST['productname'];
}
if(isset($_POST['producttype'])){
	$producttype = $_POST['producttype'];
}
if(isset($_POST['unitprice'])){
	$unitprice = $_POST['unitprice'];
}
if(isset($_POST['image'])){
	$image = $_POST['image'];
}
if(isset($_POST['totalproductquantity'])){
	$totalproductquantity = $_POST['totalproductquantity'];
}

?>
<div id="productDisplay">
<table id="productDisplayTable">
  <tr>
    <th>Product ID</th>
    <th>Name</th> 
    <th>Product type</th>
	<th>Price</th>
	<th>Image</th>
  </tr>
  <tr>
    <td><?php echo $productID;?></td>
    <td><?php echo $productname;?></td> 
    <td><?php echo $producttype;?></td>
	<td><?php echo $unitprice;?></td>
	<td><?php echo '<img class="img" src="'.$image.'" alt="product" height=75px width=75px>'; ?> </td>
  </tr>
  </table>
  <form action='UpdateCustProductForm.php' method='post' id = 'update' placeholder='Quantity'>
  <input type='hidden' name='ID' value=>
  <?php
  

if(isset($_SESSION['isLoggedIn'])){		
if($_SESSION['isLoggedIn'] == "yes"){
		
		echo"<input type='hidden' name='id' value='" . $productID . "'>";
		echo"<input type='hidden' name='productname' value='" . $productname ."'>";
		echo"<input type='hidden' name='producttype' value='" . $producttype ."'>";	
		echo"<input type='hidden' name='unitprice' value='" . $unitprice ."'><br>";
		echo"<input type='hidden' name='totalproductquantity' value='" . $totalproductquantity ."'><br>";
		echo"<input type='hidden' name='image' value='" . $image ."'><br>";
		echo"<input type='hidden' name='customerID' value='" . $_SESSION['login_user'] ."'>";	
		?>
		<input type="text" name="quantity" id="amount" class="amount" placeholder="Quantity" pattern=".{1,4}" required title="Quantity">
		<input type='submit' value='Submit' class='SubmitBtn'>
		<?php
		echo "</form>";
  
  
}
}
else{


?>

	<a href ="custLogin.php"><input type='login' value='Login' class='SubmitBtn'></a>
<?php 
}
?>
</div>

	
	
	
</body>
</html>