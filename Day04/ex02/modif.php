<?php
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['oldpw'] == "" || $_POST['newpw'] == "")
{
	echo "ERROR\n";
}
else
{
	$login = $_POST['login'];
	$opasswd = $_POST['oldpw'];
	$npasswd = $_POST['newpw'];
	$hashopw = hash("whirlpool", $opasswd);
	$hashnpw = hash("whirlpool", $npasswd);
	$user["login"] = $login;
	$i = 0;
	
	if(file_exists("../private/passwd") === FALSE)
	{
		echo "ERROR\n";
		return ;
	}
	$top_user = unserialize(file_get_contents("../private/passwd"));
	if ($top_user) {
		foreach ($top_user as $arg)
		{
			if ($arg['login'] == $login){
				if(($arg['login'] == $login) && ($arg['passwd'] == $hashopw))
				{
					$top_user[$i]["passwd"] = $hashnpw;
					file_put_contents("../private/passwd", serialize($top_user));
					echo "OK\n";
					return ;
				}
			}
			$i++;
		}
	}
	echo "ERROR\n";
}
?>