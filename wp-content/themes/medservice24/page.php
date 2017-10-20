<?php get_header(); ?>
	<div class="container-fluid">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
			<?php the_post_thumbnail( 'full' ); ?>
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'medservice24' ) ); ?>
		<?php endwhile; ?>
		<?php wp_link_pages(); ?>
		<?php comments_template(); ?>
	</div>
<?php get_footer(); ?>