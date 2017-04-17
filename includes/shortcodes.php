<?php

/* ** HOMEPAGE SHORTCODES ** */

add_shortcode('zcraft_home_presentations', function($args, $content)
{
    return '<ul id="serveur-presentation">' . do_shortcode($content) . '</ul>';
});

add_shortcode('zcraft_home_presentation', function($args, $content)
{
    $a = shortcode_atts(['image' => '', 'title' => ''], $args);

    return '<li><img src="' . $a['image'] . '" alt="" role="presentation" aria-hidden="true" /><strong>' . $a['title'] . '</strong><p>' . do_shortcode($content) . '</p></li>';
});

add_shortcode('zcraft_home_featurettes', function($args, $content)
{
    return '<section id="featurettes">' . do_shortcode($content) . '</section>';
});

add_shortcode('zcraft_home_featurette', function($args, $content)
{
    $a = shortcode_atts(['image' => '', 'title' => '', 'subtitle' => ''], $args);

    return '<article'
        . (!empty($a['image']) ? ' style="background-image: url(\'' . $a['image'] . '\');"' : '')
        . '><div><h2>' . $a['title'] . (!empty($a['subtitle']) ? ' <em>' . $a['subtitle'] . '</em>' : '') . '</h2>'
        . do_shortcode($content)
        . '</div></article>';
});

add_shortcode('zcraft_home_big_notices', function($args, $content)
{
    return '<section id="big-notices">' . do_shortcode($content) . '</section>';
});

add_shortcode('zcraft_home_big_notice', function($args, $content)
{
    return '<article>' . do_shortcode($content) . '</article>';
});

add_shortcode('zcraft_home_join_in', function($args, $content)
{
    $a = shortcode_atts(['title' => ''], $args);
    return '<section id="join-in">'
        . (!empty($a['title']) ? '<h2>' . do_shortcode($a['title']) . '</h2>' : '')
        . do_shortcode($content)
        . '</section>';
});

add_shortcode('zcraft_home_join_in_ip', function($args, $content)
{
    $a = shortcode_atts(['version' => ''], $args);
    return '<p id="server-ip" class="minecraft-style"><strong>'
        . do_shortcode($content)
        . '</strong>'
        . (!empty($a['version']) ? ' <em>' . do_shortcode($a['version']) . '</em>' : '')
        . '</p>';
});



/* ** ARTICLES SHORTCODES ** */

add_shortcode('commands', function($args, $content)
{
    return '<dl>' . do_shortcode($content) . '</dl>';
});

add_shortcode('command', function($args, $content)
{
    $a = shortcode_atts(['usage' => ''], $args);

    return '<dt><code>' . do_shortcode($a['usage']) . '</code></dt>'
        . '<dd>' . do_shortcode($content) . '</dd>';
});


add_shortcode('server_infos', function($args, $content)
{
    return '<dl class="servers-connection-infos">' . do_shortcode($content) . '</dl>';
});

add_shortcode('server_info', function($args, $content)
{
    $a = shortcode_atts(['title' => '', 'help' => ''], $args);

    return '<dt>' . do_shortcode($a['title']) . '</dt>'
        . '<dd>' . do_shortcode($content)
        . (!empty($a['help']) ? '<span class="help">' . do_shortcode($a['help']) . '</span>' : '')
        . '</dd>';
});


add_shortcode('zcraft_gallery', function($args, $content)
{
    return '<div class="images_gallery">' . do_shortcode($content) . '</div>';
});

add_shortcode('image', function($args, $content)
{
    $a = shortcode_atts(['alt' => '', 'src' => '', 'link' => ''], $args);

    $content = do_shortcode($content);

    return '<figure>'
        . '<a href="' . (!empty($a['link']) ? $a['link'] : $a['src']) . '">'
        . '<img src="' . $a['src'] . '" alt="' . (!empty($a['alt']) ? $a['alt'] : do_shortcode($content)) . '" />'
        . '</a>'
        . (!empty($content) ? '<figcaption>' . $content . '</figcaption>' : '')
        . '</figure>';
});

