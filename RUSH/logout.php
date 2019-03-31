<?php
	session_start();
	$_SESSION["loggued_on_user"] = "";
	//unset($_SESSION['panier']);
	header("Location: index.php?cat=all");
?>