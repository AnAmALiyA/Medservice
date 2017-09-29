jQuery(document).ready(function($){
	itemPromoNews = 0;

//	addFormMarkup('promo');
//	addFormMarkup('promo');

	$('body').on('click', '.add_promo_js', function() {
		addFormMarkup('promo');
	});

//	addFormMarkup('news');
//	addFormMarkup('news');
	$('body').on('click', '.add_news_js', function() {
		addFormMarkup('news');
	});

	$('body').on('click', '.add_special_js', function() {
		addFormSpecialMarkup('special');
	});
	$('body').on('click', '.add_medturism_js', function() {
		addFormMedturMarkup('medturism');
	});
	$('body').on('click', '.add_foto_js', function() {
		addFormFotoMarkup('foto');
	});

	$('body').on('click', '.remove_item_js', function() {
		$(this).closest('.download-holder').remove();
	});
//	неработает
//	$('body').on('click', '#add-promo-img-0', function() {
//		readURL(this);
//	})
	$("#add-promo-img-0").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});

	$("#add-promo-img-1").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});
	$("#add-promo-img-2").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});

	$("#add-promo-img-3").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});
	$("#add-promo-img-4").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});

	$("#add-promo-img-5").change(function() {
		console.log(itemPromoNews);
		  readURL(this);
	});

	$('body').on('click', '.remove_imeg_js', function() {
		$(this).closest('.icon-holder').prev('.imeg_js').attr('src', 'wp-content/themes/medservice24/img/empty-img.jpg');
	});

	$('body').on('click', '.organization_js', function() {
		$(this).addClass('active').siblings('.tab').removeClass('active')
					.closest('.tab-panel')
					.find('.tab-content.organization').addClass('active').siblings('.client').removeClass('active');
	});

	$('body').on('click', '.client_js', function() {
		$(this).addClass('active').siblings('.tab').removeClass('active')
					.closest('.tab-panel')
					.find('.tab-content.client').addClass('active').siblings('.organization').removeClass('active');
	});

	$('.phone_js').mask('+38 (099) 999-99-99');

	// Отображение загруженного изображения

		var mfPhoto = document.getElementById('mf-photo');

		mfPhoto.addEventListener('change', function(event) {

			var inputFiles = this.files;
			if(inputFiles == undefined || inputFiles.length == 0) return;

			var inputFile = inputFiles[0],
					reader = new FileReader();

			reader.onload = function(event) {
				var photo = document.getElementsByClassName('med-form__photo');

				photo[0].setAttribute('src', event.target.result);
				photo[1].setAttribute('src', event.target.result);
			};

			reader.onerror = function(event) {
				alert("I AM ERROR: " + event.target.error.code);
			};

			reader.readAsDataURL(inputFile);
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
							'<input type="file" id="add-' + marker + '-img-' + itemPromoNews +'" name="' + marker + '_img">' +
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

function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	$(input).siblings('.imeg_js').attr('src', e.target.result);
	    };
	    reader.readAsDataURL(input.files[0]);
	  }
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

function addFormFotoMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
        '<span class="top-txt">Загрузить файлы</span>'+

        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
    '</div>';

	$('.' + marker + '-list').append(formMarkup);
}
