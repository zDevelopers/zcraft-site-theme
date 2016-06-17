<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf(_nx('Un commentaire', '%1$s commentaires', get_comments_number(), 'comments title', 'zcraft'), number_format_i18n(get_comments_number()));
            ?>
        </h2>


        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 56,
            ) );
            ?>
        </ol>


    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments')): ?>
        <p class="no-comments">Les commentaires sont fermés.</p>
    <?php endif; ?>

    <?php comment_form(array(
        'class_submit' => 'btn btn-default'
    )); ?>

</div>
