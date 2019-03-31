<?php
	// CHECK login and ADD products div.
    session_start();
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
            <li class="li-top"><a href="#" class="current">All</a></li>
            <li class="li-top"><a href="#">Cold</a></li>
            <li class="li-top"><a href="#">Hot</a></li>
            <li class="li-top"><a href="#">Funny</a></li>
        </ul>
    </nav>
</header>
        

<div class="hold">
	<!--------------------------------------
				LOGIN - LEFT 
	---------------------------------------->
	<div class="menu-left">

		<form method="post" action="connexion.php" style="margin: 20px" >
			<h2>Déjà client ?</h2>
			<label for="login">Identifiant: </label><input type="text" name="login" />
		
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd"/>
			<input type="submit" name="submit" value="Je me connecte" />
		</form>
		<form method="post" action="creation.php" style="margin: 20px">
			<h3>Pas encore client ? </h3>
			<h3>Inscrivez-vous!</h3>
			
			<label for="login">Identifiant: </label><input type="text" name="login" required/>
			Adresse mail : <input type="text" name="mail" required/>
			<label for="passwd">Mot de passe: </label><input type="password" name="passwd" required/>
			<input type="submit" name="submit" value="Je m'inscris"/>
		</form>
		<div class"go-basket">
			<span><a href="panier.php">Accéder à mon panier</a></span>
			<p class="basket-qnt">0</p>
			<p> Prix total : 0 € </p>
		</div>
	</div>

	<!--------------------------------------
				PRODUCTS
	---------------------------------------->
	<section class="images">
	<h1>Our Colors</h1>
		<figure class="left cold">
			<img class="img" src="/img/cold-1.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left cold">
			<img class="img" src="/img/cold-2.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left cold">
			<img class="img" src="/img/cold-3.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left cold">
			<img class="img" src="/img/cold-4.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left hot">
			<img class="img" src="/img/hot-1.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left hot">
			<img class="img" src="/img/hot-2.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left funny">
			<img class="img" src="/img/funny-1.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
		<figure class="left funny">
			<img class="img" src="/img/funny-2.jpeg" alt="A cold color">
			<span id="cold-2">$ 2.50</span>
			<select class="select-more" id="#">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<input class="bt-add" type="submit" name="add-basket" value="ADD">
		</figure>
	</section>
	<!--------------------------------------------------------------------------->
</body>
</html>