<section id="comments">
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>
<!-- Post comments -->		
		
			<?php if ($comments) : ?>
<!--Comment form-->
			<section id="commentsform">
				<div class="commentsheadline"><a name="hrcommentsform">Leave a Comment</a></div>
			
				<?php if ('open' == $post->comment_status) : ?>
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
				<?php else : ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( $user_ID ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
				<?php else : ?>
					<?php endif; ?>
					<textarea name="comment" id="comment"></textarea>
					<div class="fields">
						<input type="text" name="author" class="field" id="author" value="<?php echo $comment_author; ?>" onfocus="this.value=''"/><label for="author">Name (required)</label>
						<input type="text" name="email" class="field" id="email" value="<?php echo $comment_author_email; ?>" onfocus="this.value=''" /><label for="email">Email (required)</label>
						<input type="text" name="url" class="field" id="url" value="<?php echo $comment_author_url; ?>" onfocus="this.value=''" /><label for="url">URL</label>
					</div><!--#fields end-->
				<div class="clearfix"></div>
				<input class="submitbutton" name="submit" type="submit" id="submit" value="Submit" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<div class="clearfix"></div>
				<?php do_action('comment_form', $post->ID); ?>
				</form>
				<?php endif; // If registration required and not logged in ?>
			<?php endif; // if you delete this the sky will fall on your head ?>	
			</section><!--#commentsform end-->	
			
<!--Comments-->	
			<?php foreach ($comments as $comment) : ?>
			<div class="comment">
				<div class="commenttitle"><?php comment_author_link() ?>
				 <span>// <?php comment_date('j M Y') ?></span>
				</div><!--.commenttitle end-->
				<p>
				<?php if ($comment->comment_approved == '0') : ?>
					<em>Your comment is pending.</em>
				<?php endif; ?>
				<?php comment_text() ?>
				</p>
			</div><!--.comment end-->
			<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>
			<?php endforeach; /* end for each comment */ ?>  
<!--No Comments Form-->	
			<?php else : // this is displayed if there are no comments so far ?>
			<section id="commentsform">
				<div class="commentsheadline"><a name="hrcommentsform">Leave a Comment</a></div>
			
				<?php if ('open' == $post->comment_status) : ?>
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
				<?php else : ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( $user_ID ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
				<?php else : ?>
					<?php endif; ?>
					<textarea name="comment" id="comment"></textarea>
					<div class="fields">
						<input type="text" name="author" class="field" id="author" value="<?php echo $comment_author; ?>" onfocus="this.value=''"/><label for="author">Name (required)</label>
						<input type="text" name="email" class="field" id="email" value="<?php echo $comment_author_email; ?>" onfocus="this.value=''" /><label for="email">Email (required)</label>
						<input type="text" name="url" class="field" id="url" value="<?php echo $comment_author_url; ?>" onfocus="this.value=''" /><label for="url">URL</label>
					</div><!--#fields end-->
					
					
				<div class="clearfix"></div>
				<input class="submitbutton" name="submit" type="submit" id="submit" value="Submit" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<div class="clearfix"></div>
				<?php do_action('comment_form', $post->ID); ?>
				</form>
				<?php endif; // If registration required and not logged in ?>
			<?php endif; // if you delete this the sky will fall on your head ?>	
			</section><!--#commentsform end-->	
			
		
		<?php endif; ?>
		</section><!--#comments end-->