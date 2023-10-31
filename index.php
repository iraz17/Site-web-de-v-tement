<?php
require_once("inc/init.inc.php");

require_once("inc/header.inc.php");
?>

<article class="jumbotron  text-center">
    <div class="container">
        <h1 class="jumbotron-heading">SOLDES D'ÉTÉ DERNIÈRE DÉMARQUE</h1>
        <a href="boutique.php"><p type= "button" class="btn bg-warning lead mb-0">Jusqu'à -50% </p></a>
        
    </div>
    <div id="like_button_container"></div>
</article>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img class="d-block w-80" src="./photo/trail.jpg" width="100%" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-80" src="./photo/prendre-soin-cuir-printemps.jpg" width="100%" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-80" src="./photo/dylanlefebvre.jpg" width="100%" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header bg-warning text-white text-uppercase">
                    <i class="fa fa-heart"></i> Top product
                </div>
                <img class="img-fluid border-0" src="./photo/adidas_vert.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-center"><a href="product.html" title="View Product">Tshirt adidas</a></h4>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-secondary btn-block">29.00 €</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header bg-warning text-white text-uppercase">
                    <i class="fa fa-star"></i> Nouveauté
                </div>
                <img class="img-fluid border-0" src="./photo/t-shirt-jaime-le-velo-en-ete-blanc.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-center"><a href="product.html" title="View Product">Tshirt Tendance Été</a></h4>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-secondary btn-block">19.99 €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex row sect">
        <h3 >Homme - Femme</h3>
        <div class="d-flex justify-content-end">
            <p>Venez découvrir les dernières paires en tendance cette été. exclusivement dans notre boutique !</p>
        </div>
    </div>
    <div class="d-flex row sect">
        <h3 >Découvrez notre boutique</h3>
        <div class="d-flex justify-content-end">
            <p>Un choit sur plusieurs dizaine de produit en stock à la mode !</p>
        </div>
    </div>
    <div class="m-lg-10">
        <p>Vous pouvez aussi nous trouver à cette adresse !</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92937.07443537837!2d5.3068259887631!3d43.28738276220559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c4846d4d37%3A0x18c24abab4cbd213!2sEurope!5e0!3m2!1sfr!2sfr!4v1659963199278!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
</div>
            
<?php


require_once("inc/footer.inc.php");
