jQuery(document).ready(function($){
	itemPromoNews = 0;
	// установка формы
	let formMain = $('body.main_js form.right-col');
	if (formMain != null ) {
		setFormMain(formMain);
		// setFormMainDrop(formMain);
	}

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
 }); // End Отображение загруженного изображения
	cifra = 20;

// //форма регистрации - валидность
// $('body').on('keyup','#mf-title', function(event){
// 	//сравнение
// 	// console.log(event);
// 	// console.log(this);
// // try {
// // 	var test = $(this).val();
// // 	console.log(test);
// // } catch (e) {
// // 	console.log(e.message);
// // }
// if (document.arrayNamesCompanes == null) {
// var namesCompanes = {
// 	'comand' : 'ajax_form_regestration'
// };
//
// 	$.ajax({
// 		type:'POST',
// 		url: 'ajax.php',
// 		data: namesCompanes,
// 		dataType: 'json',
// 		encode:true,
// 		success: function(response){
// 			if (response != null) {
// 				document.arrayNamesCompanes = response;
// 			}
// 		},
// 		error: function (jqXHR, exception) {
// 					var msg = '';
// 					if (jqXHR.status === 0) {
// 							msg = 'Not connect.\n Verify Network.';
// 					} else if (jqXHR.status == 404) {
// 							msg = 'Requested page not found. [404]';
// 					} else if (jqXHR.status == 500) {
// 							msg = 'Internal Server Error [500].';
// 					} else if (exception === 'parsererror') {
// 							msg = 'Requested JSON parse failed.';
// 					} else if (exception === 'timeout') {
// 							msg = 'Time out error.';
// 					} else if (exception === 'abort') {
// 							msg = 'Ajax request aborted.';
// 					} else {
// 							msg = 'Uncaught Error.\n' + jqXHR.responseText;
// 					}
// 					// $('#post').html(msg);
// 					console.log('error: ' + msg);
// 				}
// 	});
// }
//
// 	for (let i = 0; i < document.arrayNamesCompanes.length; i++) {
// 		if(array[i] == nameCompany){
// 			$(this).attr('class', 'med-form__field error_text');
// 		}
// 	}
// });
$('body').on('submit', '#client', function(){

});

$('body').on('submit', '#organization', function(){

});

  //$(".phone_js").mask("+38(099)999-9999");

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

	// // неработает
	// // $('body').on('click', '#add-promo-img-0', function() {
	// // readURL(this);
	// // })
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
	    	$(input).siblings('.imeg_js').attr('src', e.target.result);
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

