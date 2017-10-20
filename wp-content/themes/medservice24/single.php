<?php get_header(); ?>

	<div class="container-fluid">
		<?php 
		while ( have_posts() ) : the_post(); 
		$post_type = get_post_type( $post->ID );
			if ($post_type == 'health_facility') {
				get_template_part( 'blocks/content-health_facility', get_post_type());
				get_template_part( 'blocks/popup_form/form-application-doctor-health-facility', get_post_type());
			}elseif ($post_type == 'pharmacy') {
				get_template_part( 'blocks/content-pharmacy', get_post_type());
				get_template_part( 'blocks/popup_form/form-application-pharmacy', get_post_type());
			}elseif ($post_type == 'doctor') { 
				get_template_part( 'blocks/content-doctor', get_post_type());
				get_template_part( 'blocks/popup_form/form-application-doctor-health-facility', get_post_type());
			}else{ 
				get_template_part( 'blocks/content', get_post_type());
				//comments_template();
				//get_template_part( 'blocks/pager-single', get_post_type() );
			}
		
		endwhile; ?>
	</div>
<?php get_footer(); ?>