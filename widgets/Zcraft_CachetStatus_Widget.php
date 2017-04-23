<?php

class Zcraft_CachetStatus_Widget extends Zcraft_Widget
{
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'zcraft_cachet_status_widget',
            esc_html__('État des services Cachet', 'zcraft'),
            [
                'description' => esc_html__('Affiche l\'état des services en provenance d\'un site de statut Cachet.', 'zcraft')
            ]
        );

        $this->default_values = [
            'title'                    => esc_html__('État des services', 'zcraft'),
            'cachet-url'               => esc_html__('', 'zcraft'),
            'text-initial'             => esc_html__('Accéder au site d\'état', 'zcraft'),
            'text-loading'             => esc_html__('Chargement en cours...', 'zcraft'),
            'text-no-status'           => esc_html__('Impossible de charger l\'état', 'zcraft'),
            'text-operational'         => esc_html__('Tous les signaux sont au vert', 'zcraft'),
            'text-performances-issues' => esc_html__('Problèmes de performances', 'zcraft'),
            'text-partial-outage'      => esc_html__('Panne partielle', 'zcraft'),
            'text-major-outage'        => esc_html__('Panne majeure', 'zcraft'),
            'text-investigating'       => esc_html__('Problème rencontré', 'zcraft'),
            'text-identified'          => esc_html__('Problème en cours de résolution', 'zcraft'),
            'text-watching'            => esc_html__('Problème récent, sous surveillance', 'zcraft')
        ];
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $instance = array_merge($this->default_values, $instance);

        echo $args['before_widget'];

        if (!empty($instance['title']))
        {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title'], $instance, $instance['id']);
            echo $args['after_title'];
        }

        ?>
        <ul>
            <li>
                <a href="<?=esc_attr($instance['cachet-url']) ?>"
                    class="status-indicator"
                    data-cachet="<?=esc_attr($instance['cachet-url']) ?>"
                    <?php foreach ($instance as $key => $value): ?><?php if (substr($key, 0, 5) == 'text-'): ?>
                            data-<?=$key ?>="<?=esc_attr($value) ?>"
                    <?php endif; ?><?php endforeach; ?>>
                    <?=esc_attr($instance['text-initial']) ?>
                </a>
            </li>
        </ul>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $this->display_option($instance, 'Titre', 'title');
        $this->display_option($instance, 'Adresse du site de statut Cachet', 'cachet-url', null, true, 'url');

        ?><h4>Textes affichés</h4><?php

        $this->display_option($instance, 'Texte initial', 'text-initial');
        $this->display_option($instance, 'Pendant le chargement', 'text-loading');
        $this->display_option($instance, 'Impossible de charger l\'état', 'text-no-status');

        ?><h4>États globaux</h4><?php

        $this->display_option($instance, 'Opérationnel', 'text-operational');
        $this->display_option($instance, 'Performances', 'text-performances-issues');
        $this->display_option($instance, 'Panne partielle', 'text-partial-outage');
        $this->display_option($instance, 'Panne majeure', 'text-major-outage');

        ?><h4>États pendant un incident</h4><?php

        $this->display_option($instance, 'Enquête en cours', 'text-investigating');
        $this->display_option($instance, 'Identifié', 'text-identified');
        $this->display_option($instance, 'Sous surveillance', 'text-watching');
    }
}
