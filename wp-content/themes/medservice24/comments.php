<?php

// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) {
	?> <p><?php _e( 'This post is password protected. Enter the password to view comments.', 'medservice24' ); ?></p> <?php
	return;
}

if ( comments_open() ) : 
global $wpdb;
$comments_post = $wpdb->get_results('
		SELECT *
		FROM `wp_comments`
		WHERE `comment_approved` = 1
		AND `comment_post_ID` = '.$post->ID.'
		ORDER BY `wp_comments`.`comment_date` DESC
		LIMIT 0 , 60
	');
?>
	<?php if ( have_comments() ) : ?>
		<div class="carousel">
			<div class="mask">
				<div class="slideset">
					<div class="slide">
						<div class="select-holder">
							<div id="comments-block" >
								<?php comments_number( __('No Responses', 'medservice24' ), __( 'One Response', 'medservice24' ), __( '% Responses', 'medservice24' ) );?>
							</div>
						</div>
						<div class="commentlist more">
						<?php 
						$count_comment = 1;
						foreach($comments_post as $item):
							if ($count_comment%2 == 1 and $count_comment != 1) { ?> 
								</div>
							</div>
							<div class="slide">
								<div class="select-holder">
									<div id="comments-block" >
										<?php comments_number( __('No Responses', 'medservice24' ), __( 'One Response', 'medservice24' ), __( '% Responses', 'medservice24' ) );?>
									</div>
								</div>
								<div class="commentlist more">
							<?php } ?>
								<div class="commentlist-item">
									<div id="comment-1" class="comment even thread-even depth-1">
										<div class="avatar-holder">
											<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.png" alt="avatar">
										</div>
										<div class="commentlist-holder">
											<p class="edit-link"><a href="#" class="comment-edit-link"><?php echo $item->comment_author;?></a></p>
											<p><?php echo $item->comment_content;?></p>
										</div>
									</div>
								</div>
							
						<?php $count_comment++;
						endforeach;?>
						</div>
					</div>
				</div>
			</div>
			
			<a class="btn-next" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a class="btn-prev" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	<?php endif; ?>
	<div class="section respond">
		<?php comment_form(); ?>
	</div>
	
<?php else : ?>
	<?php if ( is_singular( array( 'post' ) ) ) : ?>
		<p><?php _e( 'Comments are closed.', 'medservice24' ); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php // Display Comment Error Message. Place before comment_form() function and anywhere else.
		if ($_GET['comment_error_msg']) { ?>
			<div class="comment_error_message"><?php echo $_GET['comment_error_msg']; ?></div>
		<?php   } ?>