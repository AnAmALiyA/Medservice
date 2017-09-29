<?php session_start();
require_once 'authorize.php';
require_once 'action.php';
require_once 'med-BAL.php';

$auth = new Authorization();
$bal = new Controller();

if (!$auth->IsAuthorized('organization')) {
    $bal->RedirectBack();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration</title>

	<link rel="stylesheet" href="wp-content/themes/medservice24/css/style.css">
  <!-- <link rel="stylesheet" id="base-style-css" href="http://medservice24.webspectrum.top/wp-content/themes/medservice24/css/style.css"> -->
  <link rel="stylesheet" id="jquery-ui-custom-css" href="http://medservice24.webspectrum.top/wp-content/plugins/zm-ajax-login-register/assets/jquery-ui.css?ver=4.7.5" type="text/css" media="all">
  <link rel="stylesheet" id="ajax-login-register-style-css" href="http://medservice24.webspectrum.top/wp-content/plugins/zm-ajax-login-register/assets/style.css?ver=4.7.5" type="text/css" media="all">

</head>
<body class="page-template page-template-pages page-template-template-home page-template-pagestemplate-home-php page page-id-5">
	<header id="header">
		<div class="row">
			<div class="logo">
				<a href="http://medservice24.webspectrum.top">
					<img src="http://medservice24.webspectrum.top/wp-content/uploads/2016/10/logo.png" alt="Медсоветник">
				</a>
			</div>
			<div class="select-position">
				<div class="select-holder">

					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<select name="taxonomy_location" id="taxonomy_location" onchange="taxonomyOfLocation();">
						<option value="0">Область</option>
						<option selected="selected" value="3">Киевская область</option>
						<option value="2">Харьковская область</option>
					</select>
				</div>
				<div class="select-holder">
					<div id="ajax-select-filter-geo">
						<select name="taxonomy_location_child" id="taxonomy_location_child" onchange="taxonomyOfLocationChild();">
							<option value="0">Город</option>
							<option selected="selected" value="8">Киев</option>
						</select>

					</div>
				</div>
				<div class="select-holder" id="ajax-taxonomy-child">
					<select onchange="areaId();" id="area-id" name="area-id">
						<option value="8">Район</option>
					</select>

				</div>
			</div>
			<div class="reg">
				<ul>
					<li><a class="lightbox" href="#login">Подать заявку</a></li>
					<li><a class="lightbox" href="#login-form">Войти</a></li>
					<div id="login-form">
						<div class="zm_alr_form_container zm_alr_login_form_container ajax-login-register-login-container zm_alr_design_default">
							<form action="javascript://" class="zm_alr_form ajax-login-default-form-container login_form" data-zm_alr_login_security="6d8c94e2ef" data-zm_alr_login_ajax_params="null">
								<div class="form-wrapper">
									<div class="ajax-login-register-status-container">
										<div class="ajax-login-register-msg-target"></div>
									</div>
									<div class="zm_alr_form_field_container zm_alr_text_container zm_alr_login_text_container">
										<label for="zm_alr_login_user_name" class="zm_alr_label">Имя пользователя</label>
										<input name="zm_alr_login_user_name" id="zm_alr_login_user_name" class="zm_alr_text_field zm_alr_form_field" placeholder="Имя пользователя" autocorrect="none" autocapitalize="none" type="text">
									</div>
									<div class="zm_alr_form_field_container zm_alr_password_container zm_alr_login_password_container">
										<label for="zm_alr_login_password" class="zm_alr_label">Пароль</label>
										<input name="zm_alr_login_password" id="zm_alr_login_password" class="zm_alr_password_field zm_alr_form_field" placeholder="Пароль" autocorrect="none" autocapitalize="none" type="password">
									</div>
									<div class="zm_alr_form_field_container zm_alr_checkbox_container zm_alr_login_checkbox_container">
										<input name="zm_alr_login_keep_me_logged_in" id="zm_alr_login_keep_me_logged_in" class="zm_alr_checkbox_field zm_alr_form_field" type="checkbox">
										<label for="zm_alr_login_keep_me_logged_in" class="zm_alr_label">Запомнить меня</label>
									</div>
									<div class="zm_alr_form_field_container zm_alr_submit_container zm_alr_login_submit_container">
										<input value="Авторизация" id="zm_alr_login_submit_button" class="login_button green zm_alr_submit_field zm_alr_form_field" name="zm_alr_login_submit_button" type="submit">
									</div>
									<ul class="zm_alr_ul_container">
										<li><a href="#" class="zm_alr_link zm_alr_login_link not-a-member-handle" id="zm_alr_login_%d1%83%d0%b6%d0%b5-%d0%b7%d0%b0%d1%80%d0%b5%d0%b3%d0%b8%d1%81%d1%82%d1%80%d0%b8%d1%80%d0%be%d0%b2%d0%b0%d0%bd%d1%8b" title="Уже зарегистрированы?">Уже зарегистрированы?</a></li>
										<li><a href="http://medservice24.pirise.com/wp-login.php?action=lostpassword" class="zm_alr_link zm_alr_login_link " id="zm_alr_login_%d0%b7%d0%b0%d0%b1%d1%8b%d0%bb%d0%b8-%d0%bf%d0%b0%d1%80%d0%be%d0%bb%d1%8c" title="Забыли пароль?">Забыли пароль?</a></li>
									</ul>
								</div>
							</form>
						</div>
					</div>
				</ul>
			</div>
		</div>
		<nav class="main-nav">
			<a href="#" class="opener"><span>Menu</span></a>
			<ul id="menu-menu-1" class="drop">
				<li id="menu-item-124" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-124"><a href="http://medservice24.pirise.com/%d1%81%d0%be%d1%82%d1%80%d1%83%d0%b4%d0%bd%d0%b8%d1%87%d0%b5%d1%81%d1%82%d0%b2%d0%be/">Сотрудничество</a></li>
				<li id="menu-item-121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-121"><a href="http://medservice24.pirise.com/%d0%bd%d0%be%d0%b2%d0%be%d1%81%d1%82%d0%b8/">Новости</a></li>
				<li id="menu-item-108" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-108"><a href="http://medservice24.pirise.com/%d0%ba%d0%be%d0%bd%d1%82%d0%b0%d0%ba%d1%82%d1%8b/">Контакты</a></li>
				<li id="menu-item-169" class="menu-item menu-item-type-post_type_archive menu-item-object-obyavlenia menu-item-169"><a href="http://medservice24.pirise.com/obyavlenia/">Объявления</a></li>
			</ul>
		</nav>
	</header>

  <main role="main" id="main">
    <section class="section">
      <div class="personal-cab box clearfix">

	<div class="page page_registration">

		<div class="form-wrap">
			<h2 class="form__title text-center">Регистрация</h2>

			<div class="tab-panel">
				<div class="tab-head">
					<div class="tab active organization_js">
						Мед учереждение
					</div>
					<div class="tab client_js">
						Клиент
					</div>
				</div>

				<div class="tab-body">
					<div class="tab-content organization active">
						<form action="#" method="post" enctype="multipart/form-data" name="reg_med_organization" class="med-form">
							<div class="med-form__item-group">
								<label for="mf-title" class="med-form__label">Название мед учереждения*</label>
								<input id="mf-title" name="mf_title" type="text" class="med-form__field" required="required">
							</div>

							<div class="med-form__item-group">
								<label for="mf-type" class="med-form__label">Тип заведения</label>
								<input id="mf-type" name="mf_type" type="text" class="med-form__field">
							</div>

							<div class="med-form__item-group">
								<label for="mf-form_of_ownership" class="med-form__label">Форма собственности</label>
								<input id="mf-form_of_ownership" name="mf_form_of_ownership" type="text" class="med-form__field">
							</div>

							<div class="med-form__item-group">
								<label for="mf-contact_person" class="med-form__label">Контактное лицо, ФИО*</label>
								<input id="mf-contact_person" name="mf_contact_person" type="text" class="med-form__field" required="required">
							</div>

							<div class="med-form__item-group">
								<label for="mf-contact_person-post" class="med-form__label">Должность</label>
								<input id="mf-contact_person-post" name="mf_contact_person_post" type="text" class="med-form__field">
							</div>

							<div class="med-form__item-group">
								<label for="mf-contact_person-tel-number" class="med-form__label">Контактный телефон*</label>
								<input id="mf-contact_person-tel-number" name="mf_contact_person_tel_number" type="tel" class="med-form__field phone_js" required="required" placeholder="+38 (0__) ___-__-__">
							</div>

							<div class="med-form__item-group">
								<span class="med-form__label med-form__file-label">Загрузить фото</span>
								<label for="mf-photo" class="med-form__load-label">
									<img src="wp-content/themes/medservice24/images/no_photo.png" alt="med photo" class="med-form__photo">
								</label>
								<input id="mf-photo" name="mf_photo" type="file" accept="image/*,image/jpeg,image/png" class="med-form__field med-form__field_input-file">
							</div>

							<div class="med-form__item-group text-center">
								<button class="med-form__btn btn">Сохранить</button>
							</div>

						</form>
					</div>

					<div class="tab-content client">
						<form action="#" method="post" enctype="multipart/form-data" name="reg_med_client" class="med-form">

							<div class="med-form__item-group">
								<label for="mf-contact_person" class="med-form__label">Контактное лицо, ФИО*</label>
								<input id="mf-contact_person" name="mf_contact_person" type="text" class="med-form__field" required="required">
							</div>

							<div class="med-form__item-group">
								<label for="mf-contact_person-email" class="med-form__label">Почта*</label>
								<input id="mf-contact_person-email" name="mf_contact_person_email" type="email" class="med-form__field">
							</div>

							<div class="med-form__item-group">
								<label for="mf-contact_person-tel-number" class="med-form__label">Контактный телефон*</label>
								<input id="mf-contact_person-tel-number" name="mf_contact_person_tel_number" type="tel" class="med-form__field phone_js" required="required" placeholder="+38 (0__) ___-__-__">
							</div>

							<div class="med-form__item-group">
								<span class="med-form__label med-form__file-label">Загрузить фото</span>
								<label for="mf-photo" class="med-form__load-label">
									<img src="wp-content/themes/medservice24/images/no_photo.png" alt="med photo" class="med-form__photo">
								</label>
								<input id="mf-photo" name="mf_photo" type="file" accept="image/*,image/jpeg,image/png" class="med-form__field med-form__field_input-file">
							</div>

							<div class="med-form__item-group text-center">
								<button class="med-form__btn btn">Сохранить</button>
							</div>

						</form>
					</div>

				</div>
			</div>

		</div>

	</div>

      </div>
    </section>
  </main>



<footer id="footer">
  <div class="container">
    <div class="row">
      <h2>Информация</h2>
    </div>
    <div class="row">
      <div class="col">
        <h3>Сервис</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
      </div>
      <div class="col">
        <h3>Пациенту</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
      </div>
      <div class="col">
        <h3>Контакты</h3>
        <ul>
          <li><a href="tel:0969885566">(096) 988 55 66</a></li>
          <li><a href="tel:0969885566">(096) 988 55 66</a></li>
          <li><a href="tel:0969885566">(096) 988 55 66</a></li>
        </ul>
        <p><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:medinfo@gmail.com">medinfo@gmail.com</a></p>
        <ul class="social">
          <li><a class="twitter" href="#"><img src="http://medservice24.webspectrum.top/wp-content/uploads/2016/10/twitter.png" alt=""></a></li>
          <li><a class="linkedIn" href="#"><img src="http://medservice24.webspectrum.top/wp-content/uploads/2016/10/ln.png" alt=""></a></li>
          <li><a class="googleplus" href="#"><img src="http://medservice24.webspectrum.top/wp-content/uploads/2016/10/g.png" alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- <script src="wp-content/themes/medservice24/js/jquery-3.2.1.js"></script> -->
<script src="wp-content/themes/medservice24/js/jquery.maskedinput.min.js"></script>
<script src="wp-content/themes/medservice24/js/main.js"></script>
  <!-- <script src="http://medservice24.pirise.com/wp-content/themes/medservice24//js/main.js"></script> -->
</body>
</html>
