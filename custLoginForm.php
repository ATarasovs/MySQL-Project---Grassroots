<?php
include "db.php";
 if(!isset($_SESSION)){
session_start();
 }

if(isset($_POST['email']) && $_POST['password']){
	$email = mysql_real_escape_string ($_POST['email']);
	//$password = mysql_real_escape_string ($_POST['password']);
	$password= crypt(mysql_real_escape_string ($_POST['password']),"mysalt");


// SQL Insert using variable names


      
      $sqlQry = "SELECT * FROM customer WHERE cEmail = '$email'";
	  $result = mysql_query($sqlQry, $db);
	  
	  if ($result == false){
		  echo "query failed";
	  }
	  else {
		  
	  
      $row = mysql_fetch_array($result);
	  
	  
	  //$row = mysql_fetch_array($result);
      $rows = mysql_num_rows($result);
	  
	  // If result matched $ID table row must be 1 row
	  if ($rows == 1){
		  if(strcmp(trim($password),trim($row['cPassword']))==0){
		  echo "GGGGGGGGGGGGGG";
		  echo "id: " . $row["customerID"]. " - Name: " . $row["cFname"] ." " . $row["password"];
		  $_SESSION['privileges']="customer";
		  $_SESSION['firstname']=$row["cFname"];
		  $_SESSION['surname']=$row["cSurname"];
		  echo "<br>";
		  $_SESSION['login_user']=$row["customerID"];
		  $_SESSION['isLoggedIn'] = "yes";
		  header("location: custProducts.php"); // Redirecting To Other Page
		}
	  }
		else{
			echo "Login failed";
			header("Refresh:2; url=custLogin.php", true, 303);
		}
	  

	}
}
   
?>