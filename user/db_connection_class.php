<?php

class DB_Connection_Class{

	 function connection()
	 {
		   global $con;
		  $con = mysqli_connect("localhost","root","","znz_fabrics");
		  //$con = mysql_connect("192.168.49.185","bcluser","bcluser123");
		  //$con = mysql_connect("180.149.11.18","bcluser","bcluser123");
		  if (!$con)
		  {			
				die('Could not connect: ' . mysqli_error());	
		  }
		  
/*		  mysql_select_db("inventory_final_development", $con);
*/	  
	 }
 
 
   function disconnection()
   {
		global $con;
		mysqli_close($con);
   }
}
?>
