<?php
session_start();
$page = 'index.php';

include_once 'includes/header.php';
include_once 'includes/navbar.php';
?>

<!-- INDEX PAGE -->
<div id="indexBanner" aria-roledescription="banner" aria-label="Bannière avec une photo de Versailles">
    <img id="imgBanner" src="./assets/img/parc_piece_deau_02.jpg" width="100%">
</div>
<main id="mainBody">
    <h1 id="h1">SORTIR A VERSAILLES</h1>
    <h2 class="titleMiddle">Sortir à Versailles, bars, restaurants, boulangeries.</h2>

    <section>
        <div id="containerNotification" role="alert">
            <span id="iconNotification"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16" aria-label="icone d'alerte">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg></span>
            <span id="contentNotification">
                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni
                dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit
                amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et
                dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                Quis autem vel eum iure reprehenderit, qui in ea oluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla
                pariatur?
            </span>
        </div>
    </section>
    <section id="containerMainRubrics">
        <a href="categoryPage.php?name=Bars" class="figureMainRubricsLink" aria-label="lien vers la catégorie Bars">
            <figure class="figureMainRubrics" aria-label="carte de la rubrique Bars">
                <h2 class="titleMiddle">Bars</h2>
                <div class="figureImgContainer">
                    <img class="imgMainRubrics" src="./assets/img/bar_cbl_01.jpg" alt="Photo d'un bar à Versailles">
                </div>
                <figcaption class="figcaptionMainRubrics">
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou sur le bouton pour les découvrir</p>
                </figcaption>
                <div class="btn figcaptionBtn">Cliquez</div>
            </figure>
        </a>
        <a href="categoryPage.php?name=Restaurants" class="figureMainRubricsLink" aria-label="lien vers la catégorie Restaurants">
            <figure class="figureMainRubrics" aria-label="carte de la rubrique Restaurants">
                <h2 class="titleMiddle">Restaurants</h2>
                <div class="figureImgContainer">
                    <img class="imgMainRubrics" src="./assets/img/restaurant_bistro_du_11_01.jpg" alt="Photo d'un restaurant à Versailles">
                </div>
                <figcaption class="figcaptionMainRubrics">
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou su le bouton pour les découvrir</p>
                </figcaption>
                <div class="btn figcaptionBtn">Cliquez</div>
            </figure>
        </a>
        <a href="categoryPage.php?name=Boulangeries" class="figureMainRubricsLink" aria-label="lien vers la catégorie Boulangeries">
            <figure class="figureMainRubrics" aria-label="carte de la rubrique Boulangeries">
                <h2 class="titleMiddle">Boulangeries</h2>
                <div class="figureImgContainer">
                    <img class="imgMainRubrics" src="./assets/img/boulangerie_au_chant_du_coq_02.jpg" alt="Photo d'une boulangerie à Versailles">
                </div>
                <figcaption class="figcaptionMainRubrics">
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou su le bouton pour les découvrir</p>
                </figcaption>
                <div class="btn figcaptionBtn">Cliquez</div>
            </figure>
        </a>
    </section>
</main>
<section class="sectionParcs">
    <h2 class="titleMiddle">Parcs</h2>
    <div id="carouselExampleCaptions" class="carousel slide" aria-roledescription="carousel" aria-label="carousel parcs Versailles" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner carouselWrapper">
            <div class="carousel-item carouselItem active">
                <img src="assets/img/parc_domaine_elisabeth_02.jpg" class="d-block w-75 sliderImg" alt="Photo du parc à Versailles">
                <div class="carousel-caption carouselCaptionContainer d-none d-md-block">
                    <h5 class="titleSmall carouselTitle">First slide labelF</h5>
                    <p class="carouselText">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item carouselItem">
                <img src="assets/img/par_domaine_elisabeth_01.jpg" class="d-block w-75 sliderImg" alt="Photo du parc à Versailles">
                <div class="carousel-caption carouselCaptionContainer d-none d-md-block">
                    <h5 class="titleSmall carouselTitle">Second slide label</h5>
                    <p class="carouselText">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item carouselItem">
                <img src="assets/img/parc_balbi_01.jpg" class="d-block w-75 sliderImg" alt="Photo du parc à Versailles">
                <div class="carousel-caption carouselCaptionContainer d-none d-md-block">
                    <h5 class="titleSmall carouselTitle">Third slide label</h5>
                    <p class="carouselText">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item carouselItem">
                <img src="assets/img/parc_balbi_02.jpg" class="d-block w-75 sliderImg" alt="Photo du parc à Versailles">
                <div class="carousel-caption carouselCaptionContainer d-none d-md-block">
                    <h5 class="titleSmall carouselTitle">Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev carouselArrow" type="button" aria-label="flèche directionnelle précédent slide" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next carouselArrow" type="button" aria-label="flèche directionnelle précédent slide" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<?php include 'includes/footer.php' ?>