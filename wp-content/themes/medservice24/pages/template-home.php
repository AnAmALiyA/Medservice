<?php
/*
Template Name: Home Template
*/ 
get_header(); ?>
<section class="visible">
	<div class="container">
		<?php if($title_block_search = get_field('title_block_search', 'option')): ?>
			<h1><?php echo $title_block_search;?></h1>
		<?php endif;?>
		<div class="form-holder">
			<div id="health-facility-doctor" class="search-form">
				
			</div>
		</div>
	</div>
</section>

<section class="section">
<?php 
	$title_news = get_field('title_news');
	$info_news = get_field('info_news');
	$news = get_field('news');
	if (!empty($title_news) && !empty($info_news) && !empty($news)):
?>	
	<div class="home-news">
		<div class="title">
			<h2><?php echo $title_news;?></h2>
			<div class="desc">
				<?php echo $info_news;?>
			</div>
		</div>
		<div class="news-holder">
			<?php foreach($news as $row):?>
				<article class="item-holder">
					<a href="<?php echo get_permalink( $row->ID ); ?>" class="item">
					<?php $url_img = wp_get_attachment_image_src(get_post_thumbnail_id($row->ID), 'thumbnail_230x115');?>
						<img src="<?php echo $url_img[0];?>" alt="<?php echo get_the_title( $row->ID ); ?>">
						<div class="desc">
							<h3><?php echo get_the_title( $row->ID ); ?></h3>
							<p><?php echo get_the_excerpt( $row->ID ); ?></p>
						</div>
						<span class="btn-more"><?php _e( 'Читать далее', 'medservice24' ); ?></span>
					</a>
				</article>
			<?php endforeach;?>
		</div>
	</div>
<?php endif;?>

<?php 
	$title_shares = get_field('title_shares');
	$description_shares = get_field('description_shares');
	$post_shares = get_field('post_shares');
	if (!empty($title_news) && !empty($description_shares) && !empty($post_shares)):
?>	
	<div class="home-stock box">
		<div class="title">
			<h2><?php echo $title_shares;?></h2>
			<div class="desc">
				<?php echo $description_shares;?>
			</div>
		</div>
		<div class="stock-holder">
			<?php foreach($post_shares as $shares):?>
				<article class="item-holder">
					<a href="<?php echo get_permalink( $shares->ID ); ?>" class="item">
						<?php $url_img = wp_get_attachment_image_src(get_post_thumbnail_id($shares->ID), 'thumbnail_201x154');?>
						<img src="<?php echo $url_img[0];?>" alt="<?php echo get_the_title( $shares->ID ); ?>">
						<div class="desc">
							<h3><?php echo get_the_title( $shares->ID ); ?></h3>
							<p><?php echo get_the_excerpt( $shares->ID ); ?></p>
						</div>
						<span class="btn-more"><?php _e( 'Читать далее', 'medservice24' ); ?></span>
					</a>
				</article>
			<?php endforeach;?>
		</div>
	</div>
<?php endif;?> 
<?php 
	$title_polls = get_field('title_polls');
	$description_polls = get_field('description_polls');
	if (!empty($title_polls) && !empty($description_polls)):
?>	
	<div class="quiz-home">
		<div class="title">
			<h2><?php echo $title_polls;?></h2>
			<div class="desc">
				<?php echo $description_polls;?>
			</div>
		</div>
		<div class="plugin-holder">
			<?php if (is_active_sidebar('sidebar-polls-home')) : ?>
				<?php dynamic_sidebar('sidebar-polls-home'); ?>	
			<?php endif; ?>
		</div>
	</div>
<?php endif;?> 
</section>

<?php if (is_active_sidebar('sidebar-subscribe-home')) : ?>
	<?php dynamic_sidebar('sidebar-subscribe-home'); ?>	
<?php endif; ?>
		
<section class="section">
<?php 
	$title_ads = get_field('title_ads');
	$description_ads = get_field('description_ads');
	$post_obyavlenia = get_field('post_ads');
	if (!empty($title_ads) && !empty($description_ads) && !empty($post_obyavlenia)):
?>	
	<div class="poster-home">
		<!-- poster-home -->
		<div class="title">
			<h2><?php echo $title_ads;?></h2>
			<div class="desc">
				<?php echo $description_ads;?>
			</div>
		</div>
		<div class="poster-holder">
			<?php foreach($post_obyavlenia as $ads):?>
				<article class="item-holder">
					<a href="<?php echo get_permalink( $ads->ID ); ?>" class="item">
						<div class="flip"><i class="fa fa-info" aria-hidden="true"></i></div>
						<div class="desc">
							<p><?php echo get_the_excerpt( $ads->ID ); ?></p>
						</div>
						<div class="btn-more"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</a>
				</article>
			<?php endforeach;?>
		</div>
		<a href="<?php echo home_url(); ?>/?post_type=obyavlenia" class="more"><?php _e( 'Смотреть все', 'medservice24' ); ?></a>
	</div>
<?php endif;?>
	
	<div class="cooperation box">
		<div class="left">
			<?php if ($title_home_form_contact = get_field('title_home_form_contact')) { echo '<h2>'.$title_home_form_contact.'</h2>';} ?>	
				<dl>
				<?php if ($phone_home_form_contact = get_field('phone_home_form_contact')) { 
					echo '<dt><i class="fa fa-phone" aria-hidden="true"></i></dt>';
					echo '<dd><a href="mailto:'.$phone_home_form_contact.'">'.$phone_home_form_contact.'</a></dd>';
				} ?>
					
				<?php if ($email_home_form_contact = get_field('email_home_form_contact')) {
					echo '<dt><i class="fa fa-envelope-o" aria-hidden="true"></i></dt>';
					echo '<dd><a href="mailto:'.$email_home_form_contact.'">'.$email_home_form_contact.'</a></dd>';
				} ?>
			</dl>
		</div>
		
		<?php if ($display_home_form_contact = get_field('display_home_form_contact')):?>	
			<div class="right">
				<?php echo '<div class="coop-form">'.do_shortcode('[contact-form-7 id="$display_home_form_contact" title="Contact form Home"]').'</div>';?>
			</div>
		<?php endif;?>
	</div>
</section>
	
<?php get_footer(); ?>