<?php
/**
 * The template for displaying comments
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 * @package new-york-business
 * @since 1.0
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
	?>
		<h2 class="comments-title">
			<?php
			$new_york_business_comments_number = get_comments_number();
			if ( '1' === $new_york_business_comments_number ) {
				/* translators: %s: post title */
				printf( esc_html_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'new-york-business' ), esc_html(get_the_title()) );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html(_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						 absint($new_york_business_comments_number),
						'comments title',
						'new-york-business'
					)),
					absint(number_format_i18n( $new_york_business_comments_number )),
					esc_html(get_the_title())
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'reply_text'  => '<i class="fa fa-mail-reply" aria-hidden="true" >&nbsp;&nbsp;</i>'. __( 'Reply', 'new-york-business' ),
					)
				);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="screen-reader-text">' . __( 'Previous', 'new-york-business' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'new-york-business' ) . '</span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
			)
		);

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'new-york-business' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
