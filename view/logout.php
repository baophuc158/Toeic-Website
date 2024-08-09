<?php
session_start();
if(session_destroy())
{
	//include 'db.php';
	header("Location: ../index.php");
}
?>