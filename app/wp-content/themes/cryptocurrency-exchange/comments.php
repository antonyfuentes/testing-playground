<?php
/**
 * @package cryptocurrency-exchange
 */
if( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php 	if( have_comments() ) { //We have comments ?>
	<h4 class="comment-title"><?php comments_number ( __('No Comments', 'cryptocurrency-exchange'), __( '1 Comment', 'cryptocurrency-exchange'), __('% Comments', 'cryptocurrency-exchange') ); ?> <?php esc_html_e('on', 'cryptocurrency-exchange');?> "<?php the_title(); ?>"</h4>
		<ol class="comments-list">
			<?php
				$cryptocurrency_exchange_args = array (
					'walker'				=> null,
					'max_depth'				=> '4',
					'style'					=> 'div',
					'callback'				=> null,
					'end-callback'			=> null,
					'type'					=> 'all',
					'reply_text'			=> esc_html__('Reply &raquo;','cryptocurrency-exchange'),
					'page'					=> null,
					'per_page'				=> null,
					'avatar_size'			=> 32,
					'reverse_top_level'		=> null,
					'reverse_children'		=> '',
					'format'				=> 'html5',
					'short_ping'			=> false,
					'echo'					=> true
				);				
				wp_list_comments( $cryptocurrency_exchange_args );
			?>
		</ol>
		<?php		if( !comments_open() ) { ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed', 'cryptocurrency-exchange'); ?></p>	
			<?php
		} //comments open end
	} //have comments end
	?>
	<nav id="comment-nav-below">
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'cryptocurrency-exchange' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'cryptocurrency-exchange' ) ); ?></div>
	</nav>
	<?php 
	$cryptocurrency_exchange_args = array(
		'class_submit'  => 'btn btn-round btn-d',
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun','cryptocurrency-exchange' ) . '</label><br /><textarea style="line-height: 50px;"class="input-lg form_width comment-bar" id="comment" name="comment"></textarea></p>',
		//'author'  => 'Submit Comment',
		'label_submit' 	=> esc_html__('Send Message','cryptocurrency-exchange'),
	);
	
		
	// Add custom meta (ratings) fields to the default comment form
	// Default comment form includes name, email address and website URL
	// Default comment form elements are hidden when user is logged in

	add_filter('comment_form_default_fields', 'cryptocurrency_exchangecustom_fields');
	function cryptocurrency_exchangecustom_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields[ 'author' ] = '<p class="comment-form-author">'.
		  '<label for="author">' . __( 'Name','cryptocurrency-exchange' ) . '</label>'.
		  ( $req ? '<span class="required">*</span>' : '' ).
		  '<input class="form-control input-lg" id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
		  '" size="30" tabindex="1"' . $aria_req . ' /></p>';
		
		$fields[ 'email' ] = '<p class="comment-form-email">'.
		  '<label for="email">' . __( 'Email','cryptocurrency-exchange' ) . '</label>'.
		  ( $req ? '<span class="required">*</span>' : '' ).
		  '<input class="form-control input-lg" id="email" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
		  '" size="30"  tabindex="2"' . $aria_req . ' /></p>';

		$fields[ 'url' ] = '<p class="comment-form-url">'.
		  '<label for="url">' . __( 'Website','cryptocurrency-exchange' ) . '</label>'.
		  '<input class="form-control input-lg" id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
		  '" size="30"  tabindex="3" /></p>';
		return $fields;
	}
	comment_form( $cryptocurrency_exchange_args ); ?>
</div><!-- comments-area -->