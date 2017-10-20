<?php
/*
Template Name: Clinic & Doctors & Pharmacy Search Page
*/

get_header();


if($_POST){
	$tax_id = $_POST['tax_id'];
	$health_facility_id = $_POST['health-facility'];
	$doctor_id = $_POST['doctor-id'];
	$pharmacy_id = $_POST['pharmacy-id'];
	$direction = $_POST['direction'];
	$direction_type = $_POST['direction_type'];
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	
}elseif($_GET){

	$tax_id = $_GET['area-id'];
	$health_facility_id = $_GET['health-facility'];
	$doctor_id = $_GET['doctor-id'];
	$pharmacy_id = $_GET['pharmacy-id'];
	$direction = $_GET['direction'];
	$direction_type = $_GET['direction_type'];
	$insurance_company = $_GET['insurance_company'];
	
	if($_GET['pagnav']){
		$paged = $_GET['pagnav']; 
	}else{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	}
	
	$args_get = array(
		'meta_query' => array(
			array(
				'key'     => 'insurance_companies',
				'value'   => $_GET['insurance_company'],
				'compare' => 'LIKE',
			)
		)
	);
}

$custom_url = home_url() .'/search/?';
$custom_url .= $tax_id ? 'area-id='.$tax_id : '';
$custom_url .= $health_facility_id ? '&health-facility='.$health_facility_id : '';
$custom_url .= $doctor_id ? '&doctor-id='.$doctor_id : '';
$custom_url .= $pharmacy_id ? '&pharmacy-id='.$pharmacy_id : '';
$custom_url .= $direction ? '&direction='.$direction : '';
$custom_url .= $direction_type ? '&direction_type='.$direction_type : '';
if(!$_GET['insurance_company']){
	$custom_url .= $insurance_company ? '&insurance_company='.$insurance_company : '';
}else{
	$custom_url_next_prev = $insurance_company ? '&insurance_company='.$insurance_company : '';
}

if(!empty($tax_id) && empty($doctor_id) && empty($health_facility_id) && empty($pharmacy_id) && empty($direction)){

	$args = array(
		'post_type' => array( 'health_facility', 'doctor', 'pharmacy'),
		'post_status' => 'publish',
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'location_geo',
				'field'    => 'id',
				'terms'    => array( $tax_id ),
			)
		),
		'meta_key' => 'ratings_average', 
		'orderby' => 'meta_value_num', 
		'order' => 'DESC'
	);
	
	
}elseif(!empty($tax_id) && !empty($direction)  && !empty($direction_type)){
	$args = array(
		'post_type' => array( 'health_facility', 'doctor'),
		'post_status' => 'publish',
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'location_geo',
				'field'    => 'id',
				'terms'    => array( $tax_id ),
			)
		),
		'meta_query' => array(
			array(
				'key'     => $direction_type,
				'value'   => $direction,
				'compare' => 'LIKE'
			)
		),
		'meta_key' => 'ratings_average', 
		'orderby' => 'meta_value_num', 
		'order' => 'DESC'
	);
}else{
	if(!empty($health_facility_id)){
		$args = array(
			'post_type'   => 'health_facility',
			'post_status' => 'publish',
			'paged' => $paged,
			'post__in' => array( $health_facility_id ),
			'tax_query' => array(
				array(
					'taxonomy' => 'location_geo',
					'field'    => 'id',
					'terms'    => array( $tax_id ),
				)
			),
			'meta_key' => 'ratings_average', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC'
			
		);
		
	}elseif(!empty($doctor_id)){
		$args = array(
			'post_type'   => 'doctor',
			'post_status' => 'publish',
			'paged' => $paged,
			'post__in' => array( $doctor_id ),
			'tax_query' => array(
				array(
					'taxonomy' => 'location_geo',
					'field'    => 'id',
					'terms'    => array( $tax_id ),
				)
			),
			'meta_key' => 'ratings_average', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC'
		);
		
	}
	elseif(!empty($pharmacy_id)){
		$args = array(
			'post_type'   => 'pharmacy',
			'post_status' => 'publish',
			'paged' => $paged,
			'post__in' => array( $pharmacy_id ),
			'tax_query' => array(
				array(
					'taxonomy' => 'location_geo',
					'field'    => 'id',
					'terms'    => array( $tax_id ),
				)
			),
			'meta_key' => 'ratings_average', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC'
		);
	}
}
if($_GET){
	$result = array_merge($args, $args_get);
	$r = new WP_Query( $result );
}elseif($_POST){
	$r = new WP_Query( $args );
}
?>
	<div class="container-fluid">
	
		<?php $insurance_company = get_post_meta( 110 , 'field_580e28ae3b59a', true );?>
		<div class="select-block">
			<label for="search-company"><?php _e( 'Фильтр страховых компаний', 'medservice24' ); ?>:</label>
			<select id="search-company" size="1" name="searching" onchange="document.location.href=this.value"> 
				<option value="<?php echo $custom_url.'&insurance_company=0';?>">
				<?php _e( 'Выбрать', 'medservice24' ); ?>
				</option>
				
				
				<?php 
					foreach($insurance_company['choices'] as $row){
					$select = '';
					if($_GET['insurance_company'] == $row){
						$select = 'selected="selected"';
					}
					
					echo '<option '.$select.' value="'.$custom_url.'&insurance_company='.$row.'">'.$row.'</option>';
					
					//echo '<option '.$select.' value="'. home_url() .'/search/?area-id='.$tax_id.'&health-facility='.$health_facility_id.'&doctor-id='.$doctor_id.'&pharmacy-id='.$pharmacy_id.'&direction='.$direction.'&direction_type='.$direction_type.'&insurance_company='.$row.'">'.$row.'</option>';
				}?>
			</select>
		</div>
