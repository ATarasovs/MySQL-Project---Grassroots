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
$order = isset($_GET['sort'])?$_GET['sort']:'orderID';
$sql = "SELECT customerorder.orderID, product.productName,  
	product.unitPrice, customerorder.orderQuantity, 
	customerorder.orderDate, customer.cFName, cSurname, cAddress, 
	cCity, cPostcode, cPhoneNumber, cEmail
	FROM customerorder 
	INNER JOIN product
	ON customerorder.productID=product.productID
    INNER JOIN customer
	ON customerorder.customerID=customer.customerID
	WHERE orderID=orderID
	ORDER BY $order";
$result = mysql_query($sql, $db);
echo "<table width = '100%' class='demo'>
	<caption><h2>Customer Orders</h2></caption>
	<tr>
		<th><a href='orderDetails.php?sort=orderID'>ID</a></th>
		<th><a href='orderDetails.php?sort=productName'>Product Name</a></th>
		<th><a href='orderDetails.php?sort=unitPrice'>Unit Price</a></th>
		<th><a href='orderDetails.php?sort=orderQuantity'>Quantity</a></th>
		<th><a href='orderDetails.php?sort=orderDate'>Order Date</a></th>
		<th><a href='orderDetails.php?sort=cFName'>First Name</a></th>
		<th><a href='orderDetails.php?sort=cSurname'>Surname</a></th>
		<th><a href='orderDetails.php?sort=cAddress'>Address</a></th>
		<th><a href='orderDetails.php?sort=cCity'>City</a></th>
		<th><a href='orderDetails.php?sort=cPostcode'>Postcode</a></th>
		<th><a href='orderDetails.php?sort=cPhoneNumber'>Phone Number</a></th>
		<th><a href='orderDetails.php?sort=cEmail'>Email</a></th>
	</tr>";
    while($row = mysql_fetch_array($result)) {
		echo "<tr> <td align='center'>" . $row["orderID"] . "</td> <td align='center'>" . $row["productName"] . "</td> <td align='center'>" . $row["unitPrice"] . "</td> <td align='center'>" . 
		$row["orderQuantity"] . "</td> <td align='center'>" . $row["orderDate"] . "</td> <td align='center'>" . $row["cFName"] . "</td> <td align='center'>" . $row["cSurname"] . "</td> <td align='center'>" .
		$row["cAddress"] . "</td> <td align='center'>" . $row["cCity"] . "</td> <td align='center'>" . $row["cPostcode"] . "</td> <td align='center'>" . $row["cPhoneNumber"] . 
		"</td> <td align='center'>" . $row["cEmail"];
		echo " </td></tr>";

      //  echo "<a href = 'index.php/". $row["staffID"] ."'>" . "id: " . $row["staffID"]. " - Name: " . $row["sFname"]. " " . $row["sSurname"]. "<br>" . "</a>";
    }
	echo " </table>"

?> 