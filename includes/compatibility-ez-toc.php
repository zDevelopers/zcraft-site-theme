<?php

add_action('widget_title', function($title, $instance, $id)
{
    if ($id != 'ezw_tco') return $title;
    return $title . '<span data-drawer="table-of-contents"></span>';
}, 10, 3);

add_action('zcraft_sidebar_rendered', function($rendered)
{
    $rendered = preg_replace("/<h2(.+)<span class=\"ez-toc-title\">([^\n]+)<\/span>(.+)<\/h2>/is", "<h3>$2</h3>", $rendered);
    $rendered = str_replace('<ul class="ez-toc-list">', '<ul class="ez-toc-list" id="table-of-contents" data-title="Table des matières">', $rendered);

    return $rendered;
});
