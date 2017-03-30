<?php get_header(); ?>

<?php
if (have_posts()):
    while (have_posts()): the_post();
?>

    <section id="page-headings">
        <h2>
            <?php
                $title = get_post_meta(get_the_ID(), 'homepage-title', true);
                echo !empty($title) ? $title : get_the_title();
            ?>
        </h2>
        <h3>
            <?php
                $subtitle = get_post_meta(get_the_ID(), 'homepage-subtitle', true);
                if (empty($title)) $subtitle =get_post_meta(get_the_ID(), 'subtitle', true);

                echo $subtitle;
            ?>
        </h3>
    </section>
    <section id="serveur-details">
        <p class="valeurs">
            <?php echo get_post_meta(get_the_ID(), 'homepage-tagline', true); ?>
        </p>
        <a href="<?php echo get_post_meta(get_the_ID(), 'homepage-button-href', true); ?>" class="acces-candidature"><?php echo get_post_meta(get_the_ID(), 'homepage-button', true); ?></a>
    </section>
</header>

<dl id="online-status" class="minecraft-style">
    <?php foreach (get_post_custom_values('homepage-server') AS $key => $server): ?>
        <?php
            if (strpos($server, '|') === false)
            {
                $hostname = $name = $server;
            }
            else
            {
                $server = explode('|', $server);
                $hostname = $server[1];
                $name = $server[0];
            }
        ?>
        <dd data-hostname="<?php echo $hostname; ?>"><?php echo $name; ?></dd><dt></dt>
    <?php endforeach; ?>
</dl>

<?php the_content(); ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
