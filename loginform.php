<?php
include "db.php"; 
session_start();

// get content from form


if(isset($_POST['ID']) && $_POST['password']){
	$ID = mysql_real_escape_string ($_POST['ID']);
	//$password = mysql_real_escape_string ($_POST['password']);
	$password= crypt(mysql_real_escape_string ($_POST['password']),"mysalt");


// SQL Insert using variable names


      $password = mysql_real_escape_string($password); 
      
      $sqlQry = "SELECT * FROM staff WHERE staffID = '$ID'";
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
		  if(strcmp(trim($password),trim($row['password']))==0){
		  echo "GGGGGGGGGGGGGG";
		  echo "id: " . $row["staffID"]. " - Name: " . $row["privileges"]. " " . $row["password"];
		  $_SESSION['privileges']=$row["privileges"];
		  $_SESSION['firstname']=$row["sFname"];
		  $_SESSION['surname']=$row["sSurname"];
		  echo "<br>";
		  $_SESSION['login_user']=$ID;
		  header("location: intranet.php"); // Redirecting To Other Page
		}
	  }
		else{
			echo "Login failed";
			header("Refresh:2; url=login.php", true, 303);
		}
	  }

	
}
	  

      
      // If result matched $ID and $password, table row must be 1 row
		
      //if($count == 1) {
         //session_register("ID");
		// $_SESSION['ID'] = $ID;
         //$_SESSION['privileges'] = $row['privileges'];
         
        // header("location: welcome.php");
     // }else {
       //  $error = "Your Login Name or Password is invalid";
     // }
   
?>