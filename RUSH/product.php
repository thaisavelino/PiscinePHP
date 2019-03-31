<?php
function check_prod($data)
{
	$check = 0;
	$cat = $_GET['cat'];
	foreach ($data[$cat] as $key => $el)
		if($key === $_GET['prod'])
			$check = 1;
	return($check === 1 ? TRUE : FALSE);
}
function show_product($data)
{	
	$cat = $_GET['cat'];
	$prod = $_GET['prod'];
	foreach ($data[$cat] as $key => $el)
	{
		if($key != "img")
		{
            echo "<figure class=\"left cold\"><img class='img' src='" . $el['img'] . "' 
            alt=\'" . $key . 
            " title='" . $key.
		"'/>
		<span class=\"price\">" . $el[price] ."$</span>
		<input class='count' name='nb' type='number' step='1' value='0' min='1' max='10'>
		<input type='hidden' name='price' value='".$price."'>"."
		<input type='hidden' name='prod' value='".$prod."'>"."
		<input type='submit' name='submit' value='ajouter'>
		</figure>";
		}
	}
	/*if (check_prod($data) === FALSE)
	{
		echo "Injection ERROR\n";
		return ;
	}*/
	$test = $data[$cat][$prod];
	echo "<p><?php echo \"$test\" ?></p>";
}
?>