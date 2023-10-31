<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>VetAttitude</title>
	


	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">



	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="/inc/css/style.css" >
	<!-- <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>/inc/css/style_connect.css" /> -->
</head>

<body>
	<header>
		<!-- responsive menu bootstrap -->
		<nav class="navbar navbar-expand-md navbar-light">
			<div class="container">
				<a class="navbar-brand" href="/index.php">VetAttitude</a>

				<!-- line burger menu-->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">


				<?php
				if (AdminConnecte()) // admin
				{ ?>

					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav m-auto">
							<li class="nav-item ">
								<a class="nav-link" href="/admin/gestion_membre.php">Gestion membres</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/admin/gestion_commande.php">Gestion commandes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/admin/gestion_boutique.php">Gestion boutique</a>
						</ul>
					</div>
				<?php

				}
				if (membreConnecte()) { ?>

					<!-- member & admin menu -->
						<ul class="navbar-nav m-auto">
							<li class="nav-item ">
								<a class="nav-link" href="/profil.php">Voir mon profil</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/boutique.php">Accès à la boutique</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/connexion.php?action=deconnexion">Se déconnecter</a>
							</li>
						</ul>
						<form class="form-inline my-2 my-lg-0">
						<div class="input-group input-group-sm">
							<input type="text" class="form-control" placeholder="Search...">
							<div class="input-group-append">
								<button type="button" class="btn btn-secondary btn-number">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
						<a class="btn btn-warning btn-sm ml-3" href="panier.php">
							<i class="fa fa-shopping-cart text-light"></i>Panier
							<span class="badge badge-dark"> 0 </span>
						</a>
					</form>

					</div>
				<?php

				} else {
				?>

					<!-- visitor menu -->

					<ul class="navbar-nav m-auto">
						<li class="nav-item active">
							<a class="nav-link" href="/boutique.php">Boutique <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contact.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/inscription.php">Inscription</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/connexion.php">connexion</a>
						</li>
					</ul>

					<form class="form-inline my-2 my-lg-0">
						<div class="input-group input-group-sm">
							<input type="text" class="form-control" placeholder="Search...">
							<div class="input-group-append">
								<button type="button" class="btn btn-secondary btn-number">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</nav>


	<?php
				}
	?>
	
	</header>
	<section>
		<div class="conteneur">