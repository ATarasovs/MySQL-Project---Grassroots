<html> 
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head> 
	<header>
		<h3><a href="intranet.php">Back</a><h3>
	</header>
	<body> 
	<?php
include "db.php"; 

$order = isset($_GET['sort'])?$_GET['sort']:'staffID';

$sql = "SELECT staff.staffID, staff.sFname,  
	staff.sSurname, staff.branchID, 
	branch.bAddress, bCity, bPostcode
	FROM staff 
	INNER JOIN branch
	ON staff.branchID=branch.branchID ORDER BY $order";
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Payroll Address</h2></caption>
	<tr>
		<th><a href='staffContact.php?sort=staffID'>Staff ID</a></th>
		<th><a href='staffContact.php?sort=sFname'>Name</a></th>
		<th><a href='staffContact.php?sort=sSurname'>Surname</a></th>
		<th><a href='staffContact.php?sort=bAddress'>Address</a></th>
		<th><a href='staffContact.php?sort=bCity'>City</a></th>
		<th><a href='staffContact.php?sort=bPostcode'>Postcode</a></th>
		
	</tr>";
    while($row = mysql_fetch_array($result)) {
		echo "<tr> <td align='center'>" . $row["staffID"] . "</td> <td align='center'>" . $row["sFname"] . "</td> <td align='center'>" . $row["sSurname"] . "</td> <td align='center'>" 
		. $row["bAddress"] . "</td> <td align='center'>" . $row["bCity"] . "</td> <td align='center'>" . $row["bPostcode"];
		echo " </td></tr>";

      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

?> 