<?php
//--------- DATABASE CONNECTION
$mysqli = new mysqli("localhost", "root", "Njibhu123,", "site");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");

//--------- SESSION
session_start();

//--------- PATH
define("RACINE_SITE", "/site/");

//--------- VARIABLES
$contenu = '';

//--------- OTHER INCLUSIONS
require_once("fonction.inc.php");
