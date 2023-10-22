<?php
	
	session_start();

	if(session_destroy())
	{
		echo "<script>alert('Logout Succesfull')</script>";
		echo "<script>window.location='index.php'</script>";
	}

?>