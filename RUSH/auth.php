<?php
	function auth($login, $passwd)
	{
		if($login === NULL || $passwd === NULL)
			return FALSE;
		if (file_exists("./data/passwd") === FALSE)
			return FALSE;
		$top_user = unserialize(file_get_contents("./data/passwd"));
		if ($top_user)
		{
			foreach ($top_user as $arg)
			{
				if ($arg['login'] === $login && $arg['passwd'] === hash("whirlpool",$passwd))
					return TRUE;
			}
		}
		return FALSE;
	}
?>