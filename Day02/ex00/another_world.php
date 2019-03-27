#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$data = trim(preg_replace('#\s+#', ' ', $argv[1]));
		echo $data."\n";
	}
?>