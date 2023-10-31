<?php require_once("inc/header.inc.php"); ?>
<?php echo $contenu; ?>
 
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br> <br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="text" id="mdp" name="mdp"><br><br>
 
     <input type="submit" value="Se connecter">
</form>
 
<?php require_once("inc/footer.inc.php"); ?>