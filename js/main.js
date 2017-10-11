jQuery(document).ready(function($){
	itemPromoNews = 0;
	//установка формы
	let formMain = $('body.main_js form.right-col');
	// console.log(formMain);
	formMain != null ? setFormMain(formMain) : '';

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
		$(this).closest('.icon-holder').prev('.imeg_js').attr('src', 'img/empty-img.jpg');
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

		// Отображение загруженного изображения
		// var mfPhoto = document.getElementById('mf-photo');
		$('mf-photo').on('change', 'mf-photo', function(event) {
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
	      alert("ERROR: " + event.target.error.code);
	    };

	    reader.readAsDataURL(inputFile);
		});	// End Отображение загруженного изображения
}); //END событие jQuery(document).ready

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

function addFormOrganization(arrayOrganizationData, arrayTypeCompanes, arrayServices, arrayInsuranceCompanes, arrayRegiones, arrayPhone, arrayDayTimeWork, arrayError = null) {
	var formOrganization = '<div class="info-holder">' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="type">Тип учереждения</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="typeCompany" class="type ' + arrayError['typeCompany_error'] != null ? arrayError['typeCompany_error'] : ''; + '" id="typeCompany">' +
																			'<option value="0" selected></option>'
																			for (let i = 0; i < arrayTypeCompany.id.length; i++) {
																				+ '<option value="' + arrayTypeCompany.id[i] + '">' + arrayTypeCompany.name[i] + '</option>'
																			}
		                              + '</select>' +
																	// отображение выбранных елементов
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="services">Направления/услуги</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="services" class="services ' + arrayError['service_error'] != null ? arrayError['service_error'] : ''; + '" id="services">' +
		                                  '<option value="0" selected></option>'
																			for (let i = 0; i < arrayServices.length; i++) {
																				+ '<option value="' + i + '">' + arrayServices[i] + '</option>'
																			}
		                              + '</select>' +
		                                '<button type="button" name="button" class="button_section button_section_js">Выбрать</button>' +
		                            '</div>' +
		                            '<div class="button_section_js"></div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="company">Страховые компании</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="insuranceCompany" class="insuranceCompany ' + arrayError['insurance_error'] != null ? arrayError['insurance_error'] : ''; + '" id="insuranceCompany">' +
		                                    '<option value="0" selected></option>'
																				for (let i = 0; i < arrayInsuranceCompanes.id.length; i++) {
																					+ '<option value="' + i + '">' + arrayInsuranceCompanes[i] + '</option>'
																				}
		                              + '</select>' +
		                            '</div>' +
																'<button type="button" name="button" class="button_section button_section_js">Выбрать</button>' +
		                            '<div class="button_section_js"></div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="name">Название</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<input type="text" placeholder="" id="nameCompany" name="nameCompany-' + nameCompany != null ? nameCompany.id : 'null'; + '" value="' + arrayOrganizationData.nameCompany != null ? arrayOrganizationData.nameCompany.name : 'Тест поле компания'; + '">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<span>Адрес:</span>' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1 ' + arrayError['region_error'] != null ? arrayError['region_error'] : ''; + '">' +
		                                '<label for="region">Область</label>' +
		                            '</div>' +
		                            '<div class="col2">' +//тут подгрузить области
		                                '<input type="text" placeholder="Введите название области." id="region" name="region" value="' + arrayLocation['region'] != null ? arrayLocation['region'] : 'Киевская'; + '">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1 ' + arrayError['town_error'] != null ? arrayError['town_error'] : ''; + '">' +
		                                '<label for="town">Город</label>' +
		                            '</div>' +
		                            '<div class="col2">' + //тут подгрузить город
		                                '<input type="text" placeholder="Введите название города." id="town" name="town" value="' + arrayLocation['town'] != null ? arrayLocation['town'] : 'Киев'; + '">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1 ' + arrayError['district_error'] != null ? arrayError['district_error'] : ''; + '">' +
		                                '<label for="district">Район</label>' +
		                            '</div>' +
		                            '<div class="col2">' + //тут подзрузить район города
		                                '<input type="text" placeholder="Введите название район." id="district" name="districtCity" value="' + arrayLocation['district'] != null ? arrayLocation['district'] : 'Шевченковский'; + '">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1 ' + arrayError['street_error'] != null ? arrayError['street_error'] : ''; + '">' +
		                                '<label for="street">Улица</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<input type="text" placeholder="Введите название улици." id="street" name="street" value="' + arrayLocation['street'] != null ? arrayLocation['street'] : 'ул. Харьковская а-3'; + '">' +
		                            '</div>' +
		                        '<div class="row">' +
														'</div>' +
		                            '<div class="col1 ' + arrayError['home_error'] != null ? arrayError['home_error'] : ''; + '">' +
		                                '<label for="home">Дом</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<input type="text" placeholder="Введите название дома." id="home" name="home" value="' + arrayLocation['home'] != null ? arrayLocation['home'] : 'Дом 3, Этаж 4'; + '">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div id="phones" class="row">' + //тут цепляться и создавать массив
		                            '<div class="col1">' +
		                                '<label for="phone">Телефон</label>' +
		                            '</div>'
																for (let i = 0; i < arrayPhone.id.length; i++) {
																	'<div class="col2 phone">' +
			                                '<input id="phone-' + arrayPhone.id[i] + '" class="phone_js" type="tel" name="' + arrayPhone.id[i] + '" placeholder="+38 (0__) ___-__-__" value="' + arrayPhone.name[i] + '">' +
			                                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
			                                '<i class="fa fa-times" aria-hidden="true"></i>' +
			                            '</div>'
																}
		                          + '<div class="col2 phone">' + //тут вешать обработчик на добавление телефона
		                                '<input id="phone" class="phone_js" type="tel" name="0" placeholder="+38 (0__) ___-__-__" value="0960009900">' +
		                                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
		                                '<i class="fa fa-times" aria-hidden="true"></i>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<div class="add">' +
		                                    '<i class="fa fa-plus" aria-hidden="true"></i>' +
																				'<span>Добавить</span>' +
		                                '</div>' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="time">Время работы</label>' +
		                            '</div>' +
																generationDaysOfWeek();
		                      + '<div class="row last">' +
		                            '<div class="col1">' +
		                                '<label for="holiday">Выходной</label>' +
		                            '<div class="col2">' +
																'</div>' +
		                              '<div class="">' +
		                                '<a id="mutliSelectHoliday" href="#">' +
		                                  '<span class="hida">Select</span>' +
		                                  '<p class="multiSel"></p>' +
		                                '</a>' +
		                              '</div>' +
		                                '<ul class="mutliSelect">' +
																		generateDaysOfWeekend();
		                              + '</ul>' +
		                            '</div>' +
		                        '</div>' +
		                        '<input type="submit" name="submit" value="Сохранить">' +
		                    '</div>' +
		                    '<div class="logo-holder">' +
		                        '<span class="top-txt">Логотип</span>' +
		                        '<input type=file name="img" accept="image/*">' +
		                          '<img src="img/empty-img.jpg" alt="empty">' +
		                        '</input>' +
		                        '<div class="icon-holder">' +
		                            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
		                            '<i class="fa fa-times" aria-hidden="true"></i>' +
		                        '</div>' +
		                        '<span>Загрузить файл</span>' +
		                    '</div>'
}

