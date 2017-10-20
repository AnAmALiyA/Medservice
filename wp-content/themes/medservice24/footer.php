	</main>
	<footer id="footer">
		<div class="container">
			<div class="row">
				<h2><?php _e( 'Информация', 'medservice24' ); ?></h2>
			</div>
			<div class="row">
				<?php if($service_footer = get_field('service_footer', 'option')) { echo '<div class="col">'.$service_footer.'</div>'; }?>
				<?php if($patient_footer = get_field('patient_footer', 'option')) { echo '<div class="col">'.$patient_footer.'</div>'; }?>
				<div class="col">
					<?php if($contact_footer = get_field('contact_footer', 'option')):?>
						<h3><?php _e( 'Контакты', 'medservice24' ); ?></h3>
						<ul>
							<?php foreach($contact_footer as $row):?>
								<li><?php echo $row['phone'];?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif;?>
					<?php if($email_footer = get_field('email_footer', 'option')) { 
						echo '<p><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:'.$email_footer.'">'.$email_footer.'</a></p>'; 
					}?>
					
					<?php if($rows = get_field('social', 'option')):?>
						<ul class="social">
						<?php foreach($rows as $row):?>
							<li><a class="<?php echo $row['class'];?>" href="<?php echo $row['link'];?>"><img src="<?php echo $row['icon']['url'];?>" alt="<?php echo $row['icon']['alt'];?>"></a></li>
						<?php endforeach; ?>
						</ul>
					<?php endif;?>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/library/jquery.validate.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($){

			$(".popup-form").validate({

					rules: {
						email: { required: true,
							email: true
						},

						name: { required: true,
							minlength: [3]
						},
						messages: { required: true,
							minlength: [5]
						},
						tel: { required: true,
							minlength: [7]
						}
					},

					messages: {
						email: {
							required: "Введите email",
							email: "Введите символ @ "
						},
						name: {
							required: "Введите имя",
							minlength: "Введите не менее 3 символов"
						},
						messages: {
							required: "Введите сообщение",
							minlength: "Введите не менее 5 символов"
						},
						tel: {
							required: "Введите телефон",
							minlength: "Введите не менее 7 цифр"
						}
					},
				})
			});
		</script>
	</body>
	<?php if ( !is_user_logged_in() ) { ?>
		<div class="popup-holder">
			<div id="login" class="lightbox coop-form">
				<h2><?php _e( 'По вопросам сотрудничества обращайтесь', 'medservice24' ); ?></h2>
				<?php echo do_shortcode('[contact-form-7 id="90" title="Contact form Home"]');?>
			</div>
			<div id="register" class="lightbox">
				<?php //echo do_shortcode('[ajax_register]');?>
			</div>
		</div>
	<?php }?>
</html>