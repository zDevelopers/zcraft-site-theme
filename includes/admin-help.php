<?php
add_action('admin_menu', function()
{
    add_submenu_page('themes.php', 'Aide du thème Zcraft Moderne', 'Zcraft Moderne', 'read', 'zcraft-admin-help', function()
    {
        ?>
        <style type="text/css">
            .zcraft-admin {
                max-width: 1100px;
                text-align: justify;
            }

            .zcraft-admin h2, .zcraft-admin h3 {
                margin: 0;
                padding: 9px 0 4px;
                line-height: 29px;
            }

            .zcraft-admin h2 {
                font-size: 20px;
            }

            .zcraft-admin h3 {
                font-size: 18px;
                font-weight: 400;
            }

            .zcraft-admin .zcraft-admin-toc li {
                margin-bottom: 0;
            }

            .zcraft-admin ul {
                list-style-type: disc;
                margin: 1.5em 0 1.5em 2em;
            }
            .zcraft-admin ul li {
                padding-left: .8em;
            }

            .zcraft-admin dl dt {
                margin-bottom: .4em;
            }
            .zcraft-admin dl dd {
                margin-bottom: 2.5em;
            }

            .zcraft-admin .illustration {
                display: block;
                float: right;
                max-width: 200px;
                margin-left: 1em;

                position: relative;
                top: -2px;
            }

            .zcraft-admin .illustration img {
                max-width: 100%;
            }

            .zcraft-admin figure {
                text-align: center;
                font-style: italic;
            }

            .zcraft-admin dl dd::after, .zcraft-admin p::after {
                display: block;
                content: " ";
                clear: both;
            }

            .zcraft-admin pre {
                background: rgba(0,0,0,.07);
                font-size: 13px;
                padding: 3px 5px 2px;
                border-radius: 4px;
            }

            @media (max-width: 1200px) {
                .zcraft-admin {
                    text-align: left;
                }
            }
        </style>
        <div class="wrap zcraft-admin">
            <h1>Zcraft Moderne — Aide &amp; référence</h1>
            <p>
                Le thème <i>Zcraft Moderne</i> procure plusieurs shortcodes et options pour paramétrer votre site et afficher proprement des contenus.<br />
                Il est pensé pour être utilisé avec une page d'accueil statique, mais libre à vous de faire autrement si vous le préférez.
            </p>

            <ol class="zcraft-admin-toc">
                <li>
                    <a href="#zcraft-help-theme">Configuration du thème, menus</a>
                    <ol>
                        <li><a href="#zcraft-help-theme-menu">Menus</a></li>
                    </ol>
                </li>
                <li>
                    <a href="#zcraft-help-home">Page d'accueil</a>
                    <ol>
                        <li><a href="#zcraft-help-home-bulles">Bulles de présentation</a></li>
                        <li><a href="#zcraft-help-home-featurettes">Featurettes</a></li>
                        <li><a href="#zcraft-help-home-big-notices">Grandes notes</a></li>
                        <li><a href="#zcraft-help-home-ip">Adresse du serveur</a></li>
                    </ol>
                </li>
                <li>
                    <a href="#zcraft-help-articles">Articles</a>
                    <ol>
                        <li>
                            <a href="#zcraft-help-articles-shortcodes">Shortcodes</a>
                            <ol>
                                <li><a href="#zcraft-help-articles-shortcodes-commands">Commandes</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-server-infos">Informations de serveur</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-images">Images</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-gallery">Galeries</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-illustration">Illustrations</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-players-list">Listes de joueurs</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-steps">Étapes à suivre</a></li>
                                <li><a href="#zcraft-help-articles-shortcodes-php">PHP</a></li>
                            </ol>
                        </li>
                        <li><a href="#zcraft-help-articles-int-su">Intégration avec Shortcodes Ultimate</a></li>
                        <li><a href="#zcraft-help-articles-int-eztoc">Intégration avec Easy Table of Contents</a></li>
                    </ol>
                </li>
            </ol>

            <h2 id="zcraft-help-theme">Configuration du thème, menus</h2>

            <p>
                <a href="customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dzcraft-admin-help">L'écran de configuration du thème</a> comporte des options
                pour personnaliser les images, en-têtes, logos, etc. Il y a également une série de zones à widgets que vous pouvez utiliser.
            </p>

            <h3 id="zcraft-help-theme-menu">Menus</h3>

            <p>
                Les menus se configurent de manière relativement classique, supportant une profondeur théoriquement infinie. Quelques options additionnelles
                permettent de profiter à fond du thème.
            </p>

            <dl>
                <dt><strong>Icônes des menus de premier niveau</strong></dt>
                <dd>
                    Pour configurer ces discrètes icônes, affichées derrière les menus de premier niveau, renseignez l'attribut de titre du menu
                    avec <a href="http://fontawesome.io/icons/">le nom d'une classe de <em>Font Awesome</em></a> (<code>fa-nom-de-l-icone</code>, par exemple
                    <code>fa-book</code>).
                </dd>
                <dt><strong>Séparateurs dans les sous-menus</strong></dt>
                <dd>
                    Pour créer un séparateur, créez un menu de type «&nbsp;Lien personnalisé&nbsp;» de second niveau, et donnez-lui le titre «&nbsp;divider&nbsp;»
                    (ni plus, ni moins). Ne renseignez pas le lien, ou mettez <code>#</code>.
                </dd>
                <dt><strong>Sous-titres dans les sous-menus</strong></dt>
                <dd>
                    Pour créer un sous-titre, créez un menu de type «&nbsp;Lien personnalisé&nbsp;» de second niveau sans renseigner de lien du tout. Si l'outil
                    d'ajout de menu refuse d'en insérer un sans lien, mettez n'importe quoi et retirez-le après (en modifiant un menu existant, on peut vider le
                    champ du lien).<br />
                    Enfin, placez les liens ayant ce sous-titre comme enfant du menu créé.
                </dd>
            </dl>

            <p>
                Vous pouvez également mettre des menus dans le pied de page, via un widget de type <em>Menu personnalisé</em>.<br />
                Ces menus peuvent voir leurs éléments réduits à une simple icône en précisant dans l'attribut de titre du menu
                <a href="http://fontawesome.io/icons/">le nom d'une classe de <em>Font Awesome</em></a> (<code>fa-nom-de-l-icone</code>, par exemple
                <code>fa-twitter</code>). Il vous faut tout de même renseigner le titre principal du menu, car ce texte sera utilisé en
                infobulle et pour les utilisateurs utilisant un lecteur d'écran.
            </p>

            <h2 id="zcraft-help-home">Page d'accueil</h2>

            <p>La page d'accueil peut contenir&nbsp;: </p>
            <ul style="list-style-type: disc; margin-left: 2em;">
                <li>
                    un titre, sous-titre, phrase d'accroche, bouton d'appel&nbsp;;
                </li>
                <li>
                    un ou plusieurs serveurs Minecraft affichés et mis à jour en temps réel (ou pour être exact, toutes les minutes sans rafraîchissement
                    de la page)&nbsp;; cette section peut être intégralement retirée si votre site ne concerne pas un serveur Minecraft&nbsp;;
                </li>
                <li>
                    des bulles de présentation pour mettre en avant les points fort de ce que vous proposez&nbsp;;
                </li>
                <li>
                    des <em>featurettes</em>, sections en pleine largeur illustrées pour mettre différemment des choses en avant&nbsp;;
                </li>
                <li>
                    de grandes notes, affichant de manière isolée une phrase ou deux en grand, centrées, avec de généreuses marges, pour préciser un point
                    important de manière bien visible&nbsp;;
                </li>
                <li>
                    un bandeau rappelant l'adresse IP du serveur et sa version (textes libres).
                </li>
            </ul>

            <p>
                Les deux premiers points se configurent graphiquement : si une page est définie comme page d'accueil statique, un formulaire d'options
                sera disponible sur la page de modification, contenant toutes les options expliquées pour configurer l'accueil.<br />
                Pour le reste, il faut utiliser des shortcodes dans le code de la page. Ils sont simple à utiliser.
            </p>

            <h3 id="zcraft-help-home-bulles">Bulles de présentation</h3>

            <dl>
                <dt><code>[zcraft_home_presentations] ... [/zcraft_home_presentations]</code></dt>
                <dd>Shortocde à mettre autour de la zone contenant les bulles de présentation.</dd>

                <dt><code>[zcraft_home_presentation image="&lt;url&gt;" title="&lt;titre de la bulle&gt;"] ... description de la bulle ... [/zcraft_home_presentation]</code></dt>
                <dd>
                    Shortcode représentant une bulle de présentation. Ils sont à mettre les uns après les autres : le positionnement est automatiquement
                    géré. Tous les attributs devraient être renseignés pour un meilleur rendu.
                </dd>
            </dl>

            <h3 id="zcraft-help-home-featurettes">Featurettes</h3>

            <dl>
                <dt><code>[zcraft_home_featurettes] ... [/zcraft_home_featurettes]</code></dt>
                <dd>Shortocde à mettre autour de la zone contenant les <em>featurettes</em>.</dd>

                <dt><code>[zcraft_home_featurette image="&lt;url&gt;" title="" subtitle=""] ... contenu de la featurette ... [/zcraft_home_featurette]</code></dt>
                <dd>
                    Shortcode représentant une <em>featurette</em>. Ils sont à mettre les uns après les autres et seront empilés.
                    Tous les attributs devraient être renseignés pour un meilleur rendu, sauf le sous-titre si vous n'en voulez pas.
                    Ce dernier s'affiche à côté du titre, de la même taille, un peu grisé.<br />
                    Une featurette est un gros bloc, le contenu peut donc s'étendre sur plusieurs lignes, en long en large, tant que
                    l'image de fond fournie est assez grande. Cette dernière devrait être assez large pour couvrir toute la largeur
                    d'un écran, et assez haute pour le texte contenu.
                </dd>
            </dl>

            <h3 id="zcraft-help-home-big-notices">Grandes notes</h3>

            <p>Par l'exemple : </p>
            <pre>[zcraft_home_big_notices]
[zcraft_home_big_notice]Texte d'une grande note. Il est possible d'en cumuler plusieurs, ou d'y mettre du HTML.[/zcraft_home_big_notice]
[/zcraft_home_big_notices]</pre>

            <h3 id="zcraft-help-home-ip">Adresse du serveur</h3>

            <p>Par l'exemple : </p>
            <pre>[zcraft_home_join_in title="Intéressé ?"]
&lt;p&gt;Tout le monde peut visiter le serveur en se connectant à l'addresse&lt;/p&gt;
[zcraft_home_join_in_ip version="Minecraft 1.11.2"]zcraft.fr[/zcraft_home_join_in_ip]
&lt;p&gt;Pour contribuer, nous demandons aux membres de faire une &lt;a href="#"&gt;candidature sur notre forum.&lt;/a&gt;&lt;/p&gt;
[/zcraft_home_join_in]</pre>

            <p>Et dans le détail...</p>

            <dl>
                <dt><code>[zcraft_home_join_in title="&lt;titre&gt;"] ... [/zcraft_home_join_in]</code></dt>
                <dd>
                    Shortocde à mettre autour de la zone contenant les textes d'invite et le bloc d'adresse.
                    Il est recommandé de mettre les paragraphes dans des balises <code>&lt;p&gt;</code>.<br />
                    Options :
                    <ul>
                        <li>
                            <code>title</code> : le titre de la section. Vous pouvez aussi ne pas le spécifier ici et
                            mettre un titre de second niveau.
                        </li>
                    </ul>
                </dd>

                <dt><code>[zcraft_home_join_in_ip version="&lt;version&gt;"] ... adresse IP affichée en gros ... [/zcraft_home_join_in_ip]</code></dt>
                <dd>
                    Shortcode affichant le bandeau de l'IP en lui-même. La version est un texte libre affiché à droite
                    (ou en dessous sur mobile).
                </dd>
            </dl>


            <h2 id="zcraft-help-articles">Articles</h2>

            <p>
                <a class="illustration" href="<?=get_template_directory_uri(); ?>/img/admin/content_attributes.png">
                    <img src="<?=get_template_directory_uri(); ?>/img/admin/content_attributes.png" alt="Attributs du contenu" />
                </a>
                À droite (par défaut) du formulaire de modification d'un article ou d'une page, se trouve un petit formulaire permettant
                de modifier le sous-titre de la page, un éventuel lien raccourci affiché en haut, ainsi que deux options permettant de
                désactiver l'ajout automatique par WordPress de paragraphes et autres mises en formes — utile si vous utilisez le shortcode
                <code>[php]</code> (voir plus bas).
            </p>

            <h3 id="zcraft-help-articles-shortcodes">Shortcodes</h3>

            <dl>
                <dt id="zcraft-help-articles-shortcodes-commands">
                    <pre>[commands]
    [command usage="/commande arguments"]Texte décrivant la commande[/command]
    [command usage="/autre commande"]Autre description[/command]
[/commands]</pre>
                </dt>
                <dd>
                    Formatte proprement une liste de commandes, quelles qu'elles soient.
                </dd>

                <dt id="zcraft-help-articles-shortcodes-server-infos">
                    <pre>[server_infos]
    [server_info title="Titre d'un bloc d'infos" help="Aide éventuelle à afficher (facultatif)"]Information de connexion[/server_info]
    [server_info title="Aute bloc" help="Autre aide"]Autre info[/server_info]
[/server_infos]</pre>
                </dt>
                <dd>
                    <a class="illustration" href="<?=get_template_directory_uri(); ?>/img/admin/server_infos.png">
                        <img src="<?=get_template_directory_uri(); ?>/img/admin/server_infos.png" alt="Infos de serveur" />
                    </a>
                    Affiche une liste d'informations de connexion, par exemple serveur, port, mot de passe, canal (pour IRC)... n'importe quoi.<br />
                    De multiples blocs mis ensemble dans un unique <code>[server_infos]</code> seront affichés ensemble.
                </dd>

                <dt id="zcraft-help-articles-shortcodes-images">
                    <pre>[image src="chemin/vers/limage" alt="Texte alternatif" link="lien ouvert au clic"]
    Légende de l'image
[/image]</pre>
                </dt>
                <dd>
                    Affiche une image, proprement intégrée à un article, avec une légende. Les options sont...<br />
                    <ul>
                        <li><code>src</code> : le chemin vers l'image affichée.</li>
                        <li>
                            <code>alt</code> : le texte alternatif de l'image, affiché aux visiteurs aveugles ou bots, ou
                            si l'image ne charge pas. Facultatif, mais très fortement recommandé.
                        </li>
                        <li><code>link</code> : le lien vers lequel pointe l'image. Si non fourni, <code>src</code> est utilisé.</li>
                    </ul>
                </dd>

                <dt id="zcraft-help-articles-shortcodes-gallery">
                    <pre>[zcraft_gallery]
    [image src="chemin/vers/limage"]Légende de l'image[/image]
    [image src="chemin/vers/limage"]Légende de l'image[/image]
    [image src="chemin/vers/limage"]Légende de l'image[/image]
[/zcraft_gallery]</pre>
                </dt>
                <dd>
                    Affiche une galerie d'images sur deux colonnes, ou une seule sur petits écrans.
                </dd>

                <dt id="zcraft-help-articles-shortcodes-illustration">
                    <pre>[illustration alt="Texte alternatif"]chemin/vers/l'image.png[/illustration]</pre>
                </dt>
                <dd>
                    Affiche une illustration en tête d'article, flottante à droite.<br />
                    <ul>
                        <li>
                            <code>alt</code> : le texte alternatif de l'image, affiché aux visiteurs aveugles ou bots, ou
                            si l'image ne charge pas. Facultatif, mais très fortement recommandé.
                        </li>
                    </ul>
                </dd>

                <dt id="zcraft-help-articles-shortcodes-players-list">
                    <pre>[players_list]AmauryPi,Black_Lizard,moribus,Jenjeur,ProkopyL,Pileurs,Dada_exe:Dada[/players_list]</pre>
                </dt>
                <dd>
                    <a class="illustration" href="<?=get_template_directory_uri(); ?>/img/admin/players_list.png">
                        <img src="<?=get_template_directory_uri(); ?>/img/admin/players_list.png" alt="Liste de joueurs" />
                    </a>
                    Affiche une liste de joueurs Minecraft, avec des avatars, sur plusieurs colonnes fonction de la taille de l'écran.
                    La liste des joueurs à afficher est placée dans le shortcode, entre virgules.<br />
                    Pour chaque joueur, vous pouvez soit ne mettre que son pseudo Minecraft (exact !), soit ajouter après
                    ce dernier le texte que vous voulez afficher séparé par <code>:</code>. Par exemple, si vous écrivez
                    <code>Dada_exe:Dada</code>, l'avatar affiché sera celui du joueur Dada_exe, mais le texte sera
                    «&nbsp;Dada&nbsp;».<br /><br />
                    Le shortcode dispose de quelques options avancées.
                    <ul>
                        <li>
                            <code>avatar_size</code> : la taille des avatars affichés, en pixels. Par défaut 32.
                        </li>
                        <li>
                            <code>avatar_url</code> : l'URL des avatars. Dans l'adresse, <code>{pseudo}</code> et
                            <code>{size}</code> sont respectivement remplacés par le pseudo Minecraft et la taille
                            (sans unité). Par défaut le service de Minotar est utilisé.
                        </li>
                    </ul>
                </dd>

                <dt id="zcraft-help-articles-shortcodes-steps">
                    <pre>[steps]
    [step image="chemin/vers/une/illustration"]Descriptif de l'étape 1[/step]
    [step image="chemin/vers/une/illustration"]Descriptif de l'étape 2[/step]
    [step image="chemin/vers/une/illustration"]Descriptif de l'étape 3[/step]
[/steps]</pre>
                </dt>
                <dd>
                    <aside class="illustration">
                        <figure>
                            <a href="<?=get_template_directory_uri(); ?>/img/admin/steps.png">
                                <img src="<?=get_template_directory_uri(); ?>/img/admin/steps.png" alt="Étapes" />
                            </a>
                            <figcaption>Étapes</figcaption>
                        </figure>
                        <figure>
                            <a href="<?=get_template_directory_uri(); ?>/img/admin/steps_zoom.png">
                                <img src="<?=get_template_directory_uri(); ?>/img/admin/steps_zoom.png" alt="Étapes" />
                            </a>
                            <figcaption>Zoom</figcaption>
                        </figure>
                    </aside>

                    Permet d'afficher des étapes à suivre pour faire quelque chose.<br /><br />

                    Chaque étape dans un bloc <code>[steps]</code> est numérotée, et accompagnée d'une illustration facultative
                    affichée à droite en petit. L'illustration est zoomée au clic (et dé-zoomée au clic sur la grande image).

                    <ul>
                        <li>
                            <code>image</code> : le lien vers l'image d'illustration.
                        </li>
                        <li>
                            <code>image_mini</code> : le lien vers l'image en miniature. Si non fourni, l'image en grand est utilisée.<br />
                            Il est conseillé de ne <strong>pas</strong> spécifier d'image en miniature (utilisant la même image) si l'image
                            en grand format n'est pas trop grande (et elle ne devrait pas, pour être bien affichée), afin d'éviter un temps de
                            chargement au clic pour zoomer.
                        </li>
                        <li>
                            <code>image_alt</code> : le texte alternatif de l'image, affiché aux visiteurs aveugles ou bots, ou
                            si l'image ne charge pas. Facultatif, mais très fortement recommandé.
                        </li>
                    </ul>
                </dd>

                <dt id="zcraft-help-articles-shortcodes-php">
                    <pre>[php]
    // Code PHP, sans les délimiteurs &lt;php ... ?&gt;
[/php]</pre>
                </dt>
                <dd>
                    Exécute directement un code PHP dans un article. Le PHP est exécuté par la fonction <code>eval</code>.<br /><br />
                    Vous <strong>devez</strong> activer la fonction «&nbsp;Contenu brut&nbsp;» pour pouvoir utiliser correctement ce
                    shortcode sur plusieurs lignes, sinon Wordpress va insérer de l'HTML au milieu du code source et le rendre invalide.<br />
                    Sur un code d'une seule ligne, cela dit, vous pouvez utiliser le shortcode directement même sans activer l'option.<br /><br />

                    <strong>Attention</strong> — Si le code PHP est invalide ou plante, la page ou l'article plantera avec, au niveau du shortcode.<br /><br />

                    Le shortcode a une option avancée.

                    <ul>
                        <li>
                            <code>execute_in_widgets</code> : certains widgets récupèrent le contenu de l'article ou de la page, exécutant les shortcodes au passage,
                            pour fonctionner. C'est typiquement le cas des widgets de table de matière. Par défaut, le PHP inclu dans ce shortcode n'est <strong>pas</strong>
                            exécuté dans un tel contexte, uniquement dans l'article. Cela permet d'éviter d'avoir une double exécution du code PHP, ce qui pose problème
                            si par exemple une fonction est définie, ou ne serais-ce qu'en terme de performances.<br />
                            Si vous souhaitez que le code PHP soit exécuté lorsque les widgets récupèrent le contenu, alors passez cette option en lui donnant <strong>la
                            valeur <code>yes</code></strong>. Si vous le faites, gardez en mémoire que votre code peut être exécuté deux fois, par exemple enrobez
                            d'éventuelles déclarations de fonction :
                            <pre>if (!function_exists('nom_de_la_fonction'))
{
    function nom_de_la_fonction()
    {
        // Code...
    }
}</pre>
                            Ce comportement peut être nécessaire si, par exemple, le code PHP est utilisé pour générer des titres (en reprenant l'exemple d'une table
                            des matières).
                        </li>
                    </ul>

                    Le shortcode <code>[php]</code> a pour alias <code>[weaver_php]</code>, pour être rétrocompatible avec le thème Weaver II.
                </dd>
            </dl>

            <h3 id="zcraft-help-articles-int-su">Intégration avec Shortcodes Ultimate</h3>

            <p>
                Un effort a été fait pour intégrer proprement les composants de <em>Shortcodes Ultimage</em>. Ils devraient marcher correctement et s'intégrer
                harmonieusement avec les articles.
            </p>
            <p>
                Un style minimal d'onglets est également fourni avec le thème. Il permet d'afficher de manière relativement propre des étapes (cf. <code>[steps]</code>)
                dans des onglets.<br />
                Vous pouvez ajouter dans l'attribut <code>class</code> du shortcode <code>[su_tabs]</code> les valeurs :
            </p>
            <ul>
                <li><code>minimal-tabs</code> : affiche des onglets sur une ligne, sans bloc coloré en fond&nbsp;;</li>
                <li><code>no-margins</code> : désactive toute marge à l'intérieur des blocs d'onglet. Recommandé pour mettre des listes d'étapes dans des onglets.</li>
            </ul>
            <p>
                Il est également possible de cumuler les styles en les séparant par une espace dans l'attribut <code>class</code>.
            </p>
            <p>
                Par exemple, utilisez ceci pour mettre proprement deux listes d'étapes dans des onglets :
            </p>
            <pre>[su_tabs class="minimal-tabs no-margins"]
    [su_tab title="Onglet 1"]
        [steps]
            [step image="..."]Étape...[/step]
        [/steps]
    [/su_tab]
    [su_tab title="Onglet 2"]
        [steps]
            [step image="..."]Étape...[/step]
        [/steps]
    [/su_tab]
[/su_tabs]</pre>
            <p>...ce qui donne : </p>
            <figure>
                <a href="<?=get_template_directory_uri(); ?>/img/admin/steps_in_tabs.png">
                    <img src="<?=get_template_directory_uri(); ?>/img/admin/steps_in_tabs.png" alt="Étapes dans des onglets" />
                </a>
                <figcaption>Étapes dans des onglets</figcaption>
            </figure>

            <h3 id="zcraft-help-articles-int-eztoc">Intégration avec Easy Table of Contents</h3>

            <p>
                Ce thème est optimisé pour fonctionner avec le plugin <a href="https://fr.wordpress.org/plugins/easy-table-of-contents/">
                Easy Table of Contents</a> configuré en tant que widget dans la barre latérale des articles et pages.
            </p>
        </div>
        <?php
    });
});
