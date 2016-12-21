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
	<form action="Staff.php" method="post">
	<input type="search" name="search" placeholder="Search.."> 
	</form>	
	
	
	 <?php
	 
	 $order = isset($_GET['sort'])?$_GET['sort']:'staffID';
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

$staffView = "CREATE VIEW staffViewS AS SELECT * FROM staff";
$managerView = "CREATE VIEW managerViewS AS SELECT * FROM staff";
$staff = "SELECT * FROM staffViewS WHERE staffID='{$_SESSION['login_user']}'";
$manager = "SELECT * FROM managerViewS";


if ($_SESSION['privileges'] == "staff"){
	$result = mysql_query($staffView, $db);
	$result2 = mysql_query($staff, $db);
}

if ($_SESSION['privileges'] == "manager"){
	$result = mysql_query($managerView, $db);
	$result2 = mysql_query($manager, $db);
}
// else{
//$result = mysql_query($sql, $db);
// }

//$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Staff</h2></caption>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Position</th>
		<th>Salary</th>
		<th>Address</th>
		<th>City</th>
		<th>Postcode</th>
		<th>Email</th>
		<th>Phone Number</th>
		<th>Branch</th>
		<th>Password</th>
		<th>Privileges</th>
	</tr>";
    while($row = mysql_fetch_array($result2)) {
		echo "<tr> <td align='center'>" . $row["staffID"] . "</td> <td align='center'>" . $row["sFname"] . "</td> <td align='center'>" . $row["sSurname"] . "</td> <td align='center'>" . 
		$row["position"] . "</td> <td align='center'>" . $row["salary"] . "</td> <td align='center'>" . $row["sAddress"] . "</td> <td align='center'>" . $row["sCity"] . "</td> <td align='center'>" .
		$row["sPostcode"] . "</td> <td align='center'>" . $row["sEmail"] . "</td> <td align='center'>" . $row["sPhoneNumber"] . "</td> <td align='center'>" . $row["branchID"] . "</td> <td align='center'>" . $row["password"] . "</td> <td align='center'>" . $row["privileges"];
		echo " </td></tr>";
      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
	  if ($_SESSION['privileges'] == "staff"){
		  if(isset($row["salary"])){
		  $salary = $row["salary"];
		  }
		  if(isset($row["staffID"])){
		  $staffID = $row["staffID"];
		  }
		  if(isset($row["sFname"])){
		  $sFname = $row["sFname"];
		  }
		  if(isset($row["sSurname"])){
		  $sSurname = $row["sSurname"];
		  }
		  if(isset($row["position"])){
		  $position = $row["position"];
		  }
		  if(isset($row["sAddress"])){
		  $sAddress = $row["sAddress"];
		  }
		  if(isset($row["sCity"])){
		  $sCity = $row["sCity"];
		  }
		  if(isset($row["sPostcode"])){
		  $sPostcode = $row["sPostcode"];
		  }
		  if(isset($row["sEmail"])){
		  $sEmail = $row["sEmail"];
		  }
		  if(isset($row["sPhoneNumber"])){
		  $sPhoneNumber = $row["sPhoneNumber"];
		  }
		  if(isset($row["branchID"])){
		  $branchID = $row["branchID"];
		  }
		  if(isset($row["password"])){
		  $password = $row["password"];
		  }
		  if(isset($row["privileges"])){
		  $privileges = $row["privileges"];
		  }
	  }
    }
	echo " </table>"

?> 
<br>
<br>
<table width="100%">
<tr>
<?php 
 if ($_SESSION['privileges'] == "manager"){
?>
<td width = "33.3%" align="center"><button id="showAdd">Add Staff</button></td>
<td width = "33.3%" align="center"><button id="showDelete">Delete Staff</button></td>
<?php
 }
