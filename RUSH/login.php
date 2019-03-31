<?php
	include('auth.php');
	//include('index.php');
	session_start();
	if($_POST['login'] === "" || $_POST['passwd'] === "")
	{
		$_SESSION['loggued_on_user'] = "";
		echo "<div style=\"color:red;margin:20px\"> Il manque quelques chose ...</div>";
	}
	else
	{
		if(auth($_POST['login'],$_POST['passwd']) === TRUE)
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
			if($_POST['login'] != "root")
				header("Location: index.php?cat=all");
			else
				header("Location: adminpage.php");
			echo "Vous etes connecte";
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo "<div style=\"color:red;margin:20px\"> ERREUR !</div>";
		}
	}
?>