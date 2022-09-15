<?php

?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- INDEX PAGE -->
<div id=indexBanner>
    <img id="imgBanner" src="./assets/img/versailles1.jpg">
</div>
    <main id="mainBody">
        <h1 id="h1">SORTIR A VERSAILLES</h1>
        <section>
            <div id="containerNotification">
                <span id="iconNotification"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg></span>
                <span id="contentNotification">
                    <p>"Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                        aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                        Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni
                        dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit
                        amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et
                        dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
                    <p>Quis autem vel eum iure reprehenderit, qui in ea oluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla
                        pariatur?</p>
                </span>
            </div>
        </section>
        <div id="containerMainRubrics">
            <figure class="figureMainRubrics">
                <h2>Bars</h2>
                <img class="imgMainRubrics" src="./assets/img/restoVersailles1.jpg">
                <figcaption class="figcaptionMainRubrics">
                    <h2>Plus d'infos</h2>
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou sur le bouton pour les découvrir</p>
                    <button>Cliquez</button>
                </figcaption>
            </figure>
            <figure class="figureMainRubrics">
                <h2>Restaurants</h2>
                <img class="imgMainRubrics" src="./assets/img/restoVersailles1.jpg">
                <figcaption class="figcaptionMainRubrics">
                    <h2>Plus d'infos</h2>
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou su le bouton pour les découvrir</p>
                    <button>Cliquez</button>
                </figcaption>
            </figure>
            <figure class="figureMainRubrics">
                <h2>Boulangeries</h2>
                <img class="imgMainRubrics" src="./assets/img/restoVersailles1.jpg">
                <figcaption class="figcaptionMainRubrics">
                    <h2>Plus d'infos</h2>
                    <p>Plusieurs supers bars à Versailles</p>
                    <p>Cliquez sur l'image ou su le bouton pour les découvrir</p>
                    <button>Cliquez</button>
                </figcaption>
            </figure>
        </div>
        </section>
        <section>
            <h2 id="titleParcs">Parcs</h2>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/parc1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide labelF</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/parc2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/parc3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/parc4.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section>
            <h2 id="titleAmis">Les recommandations des Amis de Versailles</h2>
            <div class="artFriendsOfTown"></div>
        </section>
        <!--Essai sur JS -->
        <div id="articlesList"></div>
    </main>


    <?php include 'includes/footer.php' ?>