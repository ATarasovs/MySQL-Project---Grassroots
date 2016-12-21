<?php 
//echo "Starting connection ...<br>"; 
// CONNECT TO DATABASE - use your own username and password  
$db = mysql_connect("silva.computing.dundee.ac.uk", "16ac3u17", 
"111bbb"); 
// SELECT DATABASE - use your own database name 
mysql_select_db("16ac3d17");  
if(!$db){
echo mysql_error() ; 
} 
else{ 
//echo "Successfully connected. <br>"; 
} 
// CLOSE CONNECTION 

?>