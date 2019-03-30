<?php
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "ERROR\n";
}
else
{
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$hashpw = hash("whirlpool", $passwd);
	$user["login"] = $login;
	$user["passwd"] = $hashpw;

	if (!file_exists("../private"))
		mkdir("../private");
	if (file_exists("../private/passwd"))
		$top_user = unserialize(file_get_contents("../private/passwd"));
	if ($top_user) {
		foreach ($top_user as $arg)
		{
			if ($arg['login'] == $login)
			{
				echo "ERROR\n";
				return ;
			}
		}
	}
	$top_user[] = $user;
	file_put_contents("../private/passwd", serialize($top_user));
	echo "OK\n";
}
?>