function addFormOrganization(typeCompany, arrayServices, arrayInsuranceCompanes, nameCompany, arrayLocation, daysTimes, logo) {
	let formOrganization = '<div class="info-holder">' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="type">Тип учереждения</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="typeCompany" class="type" id="typeCompany">' +
																		//тип учереждения
																		// + (typeCompany != null ? '<option value="' + typeCompany.id + '" selected>' + typeCompany.name + '</option>' : '<option value="0" selected></option>')
																			'<option value="0" selected></option>' +
																			// for (let i = 0; i < arrayTypeCompany.id.length; i++) {
																			// 	+ '<option value="' + arrayTypeCompany.id[i] + '">' + arrayTypeCompany.name[i] + '</option>'
																			// }
		                              	'</select>' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="services">Направления/услуги</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="services" class="services" id="services">' +
		                                  '<option value="0" selected></option>'+
														// 					// for (let i = 0; i < arrayServices.length; i++) {
														// 					// 	+ '<option value="' + i + '">' + arrayServices[i] + '</option>'
														// 					// }
		                               '</select>' +
		                                '<button type="button" name="button" class="button_section button_section_js">Выбрать</button>' +
		                            '</div>' +
		                            '<div id="servicesCheck">testServicesCheck</div>' +
														// 		// generationServices(arrayServices);
														// 		// if (arrayServices != null) {
														// 		// 	for (let i = 0; i < arrayServices.name.length; i++) {
														// 		// 		'<div class="green_button" id="services-'+ arrayServices.id[i] + '">' +
														// 		// 			'<span>' + arrayServices.name[i] + '</span>' +
														// 		// 			'<span class="delete_js"></span>' +
														// 		// 		'</div>'
														// 		// 	}
														// 		// }
														'</div>' +
														'<div class="row for_green_button">'+
														'</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="company">Страховые компании</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<select name="insuranceCompany" class="insuranceCompany" id="insuranceCompany">' +
		                                    // '<option value="0" selected></option>'
																				// for (let i = 0; i < arrayInsuranceCompanes.id.length; i++) {
																				// 	+ '<option value="' + i + '">' + arrayInsuranceCompanes[i] + '</option>'
																				// }
																				'</select>' +
		 		                                '<button type="button" name="button" class="button_section button_section_js">Выбрать</button>' +
		 		                            '</div>' +
		                        '</div>' +
														'<div id="arrayInsuranceCompanesCheck">testInsuranceCompanesCheck</div>' +
														//generationInsuranceCompanes(arrayInsuranceCompanes);
														// if (arrayInsuranceCompanes != null) {
														// 	for (let i = 0; i < arrayInsuranceCompanes.name.length; i++) {
														// 		'<div class="green_button" id="insuranceCompanes-'+ arrayInsuranceCompanes.id[i] + '">' +
														// 			'<span>' + arrayInsuranceCompanes.name[i] + '</span>' +
														// 			'<span class="delete_js"></span>' +
														// 		'</div>'
														// 	}
														// }

		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="name">Название</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
		                                '<input type="text" placeholder="" id="nameCompany" name="nameCompany-0">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<span>Адрес:</span>' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="region">Область</label>' +
		                            '</div>' +
		                            '<div class="col2">' +// тут подгрузить
															// области
		                                '<input type="text" placeholder="Введите название области." id="region" name="region-0">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="town">Город</label>' +
		                            '</div>' +
		                            '<div class="col2">' + // тут подгрузить
															// город
		                                '<input type="text" placeholder="Введите название города." id="town" name="town-0">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="district">Район</label>' +
		                            '</div>' +
		                            '<div class="col2">' + // тут подзрузить
															// район города
		                                '<input type="text" placeholder="Введите название район." id="district" name="districtCity-0">' +
		                            '</div>' +
		                        '</div>' +
		                        '<div class="row">' +
		                            '<div class="col1">' +
		                                '<label for="street">Улица</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
																//улица
		                                '<input type="text" placeholder="Введите название улици." id="street" name="street-0">' +
		                            '</div>' +
		                        '<div class="row">' +
														'</div>' +
		                            '<div class="col1">' +
		                                '<label for="home">Дом</label>' +
		                            '</div>' +
		                            '<div class="col2">' +
																//город
		                                '<input type="text" placeholder="Введите название дома." id="home" name="home-0">' +
		                            '</div>' +
		                        '</div>' +
														//телефон
		                        '<div id="phones" class="row">' +
		                            '<div class="col1">' +
		                                '<label for="phone">Телефон</label>' +
		                            '</div>' +
																'<div id="old-phones"></div>'+
																'<div id="new-phones">' +
																	'<div class="col2 phone">' +
																			'<input class="phone_js" type="tel" name="phone-0" placeholder="+38 (0__) ___-__-__" value="0960009900">' +
																			'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
																			'<i class="fa fa-times" aria-hidden="true"></i>' +
																		'</div>' +
																  '</div>' +
																//проверить на существование и добавить по умолчанию
																// for (let i = 0; i < arrayPhone.id.length; i++) {
																// 	'<div class="col2 phone">' +
			                          //       '<input id="phone-' + arrayPhone.id[i] + '" class="phone_js" type="tel" name="' + arrayPhone.id[i] + '" placeholder="+38 (0__) ___-__-__" value="' + arrayPhone.name[i] + '">' +
			                          //       '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
			                          //       '<i class="fa fa-times" aria-hidden="true"></i>' +
			                          //   '</div>'
																// }

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
																'<div id="startEndTime"></div>' +
																//generationDaysTimes(daysTimes);
													    '</div>' +
		                        '<div class="row last">' +
		                            '<div class="col1">' +
		                                '<label for="holiday">Выходной</label>' +
		                            '<div class="col2">' +
																'</div>' +
		                              // '<div class="">' + //незнаю зачем
		                              //   '<a id="mutliSelectHoliday" href="#">' +
		                              //     '<span class="hida">Select</span>' +
		                              //     '<p class="multiSel"></p>' +
		                              //   '</a>' +
		                              // '</div>' +
		                                '<ul id="weekend" class="mutliSelect">' +
																		//generateDaysOfWeekend(daysTimes);
		                                '</ul>' +
		                            '</div>' +
		                        '</div>' +
		                        '<input type="submit" name="submit" value="Сохранить">' +
		                    '</div>' +
		                    '<div class="logo-holder">' +
		                        '<span class="top-txt">Логотип</span>' +
		                        '<input type=file name="img" accept="image/*">' +
		                          '<img class="imeg_js" src="img/empty-img.jpg" alt="empty">' +
		                        '</input>' +
		                        '<div class="icon-holder">' +
		                            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
		                            '<i class="fa fa-times" aria-hidden="true"></i>' +
		                        '</div>' +
		                        '<span>Загрузить файл</span>' +
		                    '</div>';
	return formOrganization;
}