function generationDaysOfWeek() {
  let arrayDaysOfWeekRU = ["пн", "вт", "ср", "чт", "пт", "сб", "вс"];
  var arrayDaysOfWeekUS = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
	let strDaysOfWeek = '';

  for (let i = 1; i <= 7; i++) {
    strDaysOfWeek += '<div class="col2">' +
    '<span>' + arrayDaysOfWeekRU[i] + '</span>' +
      '<select name="' + arrayDaysOfWeekUS[i] + '-Start" class="time" id="' + arrayDaysOfWeekUS[i] + '-Start">' +
      generationTime(7); +
    '</select>' +
    '<span>до</span>' +
    '<select name="' + arrayDaysOfWeekUS[i] + '-End" class="time" id=""' + arrayDaysOfWeekUS[i] + '-End">' +
      generationTime(19); +
    '</select>' +
    '</div>';
  }
	return strDaysOfWeek;
}

function generationTime(hour) {
  let tegs = '<option value="' + hour + '" selected="selected">' + hour == 7 ? '07' : '19'; + '.00</option>';

  for (let i = 0; i < 23; i++) {
    tegs += hour < 10
      ? '<option value="' + hour + '">0' + hour + '.00</option>'
      : '<option value="' + hour + '">' + hour + '.00</option>';
    hour++;
    if (hour == 24) {
      hour = 0;
    }
  }
	return tegs;
}

function generateDaysOfWeekend() {
	let arrayDaysOfWeekend = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресение"];
	let strDaysOfWeekend = '';

	for (let i = 0; i < arrayDaysOfWeekend.length; i++) {
		strDaysOfWeekend += '<li><input type="checkbox" name="' + arrayDaysOfWeekUS[i] + '" value="' + arrayDaysOfWeekend[i] + '"/>' + arrayDaysOfWeekend[i] + '</li>';
	}
	return strDaysOfWeekend;
}

function setFormMain(formM) {
  $.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url: 'ajax.php', // the url where we want to POST
      data: 'ajax_form_main', // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response, textStatus, jqXHR) {
    //.done(function(response) {
      console.log(response);
			console.log('-------');
			console.log(textStatus);
			console.log('-------');
			console.log(jqXHR);
			// let arrayOrganizationData = response.arrayOrganizationData;
			// if (arrayOrganizationData != null) {
			// 	//достать данные
			// 		//'arrayTypeCompanes'
	    //     //'arrayServices'
	    //     //'arrayInsuranceCompanes'
			// 		//'arrayLocation'
			// }
      // let arrayTypeCompanes = response.arrayTypeCompanes;
      // let arrayServices = response.arrayServices;
      // let arrayInsuranceCompanes = response.arrayInsuranceCompanes;
      // let arrayLocation = response.arrayLocation;
      // let arrayPhone = response.arrayPhone;
      // let arrayError = response.arrayError;
			//
      // let form = addFormOrganization(arrayOrganizationData, arrayTypeCompanes, arrayServices, arrayInsuranceCompanes, arrayLocation, arrayPhone, arrayError);
      //  formM.html(form);
			formM.html(""+response);
    });
}
