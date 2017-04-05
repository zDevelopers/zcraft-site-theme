<?php

// Inspiration from Weaver-II, large parts of the code for the following shortcode by Bruce Wampler (GPL v2)
function zcraft_disable_visual_editor()
{
    global $wp_rich_edit;

    if (!isset($_GET['post'])) return;
    $post_id = $_GET['post'];

    $hide_visual_editor = get_post_meta($post_id, 'hide_visual_editor', true);
    $raw = get_post_meta($post_id, 'wvr_raw_html', true);
    if (!$raw) $raw = get_post_meta($post_id, 'raw_html', true);

    if ($hide_visual_editor == 'on' || $raw == 'on')
        $wp_rich_edit = false;
}

add_action('load-page.php', 'zcraft_disable_visual_editor');
add_action('load-post.php', 'zcraft_disable_visual_editor');


function zcraft_add_metaboxes()
{
    $is_home_page = isset($_GET['post']) && (get_option('show_on_front') == 'page') && (get_option('page_on_front') == $_GET['post']);

    add_meta_box('zcraft-content-properties', 'Attributs du contenu', function($post)
    {
        wp_nonce_field('zcraft_content_properties', 'zcraft_content_nonce');

        $subtitle = get_post_meta($post->ID, 'subtitle', true);
        $short_link = get_post_meta($post->ID, 'short_link', true);

        $is_not_visual = get_post_meta($post->ID, 'hide_visual_editor', true) != false;
        $is_raw = get_post_meta($post->ID, 'wvr_raw_html', true) != false || get_post_meta($post->ID, 'raw_html', true) != null;

        $is_home_page = isset($_GET['post']) && (get_option('show_on_front') == 'page') && (get_option('page_on_front') == $_GET['post']);
        ?>
            <?php if (!$is_home_page): ?>
            <p class="post-attributes-label-wrapper">
                <label class="post-attributes-label" for="zcraft-content-subtitle">Sous-titre</label>
            </p>
            <input name="zcraft-content-subtitle" id="zcraft-content-subtitle" type="text" style="width: 100%" value="<?=$subtitle ?>" />

            <p class="post-attributes-label-wrapper">
                <label class="post-attributes-label" for="zcraft-content-shortlink">Lien raccourci</label>
            </p>
            <input name="zcraft-content-shortlink" id="zcraft-content-shortlink" type="text" style="width: 100%" value="<?=$short_link ?>" />

            <br /><br />
            <?php endif; ?>

            <label for="zcraft-content-raw" class="selectit">
                <input name="zcraft-content-raw" id="zcraft-content-raw" type="checkbox" <?php if ($is_raw): ?>checked="checked" <?php endif; ?>/> Contenu brut
            </label><br />

            <label for="zcraft-content-novisual" class="selectit">
                <input name="zcraft-content-novisual" id="zcraft-content-novisual" type="checkbox" <?php if ($is_not_visual): ?>checked="checked" <?php endif; ?>/> Désactiver l'éditeur visuel
            </label>

            <p>
                <em>Les contenus bruts sont affichés tel quel, sans ajout de paragraphes, etc.</em>
            </p>
        <?php
    }, null, 'side');

    if (!$is_home_page) return;

    add_meta_box('zcraft-homepage', 'Paramétrage de la page d\'accueil', function($post)
    {
        wp_nonce_field('zcraft_homepage_properties', 'zcraft_homepage_nonce');

        $title       = get_post_meta($post->ID, 'zcraft_homepage_title', true);
        $subtitle    = get_post_meta($post->ID, 'zcraft_homepage_subtitle', true);
        $tagline     = get_post_meta($post->ID, 'zcraft_homepage_tagline', true);
        $button      = get_post_meta($post->ID, 'zcraft_homepage_button', true);
        $button_href = get_post_meta($post->ID, 'zcraft_homepage_button_href', true);
        $servers     = get_post_meta($post->ID, 'zcraft_homepage_servers', true);

        ?>

        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="zcraft_homepage_title">Titre</label></th>
                    <td>
                        <input type="text" class="large-text" name="zcraft_homepage_title" id="zcraft_homepage_title" value="<?=$title ?>" />
                        <label for="zcraft_homepage_title">Le titre affiché en gros tout en haut de la page d'accueil, uniquement sur cette dernière.</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zcraft_homepage_subtitle">Sous-titre</label></th>
                    <td>
                        <input type="text" class="large-text" name="zcraft_homepage_subtitle" id="zcraft_homepage_subtitle" value="<?=$subtitle ?>" />
                        <label for="zcraft_homepage_subtitle">Le sous-titre affiché sous le titre, tout en haut de la page d'accueil, uniquement sur cette dernière.</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zcraft_homepage_tagline">Phrase d'accroche</label></th>
                    <td>
                        <input type="text" class="large-text" name="zcraft_homepage_tagline" id="zcraft_homepage_tagline" value="<?=$tagline ?>" />
                        <label for="zcraft_homepage_tagline">Une phrase affichée sous le sous-titre sur la page d'accueil.</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zcraft_homepage_button">Bouton</label></th>
                    <td>
                        <p style="margin-bottom: 1em;">Configure le bouton affiché dans l'en-tête de la page d'accueil, tout en bas.</p>
                        <p class="post-attributes-label-wrapper">
                            <label for="zcraft_homepage_button" class="post-attributes-label">Texte du bouton</label>
                        </p>
                        <input type="text" class="large-text" style="margin-bottom: 1em;" name="zcraft_homepage_button" id="zcraft_homepage_button" value="<?=$button ?>" />

                        <p class="post-attributes-label-wrapper">
                            <label for="zcraft_homepage_button_href" class="post-attributes-label">Lien ou ancre du bouton</label>
                        </p>
                        <input type="text" class="large-text" name="zcraft_homepage_button_href" id="zcraft_homepage_button_href" value="<?=$button_href ?>" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zcraft_homepage_servers">Serveurs</label></th>
                    <td>
                        <textarea name="zcraft_homepage_servers" id="zcraft_homepage_servers" class="large-text" rows="6" cols="30"><?=$servers ?></textarea>
                        <p>
                            <label for="zcraft_homepage_servers">Configurez ci-dessus les serveurs affichés sur la page d'accueil.</label>
                        </p>
                        <p>
                            Entrez un serveur par ligne, en commençant par l'adresse du serveur, puis en ajoutant un <code>|</code> et le nom
                            d'affichage du serveur, uniquement si ce dernier doit différer de l'adresse.
                        </p>
                        <p>
                            <strong>Exemples</strong>
                        </p>
                        <ul>
                            <li><code>zcraft.fr</code> — Serveur zcraft.fr, affiché zcraft.fr</li>
                            <li><code>zcraft.fr:25566|Serveur de tests</code> — Serveur zcraft.fr:25566, affiché « Serveur de tests » </li>
                        </ul>
                        <p>
                            Dans le cas où le nom d'affichage est différent de l'adresse, cette dernière sera affichée dans une infobulle
                            au survol du nom du serveur.
                        </p>
                        <p>
                            Pour retirer complètement le bandeau de la page d'accueil, laissez le champ vide.
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }, null, 'normal');
}

