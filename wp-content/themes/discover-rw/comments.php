<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package discover-rw
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

<div id="comments" class="comments-area cont post-cmts">
	<h2 class="post-cmts-title"><?php esc_html_e('Comments', 'discover-rw'); ?></h2>
	<?php if (get_comments_number() > 0) : ?>
		<p class="post-cmts-count"><?php echo intval(get_comments_number()); ?> <?php esc_html_e('comments', 'discover-rw'); ?></p>
	<?php endif; ?>

	<div class="post-cmts-form">
		<p class="post-cmts-form-img">
			<?php echo get_avatar( get_current_user_id(), 80 ); ?>
		</p>
		<?php
		$commenter = wp_get_current_commenter();
		$html_req = ( $req ? " required='required'" : '' );
		$html5    = 'html5';
		comment_form( array(
			'title_reply_before' => '',
			'title_reply_after'  => '',
			'title_reply'          => '',
			'fields' => array(
				'author' => '<input placeholder="'.esc_attr__('Name', 'discover-rw').'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" maxlength="245"' . $html_req . ' />',
				'email'  => '<input placeholder="'.esc_attr__('E-mail', 'discover-rw').'" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" maxlength="100"' . $html_req  . ' />',
				'url' => '',
			),
			'comment_field'        => '<textarea placeholder="'.esc_attr__('Enter your comment here..', 'discover-rw').'" id="comment" name="comment" maxlength="65525" required="required"></textarea>',
			'comment_notes_before' => '',

			'class_form' => 'post-addcomment',
			'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s <i class="fa fa-angle-right"></i></button>',
			'label_submit'         => esc_html__( 'Send', 'discover-rw' ),
			'logged_in_as'         => '<p class="logged-in-as"><a class="logged-in-as-profile" href="'.get_edit_user_link().'" aria-label="'.sprintf( esc_html__( '%s. Edit your profile.', 'discover-rw' ), $user_identity ).'">'.$user_identity.'</a> (<a href="'.wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ).'">'.esc_html__('Log out?', 'discover-rw').'</a>)'
				. '</p>'
		) );
		?>
	</div>

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<div class="post-cmts">
			<ul class="comment-list post-cmts-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'avatar_size' => 80,
					'callback'    => 'discover_rw_comment',
				) );
				?>
			</ul><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<?php
				paginate_comments_links( array(
					'prev_text'    => '<i class="fa fa-angle-left"></i> '.esc_html__('Prev', 'discover-rw'),
					'next_text'    => esc_html__('Next', 'discover-rw').' <i class="fa fa-angle-right"></i>',
					'type'      => 'list',
				) );
				?>
			<?php endif; // Check for have_comments(). ?>

		</div>

		<?php
	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'discover-rw' ); ?></p>
		<?php
	endif;
	?>

</div><!-- #comments -->
