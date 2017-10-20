<div class="popup-holder another">
	<div id="popup3" class="lightbox">
		<div class="popup-area">
			<div class="heading">
				<div class="row">
					<div class="col">
						<?php 
						$name = get_field('name');
						$middle_name = get_field('middle_name');
						$surname = get_field('surname');
						if ($name && $middle_name && $surname):?>	
							<strong class="name">
								<?php echo $surname;?><br>
								<?php echo $name;?>
								<?php echo $middle_name;?>
							</strong>
						<?php endif;?>
						
						<?php if($post_type == 'health_facility'):?>
							<?php if ($logo = get_field('logo')):?>	
								<div class="col">
									<div class="img-area">
										<img src="<?php echo $logo['sizes']['thumbnail_85x85'];?>" alt="<?php echo $logo['alt'];?>">
									</div>
								</div>
							<?php endif;?>
						<?php endif;?>
					</div>
					
					<div class="col">
						<?php if($post_type == 'health_facility'):?>
							<strong class="title another"><?php the_title( ); ?></strong>
						<?php elseif($post_type == 'doctor'):?>
							<strong class="title another"><?php _e( 'Med советник 24', 'medservice24' ); ?></strong>
						<?php endif;?>
					</div>
					
					<?php if ($location_address = get_field('location_address')):?>
						<div class="col">
							<h4><?php _e( 'Адрес', 'medservice24' ); ?></h4>
							<address>
								<?php echo $location_address['address'];?>
							</address>
						</div>
					<?php endif;?>
					
				</div>
			</div>
			<div class="popup-body">
				<form action="<?php the_permalink();?>" method="POST" class="popup-form">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input name="name" class="rfield" type="text" placeholder="Имя, фамилия*">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input name="tel" class="rfield" type="tel" placeholder="Телефон*">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input name="email" class="rfield" type="email" placeholder="e-mail*">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div id="datepicker_2" class="datepicker-holder"></div>
							<input id="years" type="hidden" name="years">
							<input id="month" type="hidden" name="month">
							<input id="date" type="hidden" name="date">
						</div>
						<div class="col">
							<div class="time-box">
								<div class="heading-box">
									<strong class="title">Время</strong>
								</div>
								<div class="body-box">
									<div class="radio-box">
										<input id="span_1" type="radio" name="time" value="9-00">
										<label for="span_1">9-00</label>
									</div>
									<div class="radio-box">
										<input id="span_2" type="radio" name="time" value="10-00">
										<label for="span_2">10-00</label>
									</div>
									<div class="radio-box">
										<input id="span_3" type="radio" name="time" value="11-00">
										<label for="span_3">11-00</label>
									</div>
									<div class="radio-box">
										<input id="span_4" type="radio" name="time" value="12-00">
										<label for="span_4">12-00</label>
									</div>
									<div class="radio-box">
										<input id="span_5" type="radio" name="time" value="13-00">
										<label for="span_5">13-00</label>
									</div>
									<div class="radio-box">
										<input id="span_6" type="radio" name="time" value="14-00">
										<label for="span_6">14-00</label>
									</div>
									<div class="radio-box">
										<input id="span_7" type="radio" name="time" value="15-00">
										<label for="span_7">15-00</label>
									</div>
									<div class="radio-box">
										<input id="span_8" type="radio" name="time" value="16-00">
										<label for="span_8">16-00</label>
									</div>
									<div class="radio-box">
										<input id="span_9" type="radio" name="time" value="17-00">
										<label for="span_9">17-00</label>
									</div>
									<div class="radio-box">
										<input id="span_10" type="radio" name="time" value="18-00">
										<label for="span_10">18-00</label>
									</div>
									<div class="radio-box">
										<input id="span_11" type="radio" name="time" value="19-00">
										<label for="span_11">19-00</label>
									</div>
									<div class="radio-box">
										<input id="span_12" type="radio" name="time" value="20-00">
										<label for="span_12">20-00</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<textarea name="messages" class="rfield" placeholder="коментарий"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
					
						<?php if ($logo = get_field('logo')):?>	
							<div class="col">
								<div class="img-area">
									<img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
								</div>
							</div>
						<?php endif;?>
						
						<div class="col">
							<div class="area">
								<input type="checkbox" id="check_1" name="doctor_child">
								<label for="check_1">Врач для ребенка</label>
							</div>
							<div class="area">
								<input type="checkbox" id="check_2" name="doctor_home">
								<label for="check_2">Вызов врача на дом</label>
							</div>
						</div>
						<div class="col">
							<input type="submit" class="btn" value="Отправить заявку">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>