function setDataArrays(typeCompany, arrayServices, arrayInsuranceCompanes, nameCompany, arrayLocation, daysTimes, logo)
{
	// console.log('setDataArrays --- start --- typeCompany, arrayServices, arrayInsuranceCompanes, nameCompany, arrayLocation, daysTimes, logo');
	// console.log(typeCompany);
	// console.log(arrayServices);
	// console.log(arrayInsuranceCompanes);
	// console.log(nameCompany);
	// console.log(arrayLocation);
	// console.log('setDataArrays --- end --- typeCompany, arrayServices, arrayInsuranceCompanes, nameCompany, arrayLocation, daysTimes, logo');
	if (typeCompany != null) {
		$('#typeCompany option:selected').text(typeCompany.name).attr("value", typeCompany.id);
	}
	//сервис
	if(arrayServices != null){
		$('#servicesCheck').html(generationServicesButtons(arrayServices));
	}
	//страховые
	if(arrayInsuranceCompanes != null){
		$('#arrayInsuranceCompanesCheck').html(generationInsuranceCompanes(arrayInsuranceCompanes));
	}

	if (nameCompany != null) {
		$('#nameCompany').val(nameCompany.name).attr("name", "nameCompany-" + nameCompany.id);
	}

	if (arrayLocation.region != null) {
		$('#region').val(arrayLocation.region.name).attr("name", "region-" + arrayLocation.region.id);
	}

	if (arrayLocation.city != null) {
		$('#town').val(arrayLocation.city.name).attr("name", "town-" + arrayLocation.city.id);
	}

	if (arrayLocation.district != null) {
		$('#district').val(arrayLocation.district.name).attr("name", "districtCity-" + arrayLocation.district.id);
	}

	if (arrayLocation.street != null) {
		$('#street').val(arrayLocation.street.name).attr("name", "street-" + arrayLocation.street.id);
	}

	if (arrayLocation.home != null) {
		$('#home').val(arrayLocation.home.name).attr("name", "home-" + arrayLocation.home.id);
	}
	//TODO телефоны(не работает в общем методе да и так не работает)
	getPhones();//вызвать телефоны и там же установить после вызова
	//время работы
	if(daysTimes != null){
		$('#startEndTime').html(generationDaysTimes(daysTimes));
	}
	//выходные дни
	if(daysTimes != null){
		$('#weekend').html(generateDaysOfWeekend(daysTimes));
	}
	// загрузка логотипа
	if (logo != null) {
		$('.imeg_js').attr('src', '');
	}
}

function generationServicesButtons(arrayServices){
	let str = '';
	for (let i = 0; i < arrayServices.name.length; i++) {
					str += '<div class="green_button" id="services-'+ arrayServices.id[i] + '">' +
						'<span>' + arrayServices.name[i] + '</span>' +
						'<span class="delete_js"></span>' +
					'</div>';
				}
	return str;
}

function generationInsuranceCompanes(arrayInsuranceCompanes){
	let str = '';
	for (let i = 0; i < arrayInsuranceCompanes.name.length; i++) {
			str +='<div class="green_button" id="insuranceCompanes-'+ arrayInsuranceCompanes.id[i] + '">' +
				'<span>' + arrayInsuranceCompanes.name[i] + '</span>' +
				'<span class="delete_js"></span>' +
			'</div>';
		}
		return str;
}

