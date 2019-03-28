#!/usr/bin/php
<?PHP
	/* Function to test you google some image and take the link of this.. 
		you will have a folder google.com with all the images you got
	*/
// Threat errors
if (empty($argv[1]))
{
	//echo "[Warning] You need to put the url\n";
	return -1;
}
function error_curl($s, $argc)
{
	$test = curl_init($s);
	curl_setopt($test, CURLOPT_RETURNTRANSFER, 1);
	$exec = curl_exec($test);
	if ($exec == FALSE)
	{
		//echo "[Error] curl cannot access this url, check the address again.\n";
		return (1);
	}
	curl_close($test);
}
if (error_curl($argv[1], $argc))
	return -1;
if ($argc == 2)
{
	$c = curl_init($argv[1]);//this is the fd.. you init curl
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);//make silent otherwise will print shits
	$str = curl_exec($c);//put in a string
	curl_close($c);// close the curl session
	$tmp = array();// just allocatd memory for the str .. whatever
	$imgs = array();
	preg_match_all("/<img[^s]+src\s*=\".[^\"]+/", $str, $tmp); 
	//take from str and put in tmp -> <img src="/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" 
	foreach ($tmp[0] as $elem)
	{
		$elem = preg_replace("/<img[^s]+src\s*=\"/", "", $elem); // take this shit out "<img[^s]+src\s*=\"" and put "" nothing
		if (preg_match("/^\//", $elem))//if there is a '/'at the beginning (like this --> /images/branding/googlelogo/2x/googlelogo_color_92x30dp.png)
			$elem = $argv[1].$elem;// Then put $argv[1] at the beginning so "http://www.42.fr"
		array_push($imgs, $elem);// then take all the things and put in array imgs
	}
	$stack = explode("/", $argv[1]);
	$dirname = $stack[2]; //take whats after http://
	$dirname = dirname(__FILE__)."/".$dirname;// dirname is the name  of the folder we are and and name it as /[content at name_ofdir]
	if (!file_exists($dirname))
		mkdir($dirname);
	foreach ($imgs as $i)
	{
		$fd = curl_init($i);
		curl_setopt($fd, CURLOPT_RETURNTRANSFER, 1);
		$str = curl_exec($fd);
		$stack = explode("/", $i);
		$filename = $stack[count($stack) - 1];
		file_put_contents($dirname."/".$filename, $str);
		curl_close($fd);
	}
} else {
	return -1;
}
?>