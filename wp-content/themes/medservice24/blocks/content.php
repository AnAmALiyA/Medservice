
<?php if ( is_single() ) :
	the_title( '<h1 class="post-title">', '</h1>');
	the_content();
else:?>
	<div class="post-list">
		<?php the_title( '<h1 class="post-title">', '</h1>');?>
		<div class="wrap">
			<?php 
				theme_the_excerpt();
				echo '<a class="btn" href="'.get_the_permalink().'">Просмотреть</a>';
			?>
		</div>
	</div>
<?php endif; ?>
	

