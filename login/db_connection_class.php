<?php

class DB_Connection_Class{

	 function connection()
	 {
		   global $con;
		  /*$con = mysqli_connect("localhost","root","","znz_qc");*/
		  $con = mysqli_connect("localhost","root","","processing");
		   /*$con = mysqli_connect("localhost","root","O@s@t708s\$H\$a461","znz_fabrics");*/
		
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
