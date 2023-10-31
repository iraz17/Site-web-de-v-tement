<?php
require_once("inc/init.inc.php");
if ($_POST) {
	debug($_POST);
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
	if (!$verif_caractere || strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20) {
		$contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
	}
	if (empty($contenu)) {
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
		if ($membre->num_rows > 0) {
			$contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
		} else {
      $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
      // $_POST['mdp'] = md5($_POST['mdp']);
			foreach ($_POST as $indice => $valeur) {
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
			executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
			$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
		}
	}
}
?>
<?php require_once("inc/header.inc.php"); ?>
<?php echo $contenu; ?>



<!-- bootstrap subscribe -->
<div class="d-flex justify-content-center spacer-bt spacer-tp">
  <form method="post" action="" class="row g-3 spacer-bt">
    <legend> S'inscrire </legend>
    <div class="col-md-4">
      <label for="validationServer01" class="form-label">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" id="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required">
      
    </div>
    <div class="col-md-4">
      <label for="validationServer02" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="mdp" name="mdp"  required="required">
      
    </div>
    <div class="col-md-4">
      <label for="validationServer02" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom" required="required">
      
    </div>
    <div class="col-md-4">
      <label for="validationServer02" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prénom" required="required">
      
    </div>
    <div class="col-md-4">
    
      <label for="validationServerUsername" class="form-label">Email</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend3">@</span>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="nom" placeholder="exemple@gmail.com">
        <div id="validationServerUsernameFeedback" class="valid-feedback">
          Looks good!
        </div>
      </div>
    </div>
    <div class="form-check col-md-3">
    <label for="civilite">Civilité</label><br><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <div class="invalid-feedback">More example invalid feedback text</div>
    <input name="civilite" value="f" type="radio">Femme<br><br>
    <div class="invalid-feedback">More example invalid feedback text</div>
  </div>

    <div class="col-md-6">
      <label for="validationServer03" class="form-label">Ville</label>
      <input type="text" class="form-control" id="ville" name="ville" aria-describedby="validationServer03Feedback" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_.">
      <div id="validationServer03Feedback" class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationServer05" class="form-label">Code postal</label>
      <input type="text" class="form-control" id="code_postal" name="code_postal" aria-describedby="validationServer05Feedback" required>
      <div id="validationServer05Feedback" class="valid-feedback">
        
      </div>
    </div>
    <div class="col-md-4">
      <label for="validationServer02" class="form-label">Adresse</label>
      <input type="textarea" class="form-control" id="adresse" name="adresse" name="prenom" placeholder="votre adresse" required="required">
      
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
        <label class="form-check-label" for="invalidCheck3">
          Agree to terms and conditions
        </label>
        <div id="invalidCheck3Feedback" class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-warning" name="inscription" value="Sinscrire" type="submit">S'inscrire</button>
    </div>
    <div>
      <p> Déja un compte ? <a href="/connexion.php">se connecter</a></p>
    </div>
  </form>
</div>
<?php require_once("inc/footer.inc.php"); ?>