function generationDaysTimes(daysTimes) {
  let arrayDaysOfWeekRU = ["пн", "вт", "ср", "чт", "пт", "сб", "вс"];
  let arrayDaysOfWeekUS = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
  let strDaysOfWeek = '';
	let startDaysOfWeek = '';
	let endDaysOfWeek = '';
console.log(daysTimes);
  if (daysTimes != null) {
    for (let i = 0; i < 7; i++) {
      strDaysOfWeek += '<div class="col2">' +
        '<span>' + arrayDaysOfWeekRU[i] + '</span>' +
        '<select name="Start-' + arrayDaysOfWeekUS[i] + '" class="time">';
        startDaysOfWeek += generationTime(
					daysTimes.day[arrayDaysOfWeekUS[i]]
					? 7
					: daysTimes.startTime[arrayDaysOfWeekUS[i]]
				);
      strDaysOfWeek += startDaysOfWeek + '</select>' +
      '<span>до</span>' +
      '<select name="End-' + arrayDaysOfWeekUS[i] + '" class="time">';
        endDaysOfWeek += generationTime(
					daysTimes.day[arrayDaysOfWeekUS[i]]
					? 19
					: daysTimes.endTime[arrayDaysOfWeekUS[i]]
				);
      strDaysOfWeek += endDaysOfWeek + '</select>' +
      '</div>';
			console.log(daysTimes.startTime[arrayDaysOfWeekUS[i]]);
			console.log(generationTime(daysTimes.startTime[arrayDaysOfWeekUS[i]]));
    }
  } else {
    for (let i = 0; i < 7; i++) {
      strDaysOfWeek += '<div class="col2">' +
        '<span>' + arrayDaysOfWeekRU[i] + '</span>' +
        '<select name="Start-' + arrayDaysOfWeekUS[i] + '" class="time">' +
        generationTime(7); +
      '</select>' +
      '<span>до</span>' +
      '<select name="End-' + arrayDaysOfWeekUS[i] + '" class="time">' +
        generationTime(19); +
      '</select>' +
      '</div>';
    }
  }
  return strDaysOfWeek;
}

function generationTime(hour) {
  let tegs = '';// '<option value="' + hour + '" selected="selected">' + hour == 7 ? '07' : '19'; + '.00</option>';
	let selected = true;
  for (let i = 0; i < 23; i++) {
    tegs += hour < 10
      ? '<option value="' + hour + '"'
			+ (selected ? 'selected="selected"' : '')
			+ '>0' + hour + '.00</option>'
      : '<option value="' + hour + '"'
			+ (selected ? 'selected="selected"' : '')
			+ '>' + hour + '.00</option>';
    hour++;
		selected = false;
    if (hour == 24) {
      hour = 0;
    }
  }
	return tegs;
}

function generateDaysOfWeekend(daysTimes) {
	let arrayDaysOfWeekend = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресение"];
	let arrayDaysOfWeekUS = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
	let strDaysOfWeekend = '';

	for (let i = 0; i < arrayDaysOfWeekend.length; i++) {
		strDaysOfWeekend += '<li><input type="checkbox" name="' + arrayDaysOfWeekUS[i] + '" value="' + arrayDaysOfWeekend[i] + '"'+ (daysTimes != null ? (daysTimes.day[i] == null ? 'checked': '') : '') +'/>' + arrayDaysOfWeekend[i] + '</li>';
	}
	return strDaysOfWeekend;
}

function generationServicesList(arrayServices) {
		let str = '';
		if (arrayServices != null) {
		for (let i = 0; i < arrayServices.name.length; i++) {
			str += '<option value="' + arrayServices.id[i] + '">' + arrayServices.name[i] + '</option>'
		}
		return str;
	}
}


function generationInsuranceCompanes(arrayInsuranceCompanes) {
			let str = '';
	if (arrayInsuranceCompanes != null) {
		for (let i = 0; i < arrayInsuranceCompanes.name.length; i++) {
			str += '<option value="' + arrayInsuranceCompanes.id[i] + '">' + arrayInsuranceCompanes.name[i] + '</option>';
		}
		return str;
	}
}


function generationTypeCompanyList(arrayTypeCompany){
	let str = '';
	for (let i = 0; i < arrayTypeCompany.name.length; i++) {
		str += '<option value="' + arrayTypeCompany.id[i] + '">' + arrayTypeCompany.name[i] + '</option>'
	}
	return str;
}
//установить списки количества
function setGenerationData(){
	let mainDrop = {
		 'comand' : 'ajax_form_main_region_service_institution'
	};
	$.ajax({
			type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
			url: 'ajax.php', // the url where we want to POST
			data: mainDrop, // our data object
			dataType: 'json', // what type of data do we expect back from the server
			encode: true
		})
		.done(function(response) {
			//установить выпадающие списки
			console.log(response);
			//список учереждений
			let typeCompanyList = generationTypeCompanyList(response.typeCompany);
			$('#typeCompany').html(typeCompanyList);
			//список сервисов
			let servicesList = generationServicesList(response.arrayServices);
			$('#services').html(servicesList);
			//список страховые компании
			let insuranceCompanyList = generationServicesList(response.arrayInsuranceCompanes);
			$('#insuranceCompany').html(insuranceCompanyList);
			//регионы TODO создать и проверять список регионов
			document.regiones = response.regiones;
		});
}


