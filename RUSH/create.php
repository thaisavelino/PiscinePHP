<?php
include("index.php");
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "Oups, mauvaise combinaison, soyez plus intelligent\n";
}
else
{
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$hashpw = hash("whirlpool", $passwd);
	$user["login"] = $login;
	$user["passwd"] = $hashpw;

	if (!file_exists("./data"))
		mkdir("./data");
	if (file_exists("./data/passwd"))
		$top_user = unserialize(file_get_contents("./data/passwd"));
	if ($top_user) {
		foreach ($top_user as $arg)
		{
			if ($arg['login'] == $login)
			{
				echo "Le compte existe déja\n";
				return ;
			}
		}
	}
	$top_user[] = $user;
	file_put_contents("./data/passwd", serialize($top_user));
	echo "Le compte $login vient d'être crée\n";
	//header("Location:index.php");
}
?>