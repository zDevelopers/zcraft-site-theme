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

<section id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
            printf(_nx('Un commentaire', '%1$s commentaires', get_comments_number(), 'comments title', 'zcraft'), number_format_i18n(get_comments_number()));
            ?>
        </h3>


        <ol class="comment-list">
            <?php

            wp_list_comments([
                'short_ping'  => true,
                'avatar_size' => 56,
                'style'       => 'li',
                'callback'    => function ($comment, $args, $depth)
                {
                    $tag       = 'li';
                    $add_below = 'div-comment';
                    ?>
                    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
                        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
                            <aside class="comment-author vcard">
                                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
                            </aside>
                            <article class="comment-content">
                                <?php if ($comment->comment_approved == '0'): ?>
                                    <p><em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em></p>
                                <?php endif; ?>
                                <p><?php comment_text(); ?></p>

                                <footer>
                                    <div class="comment-meta">
                                        — <cite><?php echo get_comment_author_link(); ?></cite>,
                                        <?php $comment_date = sprintf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?>
                                        <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID )); ?>" title="<?=$comment_date; ?>">
                                            <?=$comment_date; ?>
                                        </a>
                                    </div>
                                    <div class="comment-links">
                                        <?php
                                            $comment_reply_link = trim(get_comment_reply_link(array_merge($args, [
                                                'add_below' => $add_below,
                                                'depth'     => $depth,
                                                'max_depth' => $args['max_depth']
                                            ])));
                                        ?>
                                        <?php edit_comment_link('Modifier', '', !empty($comment_reply_link) ? ' &middot; ' : ''); ?>
                                        <?php echo $comment_reply_link; ?>
                                    </div>
                                </footer>
                            </article>
                        </div>
                    <?php
                }
            ]);
            ?>
        </ol>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments')): ?>
        <p class="no-comments">Les commentaires sont fermés.</p>
    <?php endif; ?>

    <?php comment_form(['class_submit' => '']); ?>

</section>
