<html> 
	<head> 
	<title> Contact Us </title>
		<link rel="stylesheet" type="text/css" href="CUstyle2.css">

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

	 <?php
include "db.php"; 
//include "loginform.php";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}

//$staffView = "CREATE VIEW staffView AS SELECT staffID,sFname, sSurname, position, salary , sAddress, sCity, sPostcode, sEmail, sPhoneNumber, branchID FROM staff WHERE ID = '$_SESSION['ID']'";
//$managerView = "CREATE VIEW managerView AS SELECT staffID,sFname, sSurname, position, salary , sAddress, sCity, sPostcode, sEmail, sPhoneNumber, branchID FROM staff";
$order = isset($_GET['sort'])?$_GET['sort']:'branchID';

error_reporting(0);
$id = $_POST["search"];
if($id==null)
{
	$sql = "SELECT bAddress, bCity, bPostcode FROM branch ORDER BY $order";
}
else
{
	$sql = "SELECT bAddress, bCity, bPostcode FROM branch WHERE bAddress='$id' or bCity='$id' or bPostcode='$id' ORDER BY $order";
}
$result = mysql_query($sql, $db);
echo "<table width = '40%' class='demo'><br>
	<caption><h2>Our Stores</h2></caption>
	<tr>
		<th>City</th>
		<th>Address</th>
		<th>Postcode</th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		echo "<tr> <td>" . $row["bCity"] . "</td> <td>" . $row["bAddress"] . "</td> <td>" . $row["bPostcode"];
		echo " </td></tr>";
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

?> 
	</body>
</html>