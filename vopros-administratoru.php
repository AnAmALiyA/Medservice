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

	<title>Вопрос администратору</title>

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
	<h2 style="text-center"> У вас есть вопросы:</H2>
	<p> Опишите свой вопрос и администратор сайта с вами свяжетсяю Наш рессурс предназначен<br>
	для пациентов и представителей мед учреждений. Все возможности сайта разработаны<br>
	таким образом что бы пользователям было удобно находить необходимую информацию.</p>
      <div class="personal-cab box clearfix">

	<div class="page page_registration">

		<div class="form-wrap">
			<h2 class="form__title text-center">Задать вопроос администратору сайта</h2>
			<form id="application" action=" application.php" method="POST" name=" application ">
			   <input name="name" id="zayavkaName" maxlength="20" placeholder="Введите ваше имя" required />
			   <label for="name" >Имя*:</label>
			   <input name="company" type="text" id="applicationEmail" maxlength="20" placeholder="Введите вашу организацию" required />
			    <label for="name" >Компания*:</label>
			   <input name="telephone" type="Tel" id="applicationTelephone" maxlength="20" placeholder="Введите ваш телефон" required />
			    <label for="name" >Телефон*:</label>
			    <input name="description" type="text" id="applicationEmail" maxlength="50" placeholder="Введите ваш вопрос" required />
				 <label for="name" >Сообщение*:</label>
				 <p style="color:red">*обязательные поля</p>
			   <button class="applicationButton" type="submit" form="application">Получить прайс </button>
			</form>
			
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
				<p><a href="/kontakty.php">О нас</a>
				<a href="/poltika-konfidentsialnosti.php">Политика конфиденциальности</a>
				<a href="/pravila-servisa">Правила сервиса</a>
				<a href="/vopros-administratoru.php">Вопрос администратору</a>
				<a href="/sotrudnichestvo.php">Сотрудничество</a></p>
				</div>
								<div class="col">
									<h3>Пациенту</h3>
									<p><a href="/diagnostika.php">Диагностика</a>
				<a href="/analizy.php">Анализы</a>
				<a href="/lechenie.php">Лечение</a>
				<a href="/vaktsinatsiya.php">Вакцинация</a>
				<a href="/uslugi.php">Услуги</a>
				<a href="/chasto-zadavaemye-voprosy.php">Часто задаваемые вопросы</a> </p>
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

<script src="wp-content/themes/medservice24/js/jquery-3.2.1.js"></script>
<script src="wp-content/themes/medservice24/js/jquery.maskedinput.min.js"></script>
<script src="wp-content/themes/medservice24/js/main.js"></script>
  <!-- <script src="http://medservice24.pirise.com/wp-content/themes/medservice24//js/main.js"></script> -->

<script type="text/javascript" src="http://medservice24.webspectrum.top/wp-content/plugins/zm-ajax-login-register/assets/scripts.js?ver=4.7.5"></script>
<script type="text/javascript" src="http://medservice24.webspectrum.top/wp-content/plugins/zm-ajax-login-register/assets/login.js?ver=4.7.5"></script>
<script type="text/javascript" src="http://medservice24.webspectrum.top/wp-content/plugins/zm-ajax-login-register/assets/register.js?ver=4.7.5"></script>

</body>
</html>