function zcraft_save_metaboxes($post_id, $post, $update)
{
    /* Content properties metabox */

    if (!current_user_can('edit_post', $post_id) || !wp_verify_nonce($_REQUEST['zcraft_content_nonce'], 'zcraft_content_properties')) return;

    if (isset($_REQUEST['zcraft-content-subtitle']))  update_post_meta($post_id, 'subtitle', $_REQUEST['zcraft-content-subtitle']);
    if (isset($_REQUEST['zcraft-content-shortlink'])) update_post_meta($post_id, 'short_link', $_REQUEST['zcraft-content-shortlink']);

    // Removes old values from Weaver II
    delete_post_meta($post_id, 'wvr_raw_html');

    if (isset($_REQUEST['zcraft-content-raw']))
    {
        update_post_meta($post_id, 'raw_html', 'on');
    }
    else
    {
        delete_post_meta($post_id, 'raw_html');
    }

    if (isset($_REQUEST['zcraft-content-novisual']))
    {
        update_post_meta($post_id, 'hide_visual_editor', 'on');
    }
    else
    {
        delete_post_meta($post_id, 'hide_visual_editor');
    }

    /* Homepage metabox */

    if (!isset($_REQUEST['zcraft_homepage_nonce']) || !wp_verify_nonce($_REQUEST['zcraft_homepage_nonce'], 'zcraft_homepage_properties')) return;

    foreach (['title', 'subtitle', 'tagline', 'button', 'button_href', 'servers'] AS $meta)
    {
        $full_meta = 'zcraft_homepage_' . $meta;
        if (isset($_REQUEST[$full_meta]))
        {
            update_post_meta($post_id, $full_meta, $_REQUEST[$full_meta]);
        }
    }
}

add_action('add_meta_boxes', 'zcraft_add_metaboxes');
add_action('save_post', 'zcraft_save_metaboxes', 10, 3);
