<div class="popup-holder another">
	<div id="popup4" class="lightbox">
		<div class="popup-area">
			<div class="heading">
				<div class="row">
					<div class="col">
						<?php if ($logo = get_field('logo')):?>
						<img src="<?php echo $logo['sizes']['thumbnail_85x85'];?>" alt="<?php echo $logo['alt'];?>">
						<?php endif;?>
						<strong class="title"><?php the_title( ); ?></strong>
					</div>
					<?php if ($location_address = get_field('location_address')):?>
						<div class="col">
							<h4><?php _e( 'Адрес', 'medservice24' ); ?></h4>
							<address>
								<?php echo $location_address['address'];?>
							</address>
						</div>
					<?php endif;?>
					
					<div class="col">
						<h4><?php _e( 'Время работы', 'medservice24' ); ?>:</h4>
						<?php if ($schedule_works = get_field('schedule_works')) { echo $schedule_works; }?>	
					</div>
				</div>
			</div>
			<div class="popup-body">
				<form action="<?php the_permalink();?>" method="POST" class="popup-form">
					<div class="row another">
						<div class="col">
							<div class="form-group">
								<input name="name" type="text" placeholder="Имя, фамилия*">
							</div>
							<div class="form-group">
								<input name="tel" type="tel" placeholder="Телефон*">
							</div>
							<div class="form-group">
								<input name="email" type="email" placeholder="e-mail*">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<textarea name="messages" placeholder="коментарий"></textarea>
							</div>
						</div>
					</div>
					<div class="row another">
						<?php if ($logo = get_field('logo')):?>	
							<div class="col">
								<div class="img-area">
									<img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
								</div>
							</div>
						<?php endif;?>
						<div class="col">
							<input type="submit" class="btn" value="Заказать препарат">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

