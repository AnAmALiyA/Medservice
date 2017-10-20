<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
?>

<?php 
$r = new WP_Query( array(
	'post_type' => array( 'health_facility', 'doctor'),
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'p' => $_POST['id_post']
));
if ( $r->have_posts() ) :
	while ( $r->have_posts() ) : $r->the_post(); ?>
		<div class="post-list">
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
							<?php echo $name;?> <?php echo $middle_name;?> <?php echo $surname;?>
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
								
								<?php if($directions_health_facilities = get_field('directions_health_facilities')):?>
									<div class="col-holder">
										<h2><?php _e( 'Направления', 'medservice24' ); ?></h2>
										<ul class="list">
											<?php foreach($directions_health_facilities as $row):?>
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
								<a href="<?php the_permalink();?>" class="btn"><?php _e( 'Подробнее', 'medservice24' ); ?></a>
								<?php if ($status_institution = get_field('status_institution')) { echo '<span class="btn-closed">'.$status_institution.'</span>'; }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; 
endif;
wp_reset_postdata();
?>