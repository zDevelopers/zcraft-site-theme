<?php get_header(); ?>

<?php
if (have_posts()):
    while (have_posts()): the_post();
?>

    <section id="page-headings">
        <h2><?php
                $title = get_post_meta(get_the_ID(), 'zcraft_homepage_title', true);
                echo !empty($title) ? $title : get_the_title();
            ?></h2>
        <h3><?php
                $subtitle = get_post_meta(get_the_ID(), 'zcraft_homepage_subtitle', true);
                if (empty($title)) $subtitle = get_post_meta(get_the_ID(), 'subtitle', true);

                echo $subtitle;
            ?></h3>
    </section>
    <section id="serveur-details">
        <p class="valeurs"><?php echo get_post_meta(get_the_ID(), 'zcraft_homepage_tagline', true); ?></p>
        <a href="<?php echo get_post_meta(get_the_ID(), 'zcraft_homepage_button_href', true); ?>" class="acces-candidature"><?php echo get_post_meta(get_the_ID(), 'zcraft_homepage_button', true); ?></a>
    </section>
</header>

<?php
    $servers_raw = trim(get_post_meta(get_the_ID(), 'zcraft_homepage_servers', true));
    if (!empty($servers_raw)):
?>

<dl id="online-status" class="minecraft-style">
    <?php foreach (explode("\n", $servers_raw) AS $server): ?>
        <?php
            if (strpos($server, '|') === false)
            {
                $hostname = $name = $server;
            }
            else
            {
                $server = explode('|', $server);
                $hostname = array_shift($server);
                $name = implode('|', $server);
            }
        ?>
        <dd data-hostname="<?php echo $hostname; ?>"><?php echo $name; ?></dd><dt></dt>
    <?php endforeach; ?>
</dl>

<?php endif; ?>

<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
