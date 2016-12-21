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
	<form action="Customers.php" method="post">
	<input type="search" name="search" placeholder="Search.."> 
	</form>	

	 <?php
include "db.php"; 
include "loginform.php";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}

echo "ID = ";
echo $_SESSION['login_user'];
echo "<br>";
echo $_SESSION['firstname'] . " ";
echo $_SESSION['surname'];
echo "<br>";
echo "Privileges = ";
echo $_SESSION['privileges'];

$staffView = "CREATE VIEW staffViewCust AS SELECT customerID, cFname, cSurname, cPhoneNumber, cEmail FROM customer";
$managerView = "CREATE VIEW managerViewCust AS SELECT * FROM customer";

$order = isset($_GET['sort'])?$_GET['sort']:'customerID';


error_reporting(0);
$id = $_POST["search"];

if($id==null)
{
	$staff = "SELECT * FROM staffViewCust ORDER BY $order";
	$manager = "SELECT * FROM managerViewCust ORDER BY $order";
}
else{
	$staff = "SELECT * FROM staffViewCust WHERE customerID='$id' or cFname='$id' or cSurname='$id' or cAddress='$id' or cCity='$id' or cPostcode='$id' ORDER BY '$order'";
	$manager = "SELECT * FROM managerViewCust WHERE customerID='$id' or cFname='$id' or cSurname='$id' or cAddress='$id' or cCity='$id' or cPostcode='$id' ORDER BY '$order'";
}
//WHERE customerID='$id' or cFname='$id' or cSurname='$id' or cAddress='$id' or cCity='$id' or cPostcode='$id' ORDER BY '$order'


if ($_SESSION['privileges'] == "staff"){
	$result = mysql_query($staffView, $db);
	$result2 = mysql_query($staff, $db);
}

if ($_SESSION['privileges'] == "manager"){
	$result = mysql_query($managerView, $db);
	$result2 = mysql_query($manager, $db);
}

// if($id==null)
// {
	// $sql = "SELECT customerID, cFname, cSurname, cAddress, cCity, cPostcode, cEmail, cPhoneNumber FROM customer ORDER BY $order";
// }
// else
// {
	// $sql = "SELECT customerID, cFname, cSurname, cAddress, cCity, cPostcode, cEmail, cPhoneNumber FROM customer where customerID='$id' or cFname='$id' or cSurname='$id' or cAddress='$id' or cCity='$id' or cPostcode='$id' ORDER BY '$order'";
// }
//$result = mysql_query($sql, $db);

		
echo "<table width = '100%' class='demo'>
	<caption><h2>Customers</h2></caption>
	<tr>
		<th><a href='Customers.php?sort=customerID'>ID</a></th>
		<th><a href='Customers.php?sort=cFname'>First name</a></th>
		<th><a href='Customers.php?sort=cSurname'>Last name</a></th>
		<th><a href='Customers.php?sort=cAddress'>Address</a></th>
		<th><a href='Customers.php?sort=cCity'>City</a></th>
		<th><a href='Customers.php?sort=cPostcode'>Postcode</a></th>
		<th><a href='Customers.php?sort=cPhoneNumber'>Phone number</a></th>
		<th><a href='Customers.php?sort=cEmail'>Email</a></th>
		<th><a href='Customers.php?sort=cPassword'>Password</a></th>
	</tr>";
    while($row = mysql_fetch_array($result2)) {
		echo "<tr> <td align='center'>" . $row["customerID"] . "</td> <td align='center'>" . $row["cFname"] . "</td> <td align='center'>" . $row["cSurname"] . "</td> <td align='center'>" . 
		$row["cAddress"] . "</td> <td align='center'>" . $row["cCity"] . "</td> <td align='center'>" .$row["cPostcode"] . "</td> <td align='center'>" . $row["cPhoneNumber"] . "</td> <td align='center'>" . 
		$row["cEmail"] . "</td> <td align='center'>" . $row["cPassword"];
		echo " </td></tr>";
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

?> 
<br>
<br>
<table width="100%">
<tr>
<td width = "33.3%" align="center"><button id="showAdd">Add Customer</button></td>
<?php 
 if ($_SESSION['privileges'] == "manager"){
?>
<td width = "33.3%" align="center"><button id="showDelete">Delete Customer</button></td>
<?php
 }
?>
<td width = "33.3%" align="center"><button id="showUpdate">Update Customer</button></td>
</tr>
<tr >
	<td width = "33.3%" align="center">
	<form name="Add customer member" action="AddCustomerForm.php" method="post" id = "add" class="center"> 
	<div class="field">
	<label>Firstname</label>
	<input type="text" name="firstname"><br>
	<label>Surname</label>
	<input type="text" name="surname"><br>
	<label>Address</label>
	<input type="text" name="address"><br>
	<label>City</label>
	<input type="text" name="city"><br>
	<label>Postcode</label>
	<input type="text" name="postcode"><br>
	<label>Email</label>
	<input type="text" name="email"><br>
	<label>Phone Number</label>
	<input type="text" name="phonenumber"><br>
	<label>Password</label>
	<input type="text" name="password"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	<td width = "33.3%" align="center">
	<form name="Delete customer member" action="DeleteCustomerForm.php" method="post" id = "delete" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Last name</label>
	<input type="text" name="lastname"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	
	<td width = "33.3%" align="center">
	<form name="Update Customer" action="UpdateCustomerForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Firstname</label>
	<input type="text" name="firstname"><br>
	<label>Surname</label>
	<input type="text" name="surname"><br>
	<label>Address</label>
	<input type="text" name="address"><br>
	<label>City</label>
	<input type="text" name="city"><br>
	<label>Postcode</label>
	<input type="text" name="postcode"><br>
	<label>Email</label>
	<input type="text" name="email"><br>
	<label>Phone Number</label>
	<input type="text" name="phonenumber"><br>
	<label>Password</label>
	<input type="text" name="password"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
</tr>
</table>	
	</body>
</html>