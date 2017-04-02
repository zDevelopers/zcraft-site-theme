<?php

/* ** HOMEPAGE SHORTCODES ** */

add_shortcode('zcraft_home_presentations', function($atts, $content)
{
    return '<ul id="serveur-presentation">' . do_shortcode($content) . '</ul>';
});

add_shortcode('zcraft_home_presentation', function($atts, $content)
{
    $a = shortcode_atts(['image' => '', 'title' => ''], $atts);

    return '<li><img src="' . $a['image'] . '" alt="" role="presentation" aria-hidden="true" /><strong>' . $a['title'] . '</strong><p>' . do_shortcode($content) . '</p></li>';
});

add_shortcode('zcraft_home_featurettes', function($atts, $content)
{
    return '<section id="featurettes">' . do_shortcode($content) . '</section>';
});

add_shortcode('zcraft_home_featurette', function($atts, $content)
{
    $a = shortcode_atts(['image' => '', 'title' => '', 'subtitle' => ''], $atts);

    return '<article'
        . (!empty($a['image']) ? ' style="background-image: url(\'' . $a['image'] . '\');"' : '')
        . '><div><h2>' . $a['title'] . (!empty($a['subtitle']) ? '<em>' . $a['subtitle'] . '</em>' : '') . '</h2>'
        . do_shortcode($content)
        . '</div></article>';
});



/* ** ARTICLES SHORTCODES ** */

add_shortcode('commands', function($atts, $content)
{
    return '<dl>' . do_shortcode($content) . '</dl>';
});

add_shortcode('command', function($atts, $content)
{
    $a = shortcode_atts(['usage' => ''], $atts);

    return '<dt><code>' . do_shortcode($a['usage']) . '</code></dt>'
        . '<dd>' . do_shortcode($content) . '</dd>';
});



/* ** ADVANCED SHORTCODES ** */


// Inspiration from Weaver-II, large parts of the code for the following shortcode by Bruce Wampler (GPL v2)
function zcraft_php_shortcode($atts, $content)
{
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
