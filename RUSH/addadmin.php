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
			echo "<p class=\"welcome\">Un arc en ciel de couleur pour toi, ".$_SESSION['loggued_on_user']." </p>";
			echo '<form method="post" action="logout.php">
					<input class="disconnect" type="submit" name="logout" value="Se deconnecter"/>
				</form>';
		}
		?>
		<div class"gobasket">
			<span>
				<a href="panier.php">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
					<g><g><g><path d="M786.2,405.9c1.3-7.8-0.7-15.4-5.9-22.5c-5.2-6.5-12.1-10.5-20.6-11.8l-394.9-44.1l-4.9-48c-0.7-5.9-2.9-11.3-6.9-16.2s-8.5-8-13.7-9.3l-87.2-27.4c-7.8-2.6-15.4-2-22.5,2c-7.2,3.9-12.1,9.8-14.7,17.6c-2.6,7.8-2,15.4,2,22.5c3.9,7.2,9.8,12.1,17.6,14.7L302,305l24.5,241.1l-15.7,86.2c-0.7,3.9-0.5,8,0.5,12.2c1,4.2,3.1,8,6.4,11.3c5.9,7.2,13.4,10.8,22.5,10.8h368.5c8.5,0,15.7-2.8,21.6-8.3c5.9-5.6,8.8-12.6,8.8-21.1c0-8.5-2.9-15.5-8.8-21.1c-5.9-5.6-13.1-8.3-21.6-8.3H375.5l6.9-39.2h350.8c7.2,0,13.4-2.3,18.6-6.9c5.2-4.6,8.5-10.4,9.8-17.6L786.2,405.9z M654.8,775.4c13.1,0,24-4.4,32.8-13.2c8.8-8.8,13.2-19.8,13.2-32.8s-4.4-24-13.2-32.8c-8.8-8.8-19.8-13.2-32.8-13.2s-23.9,4.4-32.3,13.2c-8.5,8.8-12.7,19.8-12.7,32.8s4.2,24,12.7,32.8C631,771,641.8,775.4,654.8,775.4z M385.3,775.4c13.1,0,24-4.4,32.8-13.2c8.8-8.8,13.2-19.8,13.2-32.8s-4.4-24-13.2-32.8c-8.8-8.8-19.8-13.2-32.8-13.2s-24,4.4-32.8,13.2c-8.8,8.8-13.2,19.8-13.2,32.8s4.4,24,13.2,32.8C361.3,771,372.3,775.4,385.3,775.4z M500,10c67.3,0,130.8,12.9,190.6,38.7c59.8,25.8,111.7,60.8,155.8,104.9c44.1,44.1,79.1,96,104.9,155.8C977.1,369.2,990,432.7,990,500c0,45.1-5.9,88.5-17.6,130.3c-11.8,41.8-28.3,80.8-49.5,117.1c-21.2,36.3-46.7,69.3-76.4,99c-29.7,29.7-62.7,55.2-99,76.4c-36.3,21.2-75.3,37.7-117.1,49.5C588.5,984.1,545.1,990,500,990s-88.5-5.9-130.3-17.6c-41.8-11.8-80.9-28.3-117.1-49.5c-36.3-21.2-69.3-46.7-99-76.4c-29.7-29.7-55.2-62.7-76.4-99c-21.2-36.3-37.7-75.3-49.5-117.1C15.9,588.5,10,545.1,10,500s5.9-88.5,17.6-130.3c11.8-41.8,28.3-80.9,49.5-117.1c21.2-36.3,46.7-69.3,76.4-99c29.7-29.7,62.7-55.2,99-76.4c36.3-21.2,75.3-37.7,117.1-49.5C411.5,15.9,454.9,10,500,10z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
					</svg>	
					Mon panier</a>
			</span>
			<p class="basket-qnt">0</p>
			<p> Prix total : 0 € </p>
		</div>
	</div>

	<!--------------------------------------
				PRODUCTS
	---------------------------------------->
	<section class="images">
	<p>test</p>
		<form method="post" action="delete_usr.php" style="margin: 20px" >
				<h2>Delete user?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
			<input type="submit" name="submit" value="Supprimer" />
		</form>
		<form method="post" action="delete_usr.php" style="margin: 20px" >
				<h2>ADD user?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
			<input type="submit" name="submit" value="Supprimer" />
		</form>
		<form method="post" action="delete_usr.php" style="margin: 20px" >
				<h2>Delete Product?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
			<input type="submit" name="submit" value="Supprimer" />
		</form>
		<form method="post" action="delete_usr.php" style="margin: 20px" >
				<h2>ADD Product?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
			<input type="submit" name="submit" value="Supprimer" />
		</form>
	</section>
</body>
</html>