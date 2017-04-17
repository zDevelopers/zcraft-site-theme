<?php $zcraft_form_field_id = 'search-input-field-' . mt_rand(); ?>

<!--<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label class="sr-only" for="<?php echo $zcraft_form_field_id; ?>">
        <span class="sr-only"><?php echo _x('Search for:', 'label'); ?></span>
    </label>
    <div class="input-group">
        <input type="search" class="form-control" id="<?php echo $zcraft_form_field_id; ?>"
               placeholder="Rechercher..."
               value="<?php echo get_search_query(); ?>" name="s"
               title="<?php echo esc_attr_x('Search for:', 'label'); ?>" />
        <span class="input-group-btn">
            <input type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
        </span>
    </div>
</form>-->

<form class="search" role="search" action="<?php echo home_url( '/' ); ?>">
    <label class="sr-only" for="<?php echo $zcraft_form_field_id; ?>">
        <span class="sr-only"><?php echo _x('Search for:', 'label'); ?></span>
    </label>

    <input type="search"
            id="<?php echo $zcraft_form_field_id; ?>" name="s"
            placeholder="Rechercher…"
            value="<?php echo get_search_query(); ?>" name="s"
            title="<?php echo esc_attr_x('Search for:', 'label'); ?>" />

    <button type="submit"><?php echo esc_attr_x('Search', 'submit button'); ?></button>
</form>
