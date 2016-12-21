<html> 
	<head> 
	<title> Your Profile </title>
		<link rel="stylesheet" type="text/css" href="CUStyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
window.onload = function(){
		$("#update").hide();
	}
	
 
$(document).ready(function(){
	$("#showUpdate").click(function(){	
		$("#update").show();
    });
	
	jQuery(document).ready(function(){
    jQuery('#RegisterBtn').live('click', function(event) {        
         jQuery('#RegisterForm').toggle('show');
    });
});
	
});
</script>
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
include "custLoginForm.php";

$sql = "SELECT * FROM customer WHERE customerID='{$_SESSION['login_user']}'";
$result = mysql_query($sql, $db);

	while($row = mysql_fetch_array($result)) {	
echo "<table align='center' class='table3'>

	</br>
	<th>
		Name: 
	</th>
	<td>	
		" . $row["cFname"] . " " . $row["cSurname"] . "
	</td> 		  	
<tr>
	<th rowspan='4'> Address: </th>
</tr>
    <td> 
		". $row["cAddress"] . 
	"</td>
<tr>
    <td>" 
		. $row["cCity"] . 
	"</td>
</tr>
<tr>
	<td>" 
		. $row["cPostcode"] . "
	</td> 
</tr>
<tr>
	<th>
		Email Address: 
	</th>
	<td>
		" . $row["cEmail"] . "
	</td>
</tr>
<tr>
	<th>
		Phone Number: 
	</th>
	<td>
		" . $row["cPhoneNumber"] . "
	</td>
</tr>";
}
	echo " </table>"

?> 
<br>
<br>
<table width="100%">
	<tr>
		<td> 
			<div id="showUpdate">
			<button class="ProfileBtn" style="vertical-align:middle"><span>Update Profile</span></button>
			</div>
		</td>
	</tr>
	<tr>
		<td width = "33.3%" align="center"></td>
	</tr>
<tr >
<td width = "33.3%" align="center">
<div id="RegisterForm">
<article>
<form name="Customer Registration" action="UpdateCustomerProfileForm.php" method="post" id="update">
<?php
echo"<input type='hidden' name='id' value='" . $_SESSION['login_user'] . "'><br>";
?> 

<input type="text" name="firstname" id="fname" placeholder="Firstname" pattern=".{1,10}" required title="Enter First name">
<input type="text" name="surname" id="sname" placeholder="Surname" pattern=".{1,10}" required title="Enter Surname">
<input type="text" name="address" id="Address" placeholder="Address" pattern=".{1,20}" required title="Enter Address">
<input type="text" name="city" id="City" placeholder="City" pattern=".{1,15}" required title="Enter City">
<input type="text" name="postcode" id="Postcode" placeholder="Postcode" pattern=".{1,7}" required title="Postcode">
<input type="text" name="phonenumber" id="PhoneNumber" placeholder="Phone number" pattern=".{1,11}" required title="Phone">
<input type="text" name="email" id="Email" placeholder="Email address" pattern=".{1,20}" required title="Enter Email">
<input type="password" name="password" id="Password" placeholder="Password" pattern=".{4,15}" required title="4 to 15 characters"><br>
<input type="submit" value="Update Profile" class="RegisterBtn">
</form>
</article>
</div>
<br/>
	</td>
</tr>
</table>	
	</body>
</html>