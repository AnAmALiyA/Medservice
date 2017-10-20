<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">		
		<script type="text/javascript">
			var pathInfo = {
				base: '<?php echo get_template_directory_uri(); ?>/',
				css: 'css/',
				js: 'js/',
				swf: 'swf/',
			}
		</script>
		<?php wp_head(); ?>
		
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<?php if (is_page_template('pages/template-home.php')):?>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<?php endif;?>
		<?php if (!is_page_template('pages/template-map-search.php')):?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJRj7AGnKyouR_PLTZbwgxXAIxqhzq1V8&callback=initMap"></script>
		<?php endif;?>
	</head>
	<body <?php body_class(); ?>>
		<header id="header">
			<div class="row">
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<?php if($logo = get_field('logo', 'option')):?>
							<img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
						<?php endif;?>
					</a>
				</div>
				
				<div class="select-position">
					<?php echo filter_location_tax();?>
					<div class="select-holder"id="ajax-taxonomy-child">
					</div>
				</div>
				
				
				<div class="reg">
					<ul>
						<?php
						if ( is_user_logged_in() ) {
							echo '<li><a href="/my-account/">Мой кабинет</a></li>';
							//echo '<li>'.do_shortcode('[ajax_login]').'</li>';
						} else {
							echo '<li><a class="lightbox" href="#login">Подать заявку</a></li>';
							echo '<li><a class="lightbox" href="/registrationform/">Регистрация</a></li>';
							echo '<li><a class="lightbox" href="#login-form">Войти</a></li>';
							echo '<div id="login-form">'.do_shortcode('[ajax_login]').'</div>';
							
							//echo '<li><a class="lightbox" href="#register">Зарегистрироваться</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<nav class="main-nav">
				<a href="#" class="opener"><span><?php _e( 'Menu', 'medservice24' ); ?></span></a>
				<?php if( has_nav_menu( 'primary' ) )
						wp_nav_menu( array(
							'container' => false,
							'theme_location' => 'primary',
							'menu_id'        => '',
							'menu_class'     => 'drop',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'walker'         => new Custom_Walker_Nav_Menu
							)
				); ?>
			</nav>
		</header>
		<main role="main" id="main">