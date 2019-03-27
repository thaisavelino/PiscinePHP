#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		$data = trim(preg_replace('#\s+#', ' ', $argv[1]));
		echo $data."\n";
	}
?>