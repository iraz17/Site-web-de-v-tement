<?php
require_once("inc/init.inc.php");

require_once("inc/header.inc.php");

//--------------------------------- PHP TREATMENTS ---------------------------------//
//--- ADD BASKET ---//
if(isset($_POST['ajout_panier'])) 
{	// debug($_POST);
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit='$_POST[id_produit]'");
	$produit = $resultat->fetch_assoc();
	ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'],$_POST['quantite'],$produit['prix']);
}
//--- EMPTY BASKET ---//
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
	unset($_SESSION['panier']);
}
//--- PAYMENT ---//
if(isset($_POST['payer']))
{
	for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++) 
	{
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]);
		$produit = $resultat->fetch_assoc();
		if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
		{
			$contenu .= '<hr /><div class="erreur">Stock Restant: ' . $produit['stock'] . '</div>';
			$contenu .= '<div class="erreur">Quantité demandée: ' . $_SESSION['panier']['quantite'][$i] . '</div>';
			if($produit['stock'] > 0)
			{
				$contenu .= '<div class="erreur">la quantité de l\'produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats.</div>';
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
			}
			else
			{
				$contenu .= '<div class="erreur">l\'produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats.</div>';
				retirerproduitDuPanier($_SESSION['panier']['id_produit'][$i]);
				$i--;
			}
			$erreur = true;
		}
	}
	if(!isset($erreur))
	{
		executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (" . $_SESSION['membre']['id_membre'] . "," . montantTotal() . ", NOW())");
		$id_commande = $mysqli->insert_id;
		for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
		{
			executeRequete("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES ($id_commande, " . $_SESSION['panier']['id_produit'][$i] . "," . $_SESSION['panier']['quantite'][$i] . "," . $_SESSION['panier']['prix'][$i] . ")");
		}
		unset($_SESSION['panier']);
		mail($_SESSION['membre']['email'], "confirmation de la commande", "Merci votre n° de suivi est le $id_commande", "From:vendeur@dp_site.com");
		$contenu .= "<div class='validation'>Merci pour votre commande. votre n° de suivi est le $id_commande</div>";
	}
}

//--------------------------------- DISPLAY HTML ---------------------------------//
?>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th scope="col" class="text-center">Titre</th>
                            <th scope="col" class="text-center">Référence Produit</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-center">Prix</th>
                            
                        </tr>
                    </thead>

                    <tbody>
<?php

if(empty($_SESSION['panier']['id_produit'])) // empty basket
{
	echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else
{
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
	{
		
        echo "<tr>";
		echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
        echo "</tr>";
	}
	echo "<tr><th scope='col' class='text-end' colspan='3' >Total</th><td colspan='2'>" . montantTotal() . " euros</td></tr>";
	if(membreConnecte()) 
	{
		echo '<form method="post" action="">';
		echo '<tr><td colspan="5"><input type="submit" name="payer" value="Valider et déclarer le paiement" /></td></tr>';
		echo '</form>';	
	}
	else 
	{
		echo '<tr><td colspan="3">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir payer</td></tr>';
	}
	echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
}

?>
            </div>
        </div>
    </table>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
				<a class="btn btn-block btn-info" href="boutique.php" role="button">Continue shopping</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
</tbody>
<?php
echo "</table><br />";
echo "<i>Règlement par CHEQUE uniquement à l'adresse suivante : 13 rue de lodi 13005 Marseille</i><br />";

require_once("inc/footer.inc.php"); ?>