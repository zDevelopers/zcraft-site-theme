<?php

class Zcraft_FooterCopyright_Widget extends Zcraft_Widget
{
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'zcraft_footer_copyright_text_widget',
            esc_html__('Copyright du pied de page', 'zcraft'),
            [
                'description' => esc_html__('Affiche un copyright, idéalement dans le pied de page.', 'zcraft')
            ]
        );

        $this->default_values = ['text' => esc_html__('', 'zcraft')];
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

        if (!empty($instance['text'])):
            ?><p class="copyrights"><?=$instance['text'] ?></p><?php
        endif;

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
        $this->display_option($instance, 'Texte du copyright', 'text');
    }
}