<?php
if ( $r->have_posts() ) :
	while ( $r->have_posts() ) : $r->the_post();
	
	if($post->post_type == 'health_facility'){
		$name_type_post = 'Медицинский центр';
	}elseif($post->post_type == 'pharmacy'){
		$name_type_post = 'Аптека';
	}elseif($post->post_type == 'doctor'){
		$name_type_post = 'Врач';
	}
	?>
		<div class="post-list">
			<h1 class="post-title"><?php echo $name_type_post;?></h1>
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
	<?php endwhile; ?>
	
	<?php $max_num_pages = $r->max_num_pages;
	if($max_num_pages > 1):?>
		<nav class="navigation pagination" role="navigation">
		
			<?php 
			if($max_num_pages > 1 && $paged!= 1){
				$pagnav_prev = $paged-1;
				echo '<a class="prev page-numbers" href="'. $custom_url . $custom_url_next_prev .'&pagnav='.$pagnav_prev.'">Предыдущая страница</a>';
			}
			
			for( $i = 1; $i <= $max_num_pages; $i++): 
				if($paged == $i){
					echo '<span class="page-numbers current">'.$i.'</span>';
				}else{
					echo '<a class="page-numbers" href="'. $custom_url . $custom_url_next_prev .'&pagnav='.$i.'">'.$i.'</a>';
				}
			endfor;
			
			if($max_num_pages != $paged){
				$pagnav_next = $paged+1;
				echo '<a class="next page-numbers" href="'. $custom_url . $custom_url_next_prev .'&pagnav='.$pagnav_next.'">Следущая страница</a>';
			}
			
			?>
		</nav>
	<?php endif;?>
	</div>
<?php else:?>
	<div class="container-fluid">
		<div class="post-list">
			<h1 style="text-align: center;" class="post-title"><?php _e( 'По Вашему запросу нет предложений!', 'medservice24' ); ?></h1>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
	<?php get_template_part( 'blocks/pager' ); ?>
<?php get_footer(); ?>