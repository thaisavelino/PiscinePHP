<?php
	// CHECK login and ADD products div.
	session_start();
	include("product.php");
	if($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] == "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
//	include("products.php");

?>
<html>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Site</title>
	 	 <link rel="stylesheet" type="text/css" href="css.css">
  	</head>
<body>
<!--------------------------------------
				MENU - TOP
---------------------------------------->
<header><a class="a-top" href="#" id="logo"></a>
    <nav class="nav-top">
        <a class="a-top" href="#" id="menu-icon"></a>
        <ul class="ul-top">
            <li class="li-top"><a href="<?PHP echo "?cat=all" ?>" class="current">All</a></li>
			<li class="li-top"><a href="<?PHP echo "?cat=hot" ?>"> Hot</a></li>
            <li class="li-top"><a href="<?PHP echo "?cat=cold" ?>">Cold</a></li>
            <li class="li-top"><a href="<?PHP echo "?cat=funny" ?>">Funny</a></li>
        </ul>
    </nav>
</header>

     

<div class="hold">
	<!--------------------------------------
				LOGIN - LEFT 
	---------------------------------------->
	
	<div class="menu-left">

		<?php 
		if($_SESSION['loggued_on_user'] === "" || !($_SESSION['loggued_on_user']))
		{
			echo'<form method="post" action="login.php" style="margin: 20px" >
				<h2>Déjà client ?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
		
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd"/>
			<input type="submit" name="submit" value="Je me connecte" />
			</form>
			<form method="post" action="addusr.php" style="margin: 20px">
				<h2>Pas encore client ? </h>
				<h3>Inscrivez-vous!</h3>
			
			<label for="login">Identifiant: </label><input type="text" name="login" required/>
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd" required/>
			<input type="submit" name="submit" value="Je m\'inscris"/>
			</form>'; 
		}
		else
		{
			echo "<p class=\"welcome\">Page administrative, bienvenue, ".$_SESSION['loggued_on_user']." </p>";
			echo '<form method="post" action="logout.php">
					<input class="disconnect" type="submit" name="logout" value="Se deconnecter"/>
				</form>';
		}
		?>
	</div>

	<!--------------------------------------
				PRODUCTS
	---------------------------------------->
	<section class="images">
		<div class="adm">
			<form method="post" action="delete_usr.php" style="margin: 20px" >
				<h2>Delete user ?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
			<input type="submit" name="submit" value="Supprimer" />
			</form>
		</div>
		</form>
	</section>
</body>
</html>