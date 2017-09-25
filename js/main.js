jQuery(document).ready(function($){

	$('body').on('click', '.add_promo_js', function() {
		addFormMarkup('promo');
	});

	$('body').on('click', '.add_news_js', function() {
		addFormMarkup('news');
	});

	$('body').on('click', '.add_special_js', function() {
		addFormSpecialMarkup('special');
	});
	$('body').on('click', '.add_medturism_js', function() {
		addFormMedturMarkup('medturism');
	});
	$('body').on('click', '.remove_item_js', function() {
		$(this).closest('.download-holder').remove();
	});

});

function addFormMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
						'<div class="left-form">' +
							'<img src="img/empty-img.jpg" alt="empty">' +
							'<div class="icon-holder">' +
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
								'<i class="fa fa-times" aria-hidden="true"></i>' +
							'</div>' +
							'<label class="file-label" for="add-' + marker + '-img">Загрузить файл</label>' +
							'<input type="file" id="add-' + marker + '-img" name="' + marker + '_img">' +
						'</div>' +
						'<div class="right-form">' +
							'<input type="text" required="required" class="form-control" id="name" name="name" placeholder="Заголовок"/>' +
							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							'<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							'<textarea class="form-control" required="required" rows="5" id="comment" name="comment" placeholder="Описание"></textarea>' +
							'<span>' +
								'<input id="check2" type="checkbox" name="check" value="check1">' +
								'<label for="check2">Вывести дату</label>' +
							'</span>' +
						'</div>' +
					'</div>';

	$('.' + marker + '-list').append(formMarkup);
}

function addFormSpecialMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
        				'<div class="dwnld">' +
							'<div class="form-holder">' +
									'<input type="text" required="required" class="form-control" id="name<?php echo $i ?>" name="name<?php echo $i ?>" placeholder="Заголовок"/>' +
        
							        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							        '<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							        '<textarea class="form-control" required="required" rows="5" id="comment<?php echo $i ?>" name="comment<?php echo $i ?>" placeholder="Описание"></textarea>' +
				        	'</div>'+
			        	'</div>'+
	        		'</div>';

	$('.' + marker + '-list').append(formMarkup);
}

function addFormMedturMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
        				'<div class="dwnld">' +
							'<div class="form-holder">' +
									'<input type="text" required="required" class="form-control" id="name<?php echo $i ?>" name="name<?php echo $i ?>" placeholder="Заголовок"/>' +
        
							        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							        '<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							        '<textarea class="form-control" required="required" rows="5" id="comment<?php echo $i ?>" name="comment<?php echo $i ?>" placeholder="Описание"></textarea>' +
				        	'</div>'+
			        	'</div>'+
	        		'</div>';

	$('.' + marker + '-list').append(formMarkup);
}
// function addPromoForm () {
// 	var formMarkup = '<div class="download-holder clearfix">' +
// 						'<div class="left-form">' +
// 							'<img src="img/empty-img.jpg" alt="empty">' +
// 							'<div class="icon-holder">' +
// 								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
// 								'<i class="fa fa-times" aria-hidden="true"></i>' +
// 							'</div>' +
// 							'<label class="file-label" for="add-promo-img">Загрузить файл</label>' +
// 							'<input type="file" id="add-promo-img" name="promo_img">' +
// 						'</div>' +
// 						'<div class="right-form">' +
// 							'<input type="text" required="required" class="form-control" id="name" name="name" placeholder="Заголовок"/>' +
// 							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
// 							'<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
// 							'<textarea class="form-control" required="required" rows="5" id="comment" name="comment" placeholder="Описание"></textarea>' +
// 							'<span>' +
// 								'<input id="check2" type="checkbox" name="check" value="check1">' +
// 								'<label for="check2">Вывести дату</label>' +
// 							'</span>' +
// 						'</div>' +
// 					'</div>';

// 	$('.promo-list').append(formMarkup);
// }

// function addNewsForm () {
// 	var formMarkup = '<div class="download-holder clearfix">' +
// 						'<div class="left-form">' +
// 							'<img src="img/empty-img.jpg" alt="empty">' +
// 							'<div class="icon-holder">' +
// 								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
// 								'<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
// 							'</div>' +
// 							'<label class="file-label" for="add-news-img">Загрузить файл</label>' +
// 							'<input type="file" id="add-news-img" name="promo_img">' +
// 						'</div>' +
// 						'<div class="right-form">' +
// 							'<input type="text" required="required" class="form-control" id="name" name="name" placeholder="Заголовок"/>' +
// 							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
// 							'<i class="fa fa-times" aria-hidden="true"></i>' +
// 							'<textarea class="form-control" required="required" rows="5" id="comment" name="comment" placeholder="Описание"></textarea>' +
// 							'<span>' +
// 								'<input id="check2" type="checkbox" name="check" value="check1">' +
// 								'<label for="check2">Вывести дату</label>' +
// 							'</span>' +
// 						'</div>' +
// 					'</div>';

// 	$('.news-list').append(formMarkup);
// }