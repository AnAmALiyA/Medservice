<h1 class="post-title"><?php _e( 'Врач', 'medservice24' ); ?></h1>
<?php if(!empty($_POST['name']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['messages'])):?>
	<div class="info-application">
		<?php get_template_part( 'blocks/popup_form/email-application-health', get_post_type());?> 
	</div>
<?php endif;?>
<div class="wrap">
	<div class="wrap-img">
		<?php if ($bg_image = get_field('bg-image')):?>	
			<img src="<?php echo $bg_image['sizes']['thumbnail_1170x130'];?>" alt="<?php echo $bg_image['alt'];?>">
		<?php else:?>	
			<img src="<?php echo get_template_directory_uri(); ?>/images/bg-clinic.jpg" alt="<?php the_title( ); ?>">
		<?php endif;?>
		<strong class="title-name">
		<?php 
		$name = get_field('name');
		$middle_name = get_field('middle_name');
		$surname = get_field('surname');
		if ($name && $middle_name && $surname):?>
			<?php echo $surname;?>		
			<?php echo $name;?>
			<?php echo $middle_name;?>
		<?php else:?>
			<?php the_title( ); ?>
		<?php endif;?>
		</strong>
	</div>
	<div class="main-box">
		<div class="post-box">
			<div class="left-box">
			
				<?php if ($logo = get_field('logo')):?>	
					<div class="logo-box">
						<img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
					</div>
				<?php endif;?>
				
				<div class="stars">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
				</div>
			</div>
			<div class="right-box">
				<div class="col">
					<?php if ($location_address = get_field('location_address')):?>
						<div class="col-holder">
							<h2><?php _e( 'Адрес', 'medservice24' ); ?></h2>
							<address>
								<div class="col-body">
									<?php echo $location_address['address'];?>
								</div>
							</address>
						</div>
					<?php endif;?>
					
					<?php if($directions_doctor = get_field('directions_doctor')):?>
						<div class="col-holder">
							<h2><?php _e( 'Направления', 'medservice24' ); ?></h2>
							<ul class="list">
								<?php foreach($directions_doctor as $row):?>
									<li><a href="#"><?php echo $row;?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif;?>
				</div>
				<div class="col">
					<div class="col-area">
						<div class="col-holder">
							<h2><?php _e( 'Время работы', 'medservice24' ); ?>:</h2>
							<?php if ($schedule_works = get_field('schedule_works')) { echo $schedule_works; }?>	
						</div>
						
						<?php if($phone = get_field('phone', get_the_ID())):?>
							<div class="col-holder">
								<h2><?php _e( 'Телефон', 'medservice24' ); ?>:</h2>
								<ul>
									<?php foreach($phone as $row):?>
										<li>
											<a href="tel:<?php echo $row['number'];?>">
											(<?php echo substr($row['number'], 0, 3);?>) <?php echo substr($row['number'], 3, 3);?> <?php echo substr($row['number'], 6, 2);?> <?php echo substr($row['number'], 8, 3);?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif;?>
					</div>
					<div class="col-holder last">
						<h2><?php _e( 'Описание', 'medservice24' ); ?></h2>
						<?php the_content(); ?>
					</div>
					<a href="#popup3" class="btn lightbox"><?php _e( 'Записаться на прием', 'medservice24' ); ?></a>
				</div>
			</div>
		</div>
		<div class="tab-box">
			<ul class="tabset">
				<li><a href="#tab1"><?php _e( 'Отзывы', 'medservice24' ); ?></a></li>
				<li><a href="#tab2"><?php _e( 'Новости', 'medservice24' ); ?></a></li>
				<li><a href="#tab3"><?php _e( 'Акции', 'medservice24' ); ?></a></li>
				<li><a href="#tab4"><?php _e( 'На Карте', 'medservice24' ); ?></a></li>
			</ul>
			<div class="tab-content">
				<div id="tab1">
					<?php comments_template();?>
				</div>
				<?php if($news_post = get_field('news_post', get_the_ID())):?>
					<div id="tab2">
						<?php foreach($news_post as $row):?>
							<?php echo $row['title'];?>
							<?php echo $row['description'];?>
						<?php endforeach; ?>
					</div>
				<?php endif;?>
				<?php if($shares_post = get_field('shares_post', get_the_ID())):?>
					<div id="tab3">
						<?php foreach($shares_post as $row):?>
							<?php echo $row['title'];?>
							<?php echo $row['description'];?>
						<?php endforeach; ?>
					</div>
				<?php endif;?>
				<?php if (!empty($location_address)):?>
					<div id="tab4">
						<h2><?php echo $location_address['address']; ?></h2>

						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location_address['lat']; ?>" data-lng="<?php echo $location_address['lng']; ?>"></div>
						</div>
					</div>
				<?php endif;?>
				
			</div>
		</div>
	</div>
</div>