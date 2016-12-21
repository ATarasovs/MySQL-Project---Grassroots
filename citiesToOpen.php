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

$sql = "SELECT DISTINCT cCity from customer
where cCity not in
(SELECT bCity from branch)";
$result = mysql_query($sql, $db);

echo "<table width = '100%' class='demo'>
	<caption><h2>Cities with customers but no branches:</h2></caption>
	<tr>
		<th>City</th>
		
	</tr>";
	if(mysql_num_rows($result)== 0){
		echo "There are branches everywhere our customers are!";
	}
	else{
    while($row = mysql_fetch_array($result)) {
	echo "<tr> <td align='center'>" . $row["cCity"] . "</td></tr>";
    }
	echo " </table>";
	}

?> 