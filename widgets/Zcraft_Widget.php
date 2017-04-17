<?php

class Zcraft_Widget extends WP_Widget
{
    protected $default_values;

    protected function display_option($instance, $title, $key, $default = null, $required = false, $form_field_type = 'text')
    {
        $default = $default === null ? $this->default_values[$key] : $default;
        $value = !empty($instance[$key]) ? $instance[$key] : esc_html__($default, 'zcraft');
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id($key)); ?>">
                <?php esc_attr_e($title, 'zcraft'); ?>
            </label>
            <input class="widefat"
                    id="<?php echo esc_attr($this->get_field_id($key)); ?>"
                    name="<?php echo esc_attr($this->get_field_name($key)); ?>"
                    type="<?php echo $form_field_type; ?>"
                    value="<?php echo esc_attr($value); ?>"
                    <?php if ($required): ?>required="required"<?php endif; ?>
            />
        </p>

        <?php
    }

    protected function save_options(array $new_instance, array $fields)
    {
        $instance = [];

        foreach ($fields as $key => $field_name)
        {
            $instance[$field_name] = !empty($new_instance[$field_name]) ? strip_tags($new_instance[$field_name]) : '';
        }

        return $instance;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        return $this->save_options($new_instance, array_keys($this->default_values));
    }
}
