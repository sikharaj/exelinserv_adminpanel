<?php
echo "HII";
	session_start();
	if(session_destroy())
	{
		header("Location: index.php");
	}
?>
