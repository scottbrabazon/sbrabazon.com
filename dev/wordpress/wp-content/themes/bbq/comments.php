<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

// Fist full of comments
if ( ! function_exists( 'custom_comment' ) ) {
	function custom_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?>>

	    	<a name="comment-<?php comment_ID(); ?>"></a>

	      	<div id="li-comment-<?php comment_ID(); ?>" class="comment-container">

				<?php if( get_comment_type() == 'comment' ) { ?>
	                <div class="avatar fl"><?php the_commenter_avatar( $args ); ?></div>
	            <?php } ?>



		   		<div class="comment-entry"  id="comment-<?php comment_ID(); ?>">
				<div class="comment-head">

	                <span class="name"><?php the_commenter_link(); ?> </span>
	                <span class="date"><?php _e( 'on', 'nicethemes' ); ?> <a href="<?php echo get_comment_link(); ?>" title="<?php esc_attr_e( 'Direct link to this comment', 'nicethemes' ); ?>"><?php echo get_comment_date( get_option( 'date_format' ) ); ?></a></span>
	                <span class="edit"><?php edit_comment_link(__( 'Edit', 'nicethemes' ), '', '' ); ?></span>

					<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>

		        <!-- END .comment-head -->
				</div>
				<?php comment_text() ?>

				<?php if ( $comment->comment_approved == '0' ) { ?>
	                <p class='unapproved'><?php _e( 'Your comment is awaiting moderation.', 'nicethemes' ); ?></p>
	            <?php } ?>

	            <!-- END .comment-entry -->
				</div>

			<!-- END .comment-container -->
			</div>

	<?php
	}
}

if ( !function_exists( "the_commenter_link") ) {
	function the_commenter_link() {
	    $commenter = get_comment_author_link();
	    if ( preg_match( '/]* class=[^>]+>/', $commenter ) ) { $commenter = preg_replace( '(]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else { $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter ); }
	    echo $commenter ;
	}
}

if ( ! function_exists( 'the_commenter_avatar' ) ) {
	function the_commenter_avatar($args) {
	    $email = get_comment_author_email();
	    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( "$email",  $args['avatar_size'] ) );
	    echo $avatar;
	}
}

?>

<?php

// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'nicethemes' ) ?></p>

<?php return; } ?>

<?php $comments_by_type = &separate_comments($comments); ?>

<div id="comments">

<?php if ( have_comments() ) : ?>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>

		<h3><?php comments_number(__( 'No comments', 'nicethemes' ), __( '1 comment', 'nicethemes' ), __( '% comments', 'nicethemes' ) );?></h3>
		<ol class="commentlist">

			<?php wp_list_comments( 'avatar_size=50&callback=custom_comment&type=comment' ); ?>

		</ol>

		<div class="navigation">
			<div class="fl"><?php previous_comments_link() ?></div>
			<div class="fr"><?php next_comments_link() ?></div>
			<div class="fix"></div>
		</div><!-- /.navigation -->
	<?php endif; ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>

        <h3 id="pings"><?php _e( 'Trackbacks/Pingbacks', 'nicethemes' ) ?></h3>

        <ol class="pinglist">
            <?php wp_list_comments( 'type=pings&callback=list_pings' ); ?>
        </ol>

	<?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( 'open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<p class="nocomments"><?php _e( 'No comments yet.', 'nicethemes' ) ?></p>

		<?php else : // comments are closed, do nothing. ?>
			<!-- If comments are closed. -->
		<?php endif; ?>

<?php endif; ?>

<!-- END #comments_wrap -->
</div>

<?php if ( 'open' == $post->comment_status ) : ?>

<?php

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields = array(
					'id_form' => 'commentform',
					'id_submit' => 'submit',
					'title_reply' => __('Leave a Comment', 'nicethemes'),
                    'title_reply_to' => __('Leave a Reply to %s', 'nicethemes'),
                    'cancel_reply_link' => __('Cancel Reply', 'nicethemes'),
                    'label_submit' => __('Submit Comment', 'nicethemes'),
					'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
					'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'nicethemes' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
					'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
					'comment_notes_before' => '',
					'comment_notes_after' => '',
					'fields' => apply_filters( 'comment_form_default_fields',
							array(
								'author' => '<p class="comment-form-author">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Name', 'nicethemes' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
								'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Email', 'nicethemes' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
								'url' => '<p class="comment-form-url">' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">' . __( 'Website', 'nicethemes' ) . '</label></p>'
									)
											)
					);

		comment_form( $fields );
?>

<?php endif; // if you delete this the sky will fall on your head ?>