function setFormMain(formM) {
	let dates = {
		'comand' : 'ajax_form_main'
	};

	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: dates, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true,
      success: function(response){
    	   console.log('данные с сервера при успешном выполнении');
		   console.log(response);
		   let typeCompany = response.typeCompany;//id, name
		   let arrayServices = response.arrayServices;//$arrayOrganizationData['arrayServices']
		   let arrayInsuranceCompanes = response.arrayInsuranceCompanes;
		   let nameCompany = response.nameCompany;
		   let arrayLocation = response.arrayLocation;
//		   let street = arrayLocation.street;
//		   let city = arrayLocation.city;
//		   let district = arrayLocation.district;
//		   let district = arrayLocation.region;
//		   let district = arrayLocation.home;
		   let daysTimes = response.daysTimes;
		   let logo = response.logo;
	   	   //сформировать разметку
		   let form = addFormOrganization();
		   formM.html(form);
			//  setDataArrays(typeCompany, nameCompany, arrayLocation, logo);
			 setDataArrays(typeCompany, arrayServices, arrayInsuranceCompanes, nameCompany, arrayLocation, daysTimes, logo);
			 setGenerationData();
			 //вывод типа кнопок

	},
	error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        // $('#post').html(msg);
				console.log('error: ' + msg);
    	}
    });
}

function setFormMainDrop(forM){
	let mainDrop = {
		 'comand' : 'ajax_form_main_region_service_institution'
	};
	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: main, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response) {
			//установить выпадающие списки
      console.log(response);
			formM.html(response);
    });
}

function getDistrictRegion(regionId) {
	let region = {
		'comand' : 'ajax_form_main_districtRegion',
		'regionId' :  regionId
	};
	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: region, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response) {
      console.log(response);
			formM.html(response);
    });
}

function getCity(districtRegionId) {
	let districtRegion = {
		'comand' : 'ajax_form_main_city',
		'districtRegionId' :  districtRegionId
	};
	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: districtRegion, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response) {
      console.log(response);
			formM.html(response);
    });
}

function getPhones() {
  let phone = {
    'comand': 'ajax_form_main_phones'
  };
  $.ajax({
    type: 'POST', // define the type of HTTP verb we want to use (POST for our
    // form)
    url: 'ajax.php', // the url where we want to POST
    data: phone, // our data object
    dataType: 'json', // what type of data do we expect back from the server
    encode: true,
    success: function(phones) {
      console.log(phones);
      if (phones != null) {
        let str = '';
        for (let i = 0; i < phones.id.length; i++) {
          str += '<div class="col2 phone">' +
            '<input id="phone-' + phones.id[i] + '" class="phone_js" type="tel" name="' + phones.id[i] + '" placeholder="+38 (0__) ___-__-__" value="' + phones.name[i] + '">' +
            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' +
            '<i class="fa fa-times" aria-hidden="true"></i>' +
            '</div>';
        }
        $('#old-phones').html(str); //append - добавить в конец списка
      }
    },
    error: function(jqXHR, exception) {
      var msg = '';
      if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
      } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
      } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
      } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
      } else if (exception === 'timeout') {
        msg = 'Time out error.';
      } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
      } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
      }
      // $('#post').html(msg);
      console.log('error: ' + msg);
    }
  });
  // .done(function(response) { //вместо success: function(response){
  // 	}
}

function deletePhone(phoneId) {
	let phone = {
		'comand' : 'ajax_form_main_delete_phone',
		'phoneId' :  phoneId
	};
	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: phone, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response) {
      console.log(response);
			formM.html(response);
    });
}

function deleteImage(imageId) {
	let image = {
		'comand' : 'ajax_form_main_delete_img',
		'imageId' :  imageId
	};
	$.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our
					// form)
      url: 'ajax.php', // the url where we want to POST
      data: image,// 'ajax_form_main_delete_img', // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(response) {
      console.log(response);
    });
}
