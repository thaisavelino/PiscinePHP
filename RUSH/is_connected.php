<?php
	function check_login()
	{
		if(file_exists("data/users") && isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] !== null)
		{
			$series = file_get_contents("data/users");
			$tab = unserialize($series);
			$pass = hash("whirlpool", $passwd);
			foreach ($tab as $key=>$row)
			{
				if ($row["login"] === ($_SESSION["loggued_on_user"]) && $row["statut"] === "admin")
					return("admin");
			}
			return($_SESSION["loggued_on_user"]);
		}
		return(false);
		exit();
	}
	function is_connected() // Fonction qui servira pour mettre l'achat ou pas du panier
	{
		session_start();
		if ($_SESSION['loggued_on_user'] === "" || !($_SESSION['loggued_on_user']))
			return (FALSE);
		else
			return (TRUE);
	}
?>