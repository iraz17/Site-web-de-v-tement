<?php
require_once("inc/init.inc.php");
//--------------------------------- PHP TREATMENT ---------------------------------//
if(!membreConnecte()) 
{
	header("location:connexion.php");
}
$header .= '<p class="text-center spacer-bt">Bonjour <strong>' . $_SESSION['membre']['pseudo'].',' . '</strong></p>';
$contenu .= '<div class=""><h2> Voici vos informations de profil </h2>';
$contenu .= '<p class="d-flex justify-content-center mt-20"> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br /><br />';

	
//--------------------------------- DISPLAY HTML ---------------------------------//
require_once("inc/header.inc.php");?>

<h1><?php echo $header;?></h1>
<div class="row no-gutters">
  <div class="col-6 col-md-4">
    <nav id="db-docs-nav" class="collapse bd-links">
      <div class="bd-toc-item">
        <a class="bd-toc-link" href="">Votre profil personnel</a>
      </div>
    </nav>
  </div>
  <div class="col-12 col-sm-6 col-md-8"><?php echo $contenu;?></div>
</div>

<?phprequire_once("inc/footer.inc.php");?>