?>
<td width = "33.3%" align="center"><button id="showUpdate">Update Staff</button></td>
</tr>
<tr >
	<td width = "33.3%" align="center">
	<form name="Add staff member" action="AddStaffForm.php" method="post" id = "add" class="center"> 
	<div class="field">
	<label>Firstname</label>
	<input type="text" name="firstname"><br>
	<label>Surname</label>
	<input type="text" name="surname"><br>
	<label>Position</label>
	<input type="text" name="position"><br>
	<label>Salary</label>
	<input type="text" name="salary"><br>
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
	<label>Branch</label>
	<input type="text" name="branch" required><br>
	<label>Password</label>
	<input type="text" name="password"><br>
	<label>Privileges</label>
	<input type="text" required name="privileges"><br>
	<input type="submit" value="Submit">
	
	</div>
	</form> 
	</td>
	<td width = "33.3%" align="center">
	<form name="Delete staff member" action="DeleteStaffForm.php" method="post" id = "delete" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Last name</label>
	<input type="text" name="lastname"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	
	<?php
	if ($_SESSION['privileges'] == "staff"){
	?>
	
	<td width = "33.3%" align="center">
	<form name="Add staff member" action="UpdateStaffForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<input type="hidden" name="id" value='<?php echo htmlspecialchars($_SESSION['login_user']);?>'>
	<label>Firstname</label>
	<input type="text" name="firstname" value="<?php if(isset($sFname)){ echo htmlspecialchars($sFname);}?>"><br>
	<label>Surname</label>
	<input type="text" name="surname" value="<?php if(isset($sSurname)){ echo htmlspecialchars($sSurname);}?>"><br>
	<input type="hidden" name="position" value="<?php if(isset($position)){ echo htmlspecialchars($position);}?>">
	<input type="hidden" name="salary" value="<?php if(isset($salary)){ echo htmlspecialchars($salary);}?>">
	<label>Address</label>
	<input type="text" name="address" value="<?php if(isset($sAddress)){ echo htmlspecialchars($sAddress);}?>"><br>
	<label>City</label>
	<input type="text" name="city" value="<?php if(isset($sCity)){ echo htmlspecialchars($sCity);}?>"><br>
	<label>Postcode</label>
	<input type="text" name="postcode" value="<?php if(isset($sPostcode)){ echo htmlspecialchars($sPostcode);}?>"><br>
	<label>Email</label>
	<input type="text" name="email" value="<?php if(isset($sEmail)){ echo htmlspecialchars($sEmail);}?>"><br>
	<label>Phone Number</label>
	<input type="text" name="phonenumber" value="<?php if(isset($sPhoneNumber)){ echo htmlspecialchars($sPhoneNumber);}?>""><br>
	<label>Branch</label>
	<input type="text" name="branch" required value="<?php if(isset($branchID)){ echo htmlspecialchars($branchID);}?>"><br>
	<label>Password</label>
	<input type="text" required name="password"><br>
	<input type="hidden" name="privileges" value="<?php echo htmlspecialchars($_SESSION['privileges'])?>">
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	
	<?php
	}
	else{
	?>
	
	<td width = "33.3%" align="center">
	<form name="Add staff member" action="UpdateStaffForm.php" method="post" id = "update" class="center"> 
	<div class="field">
	<label>ID (Unique)</label>
	<input type="text" name="id"><br>
	<label>Firstname</label>
	<input type="text" name="firstname"><br>
	<label>Surname</label>
	<input type="text" name="surname"><br>
	<label>Position</label>
	<input type="text" name="position"><br>
	<label>Salary</label>
	<input type="text" name="salary"><br>
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
	<label>Branch</label>
	<input type="text" required name="branch"><br>
	<label>Password</label>
	<input type="text" required name="password"><br>
	<label>Privileges</label>
	<input type="text" name="privileges"><br>
	<input type="submit" value="Submit">
	</div>
	</form> 
	</td>
	<?php
	}
	?>
</tr>
</table>	
	</body>
</html>

	