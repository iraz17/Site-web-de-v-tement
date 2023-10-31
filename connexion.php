<?php
require_once("inc/init.inc.php");
//--------------------------------- PHP treatments login form---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") 
{
	session_destroy(); 
}
if(membreConnecte()) 
{
	header("location:profil.php");
}
if($_POST)
{
  // debug($_POST);
    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    // debug($_POST);
    if($resultat->num_rows != 0)
    {  //research username and password association 
      $membre = $resultat->fetch_assoc();
        
        if($membre['mdp'] == $_POST['mdp'])
        {
          // $hash = $membre['mdp'];
          // password_verify($_POST['mdp'], $hash);
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element; 
                }
            }
            // if connected redirection profile page
            header("location:profil.php"); 
        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
//--------------------------------- DISPLAY HTML ---------------------------------//
?>
<?php require_once("inc/header.inc.php"); ?>
<?php echo $contenu; ?>
 

<!-- bootstrap login form-->

<div class="d-flex justify-content-center spacer-bt spacer-tp">
  
  <form method="post" action="" class="row g-3 spacer-bt">
    <legend> Connexion</legend>
      <div class="col-md-4">
          <label for="pseudo" class="form-label">Pseudo</label>
          <div class="input-group">
          <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="inputGroupPrepend2">
          </div>
      </div>
      
      <div class="col-md-4">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp" aria-describedby="inputGroupPrepend2">
      </div>
      
      <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
        <label class="form-check-label" for="invalidCheck2">
          Agree to terms and conditions
        </label>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-warning" type="submit" value="Se connecter">Se connecter</button>
      <a href="">mot de passe oublié ?</a>
    </div>
    <div>
      <p> Pas de compte ? <a href="/inscription.php">s'inscrire</a></p>
    </div>
  </form>
</div>



 
<?php require_once("inc/footer.inc.php"); ?>