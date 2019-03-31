<?php
if($_POST['submit'] != "OK" || $_POST['login'] != "root" || $_POST['passwd'] == "")
{
	echo "ERROR : Name must be root and password not empty\n";
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
				echo "ERROR\n";
				return ;
			}
		}
	}
	$top_user[] = $user;
	file_put_contents("./data/passwd", serialize($top_user));
	//header("Location: index.php");
}
?>

<?php
function create_product($name, $new_price, $url_img)
{
    $data['$name'] => array("price" => "$new_price", "img" => "$url_img");
}
if($_POST['submit'] != "OK" || $_POST['login'] != "root" || $_POST['passwd'] == "")
{
	echo "ERROR : Name must be root and password not empty\n";
}
else
{
	array_push($all, array("price" => "25.50", "img" => "./img/cold-1.jpeg"))
	file_put_contents("./data/product");
	header("Location: adminpage.php");
}
?>0