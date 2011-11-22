<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<?php previous_comments_link(); delim_comment_link(); next_comments_link() ?>

	<ol>
	    <?php wp_list_comments(array('avatar_size'=>32, 'reply_text'=>'Reply')); ?>
	</ol>

	<?php previous_comments_link(); delim_comment_link(); next_comments_link() ?>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<h3><?php comment_form_title( 'Leave a comment …', 'Reply to %s …' ); ?></h3>

	<p><?php cancel_comment_reply_link(); ?></p>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

		<p>You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" title="View and edit your profile"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>

		<?php else : ?>

		<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>

		<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>

		<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
		<label for="url">Website</label></p>

		<?php endif; ?>

		<textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea>

		<p><strong>You may use the following tags to format your comment:</strong></p>
		<p><code><?php echo allowed_tags(); ?></code></p>

		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>