jQuery(document).ready(function($){
	cifra = 20;
	
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
	$('body').on('click', '.add_foto_js', function() {
		addFormFotoMarkup('foto');
	});
	
	$('body').on('click', '.remove_item_js', function() {
		$(this).closest('.download-holder').remove();
	});

//	$('body').on('click', '#add-promo-img-0', function() {
//		readURL(this);
//	})
	$("#add-promo-img-0").change(function() {
		  readURL(this);
	});
	
	$('body').on('click', '.remove_imeg_js', function() {		
		$(this).closest('.icon-holder').prev('.imeg_js').attr('src', 'img/empty-img.jpg');		
	});
	
	$('body').on('click', '.remove_news_js', function() {
        var id =$(this).attr('news_id');
        $.ajax({
         type: "POST",
 //path to delete php page
        url:"deleteNews.php",
        data: "id="+id,
        success:function(result){

          //here is your success action
          //for refreshing page use this  
            $("#result1").html(result);
        }
        });
        });
	
});

function addFormMarkup (marker) {
	
	var formMarkup = '<div class="download-holder clearfix">' +
						'<div class="left-form">' +
							'<img class="imeg_js" src="img/empty-img.jpg" alt="empty">' +
							'<div class="icon-holder">' +
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
								'<i class="fa fa-times remove_imeg_js" aria-hidden="true"></i>' +
							'</div>' +
							'<label class="file-label" for="add-' + marker + '-img">Загрузить файл</label>' +
							'<input type="file" id="add-' + marker + '-img" name="'+ marker+'_img_[]">' +
						'</div>' +
						'<div class="right-form">' +
							'<input type="text" required="required" class="form-control"  name="name[]" placeholder="Заголовок"/>' +
							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							'<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							'<textarea class="form-control" required="required" rows="5"  name="comment[]" placeholder="Описание"></textarea>' +
							'<span>' +
								'<input  type="checkbox" name="check[' + cifra +']"  id="check[' + cifra +']" value="true"/>' +
								'<label for="check[' + cifra +']">Вывести дату</label>' +
							'</span>' +
						'</div>' +
					'</div>';

	$('.' + marker + '-list').append(formMarkup);
	cifra++;
}

function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	var ii = $('#add-img-0').closest('.download-holder');
	    	var ff = ii.find('img.imeg_js');
	    	console.log(this);
	    	console.log(ii);
	    	console.log(ff);
	    	ff.attr('src', e.target.result);	      
	    };
	    reader.readAsDataURL(input.files[0]);
	  }
	}

function addFormSpecialMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
        				'<div class="dwnld">' +
							'<div class="form-holder">' +
									'<input type="text" required="required" class="form-control"  name="name[]" placeholder="Заголовок"/>' +
        
							        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							        '<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							        '<textarea class="form-control" required="required" rows="5"  name="comment[]" placeholder="Описание"></textarea>' +
				        	'</div>'+
			        	'</div>'+
	        		'</div>';

	$('.' + marker + '-list').append(formMarkup);
}

function addFormMedturMarkup (marker) {
	var formMarkup = '<div class="download-holder clearfix">' +
        				'<div class="dwnld">' +
							'<div class="form-holder">' +
									'<input type="text" required="required" class="form-control"  name="name[]" placeholder="Заголовок"/>' +
        
							        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
							        '<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
							        '<textarea class="form-control" required="required" rows="5"  name="comment[]" placeholder="Описание"></textarea>' +
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
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
        '<div class="photo-holder">'+
            '<img src="img/empty-img.jpg" alt="empty">'+
            '<div class="icon-holder">'+
                '<i class="fa fa-pencil-square-o" aria-hidden="true">'+'</i>'+
                '<i class="fa fa-times remove_imeg_js" aria-hidden="true">'+'</i>'+
            '</div>'+
        '</div>'+
    '</div>';

	$('.' + marker + '-list').append(formMarkup);
}
/*
 function addPromoForm () {
 	var formMarkup = '<div class="download-holder clearfix">' +
 						'<div class="left-form">' +
 							'<img src="img/empty-img.jpg" alt="empty">' +
 							'<div class="icon-holder">' +
 								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
 								'<i class="fa fa-times" aria-hidden="true"></i>' +
 							'</div>' +
 							'<label class="file-label" for="add-promo-img">Загрузить файл</label>' +
 							'<input type="file" id="add-promo-img" name="promo_img">' +
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

 	$('.promo-list').append(formMarkup);
 }

 function addNewsForm () {
 	var formMarkup = '<div class="download-holder clearfix">' +
 						'<div class="left-form">' +
 							'<img src="img/empty-img.jpg" alt="empty">' +
 							'<div class="icon-holder">' +
 								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
 								'<i class="fa fa-times remove_item_js" aria-hidden="true"></i>' +
 							'</div>' +
 							'<label class="file-label" for="add-news-img">Загрузить файл</label>' +
 							'<input type="file" id="add-news-img" name="promo_img">' +
 						'</div>' +
 						'<div class="right-form">' +
 							'<input type="text" required="required" class="form-control" id="name" name="name" placeholder="Заголовок"/>' +
 							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
 							'<i class="fa fa-times" aria-hidden="true"></i>' +
 							'<textarea class="form-control" required="required" rows="5" id="comment" name="comment" placeholder="Описание"></textarea>' +
 							'<span>' +
 								'<input id="check2" type="checkbox" name="check" value="check1">' +
 								'<label for="check2">Вывести дату</label>' +
 							'</span>' +
 						'</div>' +
 					'</div>';

 	$('.news-list').append(formMarkup);
 }
*/