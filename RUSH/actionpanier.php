<?php

session_start();
function add($nom_produit,$qteProduit,$prix_Produit)
{
	$select = array(nom_produit => $nom_produit, qte => $qteProduit, prix_produit => ($qteProduit*$prix_Produit));
	if (isset($_SESSION[panier]))
	{
	foreach ($_SESSION[panier] as $key => $elem)
	{	
		if ($elem[nom_produit] === $nom_produit)
		{
			$_SESSION[panier][$key][qte] = $elem[qte] + $qteProduit;
			$_SESSION[panier][$key][prix_produit] = $elem[prix_produit] + ($qteProduit*$prix_Produit);
			return;
		}	
	}
	$_SESSION[panier][] = $select;
	return;
	}
	else if (!(isset($_SESSION['panier']))){
      $_SESSION[panier][] = $select;
	  return;
   }
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	
}
?>