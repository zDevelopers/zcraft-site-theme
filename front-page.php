<?php get_header(); ?>

    <div class="homepage-header">
        <div class="container">
            <div class="homepage-header-caption">
                <h1>Bienvenue sur Zcraft</h1>
                <p>
                    Le serveur communautaire semi-RP francophone.<br />
                    Nos valeurs : respect, partage, maturité, et… humour !
                </p>
                <p>
                    Accès libre sur simple candidature.
                </p>
            </div>

            <div class="homepage-online">
                <div class="minecraft-dirt-large-area text-center">
                    <div class="online-title">
                        <div class="online-status">
                            <span id="zcraft-online-count" aria-hidden="true" style="display: none;"></span>
                            <span id="zcraft-online-offline" aria-hidden="true" style="display: none;">Hors-ligne</span>

                            <span id="zcraft-online-status" class="online-status-dot unknown"></span>
                        </div>
                        <div class="online-ip">zcraft.fr</div>
                    </div>
                    <ul id="zcraft-online-list" class="online-list clearfix" style="display: none;"></ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container big-presentation">

        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/accueil-banque.png" alt="La banque" width="140" height="140">
                <h2>Partage et entraide</h2>
                <p>Sur Zcraft, on partage ce qu'on a de meilleur : nos talents, notre temps, nos ressources. Les projets se font dans la confiance, le grief est quasi-inexistant.</p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/Hotel-de-ville-Nouvéa.jpg" alt="Un serveur solide" width="140" height="140">
                <h2>Près de six ans</h2>
                <p>Un des serveurs les plus pérennes de la galaxie Minecraft, avec une équipe stable d'administrateurs dévoués.</p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/accueil-IRL.jpg" alt="Des IRLs" width="140" height="140">
                <h2>Des rencontres IRL !</h2>
                <p>Zcraft c'est plus qu'un serveur : de joueurs, on devient potes. Des rencontres réelles ont lieu régulièrement.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/accueil-grammar-nazi.jpg" alt="Un soupçon de grammar nazisme" width="140" height="140">
                <h2>Respect et français</h2>
                <p>Sur Zcraft, pas de liste blanche : un processus simple mais efficace pour évaluer les candidatures. Résultat : des membres de qualité, qui savent s'exprimer, collaborer et se respecter.</p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/accueil-imageonmap.jpg" alt="Le terroir" width="140" height="140">
                <h2>Des produits du terroir</h2>
                <p>De nombreux zcraftiens mettent leurs talents au service de la cause minecraftienne ! Constructeurs, développeurs, animateurs enrichissent le jeu de l'intérieur avec des plugins et autres constructions réalisées spécialement pour le serveur.</p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo get_template_directory_uri()?>/img/accueil-bblocks.png" alt="Proche de l'original" width="140" height="140">
                <h2>Un jeu qui colle à l'original</h2>
                <p>Sur Zcraft, on aime construire à la sueur de notre front, tout en récoltant des ressources à la dure et en évitant les monstres : survival saupoudré de RP, c'est comme ça qu'on s'amuse !<br />Coller à l'original ne nous empêche cela dit pas de l'enrichir de diverses manières.</p>
            </div>
        </div>


        <hr class="featurette-divider">

        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading">Zcraft ? Une grande famille !</h2>
                <p class="lead">
                    Qui tourne depuis le 20 octobre 2010 dans une très belle ambiance amicale.<br />
                    Nous encourageons la <strong>communication</strong> entre nos joueurs et le <strong>partage</strong> des ressources.
                </p>
                <p class="lead"><strong>Nous ne vendons rien</strong>, Zcraft est 100% gratuit. Aucun privilège ne peut être obtenu par paiement.</p>
                <p class="lead">Nous recrutons <strong>uniquement sur candidature</strong>.</p>
            </div>
            <div class="col-md-5 thumbnail">
                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri()?>/img/accueil-tentacles.png" alt="" />
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row">
            <div class="col-md-7 col-md-push-5">
                <h2 class="featurette-heading">Un jeu essentiellement en survie. <span class="text-muted">Saupoudré de RP.</span></h2>
                <p class="lead">Le jeu, en survie, se déroule <strong>dans une ambiance semi-<em>role-play</em> communautaire</strong>.</p>
                <p class="lead">La plupart des ressources sont <strong>mises en commun</strong> dans une banque commune, et les projets de construction collective sont fréquents.</p>
                <p class="lead">Une <a href="#">équipe motivée et sympathique</a> administre, modère et coordonne.</p>
            </div>
            <div class="col-md-5 col-md-pull-7 thumbnail">
                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri()?>/img/accueil-evt-vehsyhss.png" alt="" />
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading">Proche de l'original... <span class="text-muted">sans s'y limiter.</span></h2>
                <p class="lead">Nous tâchons de coller au maximum à l’esprit du jeu original (<a href="#">voir la liste des plugins actifs</a>), mais nous l'enrichissons également de manière cohérente.</p>
                <p class="lead"><a href="#">Notre monde</a>, vieux de plusieurs années, regorge de surprises.</p>
                <p class="lead">Et si tu prèfères l’image aux mots, <a href="#">tu peux regarder quelques vidéos sur notre serveur</a>.</p>
            </div>
            <div class="col-md-5 thumbnail">
                <img class="img-responsive center-block" src="<?php echo get_template_directory_uri()?>/img/accueil-elytres.png" alt="" />
            </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row">
            <div class="col-md-12">
                <p class="lead text-center">Zcraft s’adresse à un public plutôt adulte. Son accès est donc <strong>déconseillé aux moins de 15 ans</strong>.</p>
            </div>
        </div>

        <hr class="featurette-divider" />

        <h2 class="featurette-heading text-center" id="rejoindre">Intéressé ?</h2>
        <p class="lead text-center">Tout le monde peut visiter le serveur en se connectant à</p>
        <p class="minecraft-dirt-large-area zcraft-ip text-center">zcraft.fr</p>
        <p class="text-center">(Minecraft 1.9.2)</p>
        <p class="lead text-center">Pour contribuer, nous demandons aux membres de faire <a href="#">une candidature sur notre forum</a>.</p>
    </div>

<?php get_footer(); ?>