add_shortcode('illustration', function($args, $content)
{
    $a = shortcode_atts(['alt' => ''], $args);
    return '<img src="' . $content . '" alt="' . $a['alt'] . '" class="article-illustration" />';
});


add_shortcode('players_list', function($args, $content)
{
    $a = shortcode_atts(['avatar_size' => '32', 'avatar_url' => 'https://minotar.net/helm/{pseudo}/{size}'], $args);

    $output = '<ul class="players-list">';
    foreach (explode(',', $content) as $raw_player)
    {
        $raw_player = explode(':', trim($raw_player));
        $player_name = trim(array_shift($raw_player));
        $display_name = trim(count($raw_player) > 0 ? implode(':', $raw_player) : $player_name);

        $output .= '<li>';
        $output .= '<img src="' . str_replace(['{pseudo}', '{size}'], [$player_name, $a['avatar_size']], $a['avatar_url']) . '" alt="' . $player_name . '" />';
        $output .= '<span>' . $display_name . '</span>';
        $output .= '</li>';
    }
    $output .= '</ul>';

    return $output;
});


add_shortcode('steps', function($args, $content)
{
    return '<ol class="help-steps">' . do_shortcode($content) . '</ol>';
});

add_shortcode('step', function($args, $content)
{
    $a = shortcode_atts(['image' => '', 'image_mini' => '', 'image_alt' => 'Illustration'], $args);

    return '<li>'
        . (!empty($a['image']) ? '<img class="step-image" src="' . (!empty($a['image_mini']) ? $a['image_mini'] : $a['image']) . '" alt="' . $a['image_alt'] . '" data-src-large="' . $a['image'] . '" />' : '')
        . do_shortcode($content)
        . '</li>';
});



/* ** ADVANCED SHORTCODES ** */

// Disables PHP execution when widgets in sidebar retrieve the content.
// This avoids problems related to duplicated PHP execution (e.g. for declared functions).
// If a PHP script should run when the content is retrieved by a widget (e.g. PHP scripts
// generating titles, titles being used by a sidebar TOC), add to the [php] or [weaver_php]
// shortcode the execute_in_widgets="yes" argument.

$zcraft_php_shortcode_enabled = true;

add_action('dynamic_sidebar_before', function() {
    global $zcraft_php_shortcode_enabled;
    $zcraft_php_shortcode_enabled = false;
});

add_action('dynamic_sidebar_after', function() {
    global $zcraft_php_shortcode_enabled;
    $zcraft_php_shortcode_enabled = true;
});

// Inspiration from Weaver-II, large parts of the code for the following shortcode by Bruce Wampler (GPL v2)
function zcraft_php_shortcode($args, $content)
{
    global $zcraft_php_shortcode_enabled;
    $a = shortcode_atts(['execute_in_widgets' => 'no'], $args);

    // See comment above
    if (!$zcraft_php_shortcode_enabled && $a['execute_in_widgets'] != 'yes')
        return $content;

    $char_codes = ['&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#8242;', '&#8243;', '&#8211;', '&#8212;', '&#8230;', '&#215;', '&lsquo;', '&rsquo;', '&nbsp;', '&laquo;', '&raquo;'];
	$replacements = ["'", "'", '"', '"', "'", '"', '--', '---', '...', 'x', "'", "'", " ", '"', '"'];

	$php = str_replace($char_codes, $replacements, $content); // untexturize
	$php .= ';';

	$err_level = error_reporting(0);
	$out = '';

	ob_start();

	if(version_compare(PHP_VERSION, '5.0.0', '>'))
    {
	   try { eval($php); } catch(Exception $e) {}
	}
    else
    {
		eval($php);
	}

	$out .= ob_get_clean();
	error_reporting($err_level);
	return $out;
}

add_shortcode('php', 'zcraft_php_shortcode');
if (!shortcode_exists('weaver_php')) add_shortcode('weaver_php', 'zcraft_php_shortcode'); // Compatibility with Weaver-II theme.
