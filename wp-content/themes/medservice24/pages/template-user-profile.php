<?php
/*
Template Name: My Account Template
*/
get_header(); 
if ( is_user_logged_in() ) {
	$user = wp_get_current_user();
	if($user->roles[0] == 'subscriber'){
	

	$my_office = get_field('my_office', 'user_'.$user->ID);	

?>

	<div class="container-fluid">
		<h1 class="post-title"><?php _e( 'Подать заявку на изменение информации', 'medservice24' ); ?></h1>
		<p><?php _e( 'Просмотр кабинета: ', 'medservice24' ); ?><a href="<?php echo get_the_permalink($my_office->ID);?>"><?php echo get_the_title($my_office->ID);?></a></p>
		<?php echo do_shortcode('[contact-form-7 id="156" title="Updates form Cabinet]');?>
	</div>

<?php 
	}
}
get_footer(); ?>