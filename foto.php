<?php session_start();
require_once 'authorize.php';
require_once 'action_ajax.php';
require_once 'med-BAL.php';

$auth = new Authorization();
$bal = new Controller();

if (!$auth->IsAuthorized('organization')) {
    $bal->RedirectBack();
}
?>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script type="text/javascript" style="">
        var pathInfo = {
            base: 'http://medservice24.pirise.com/wp-content/themes/medservice24/',
            css: 'css/',
            js: 'js/',
            swf: 'swf/',
        }
    </script>
    <title>MedService24</title>
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="alternate" type="application/rss+xml" title="MedService24 » Лента" href="http://medservice24.pirise.com/feed/">
    <link rel="alternate" type="application/rss+xml" title="MedService24 » Лента комментариев" href="http://medservice24.pirise.com/comments/feed/">
    <script type="text/javascript">
        window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/medservice24.pirise.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.5"}};
        !function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <script src="http://medservice24.pirise.com/wp-includes/js/wp-emoji-release.min.js?ver=4.7.5" type="text/javascript" defer=""></script>
           
    

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="contact-form-7-css" href="http://medservice24.pirise.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.6" type="text/css" media="all">
    <link rel="stylesheet" id="wp-polls-css" href="http://medservice24.pirise.com/wp-content/plugins/wp-polls/polls-css.css?ver=2.73.2" type="text/css" media="all">
    <style id="wp-polls-inline-css" type="text/css">
        .wp-polls .pollbar {
            margin: 1px;
            font-size: 8px;
            line-height: 10px;
            height: 10px;
            background-image: url('http://medservice24.pirise.com/wp-content/plugins/wp-polls/images/default_gradient/pollbg.gif');
            border: 1px solid #c8c8c8;
        }
    </style>
    <link rel="stylesheet" id="wp-postratings-css" href="http://medservice24.pirise.com/wp-content/plugins/wp-postratings/css/postratings-css.css?ver=1.84" type="text/css" media="all">
    <link rel="stylesheet" id="jquery-ui-custom-css" href="http://medservice24.pirise.com/wp-content/plugins/zm-ajax-login-register/assets/jquery-ui.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="ajax-login-register-style-css" href="localmedservice/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="wp-pagenavi-css" href="http://medservice24.pirise.com/wp-content/plugins/wp-pagenavi/pagenavi-css.css?ver=2.70" type="text/css" media="all">
    <link rel="stylesheet" id="base-style-css" href="http://medservice24.pirise.com/wp-content/themes/medservice24/style.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="base-theme-css" href="http://medservice24.pirise.com/wp-content/themes/medservice24/css/styles.css?ver=4.7.5" type="text/css" media="all">
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/mouse.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/resizable.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/draggable.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/button.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/jquery/ui/dialog.min.js?ver=1.11.4"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var _zm_alr_settings = {"ajaxurl":"http:\/\/medservice24.pirise.com\/wp-admin\/admin-ajax.php","login_handle":"","register_handle":"","redirect":"5","wp_logout_url":"http:\/\/medservice24.pirise.com\/wp-login.php?action=logout&redirect_to=http%3A%2F%2Fmedservice24.pirise.com&_wpnonce=2ece200b94","logout_text":"\u0412\u044b\u0439\u0442\u0438","close_text":"Close","pre_load_forms":"zm_alr_misc_pre_load_no","logged_in_text":"\u0412\u044b \u0443\u0436\u0435 \u0430\u0432\u0442\u043e\u0440\u0438\u0437\u0430\u0432\u0430\u043d\u044b","registered_text":"\u0412\u044b \u0443\u0436\u0435 \u0437\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u044b","dialog_width":"265","dialog_height":"auto","dialog_position":{"my":"center top","at":"center top+5%","of":"body"}};
        /* ]]> */
    </script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/zm-ajax-login-register/assets/scripts.js?ver=4.7.5"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/zm-ajax-login-register/assets/login.js?ver=4.7.5"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/zm-ajax-login-register/assets/register.js?ver=4.7.5"></script>
    <link rel="https://api.w.org/" href="http://medservice24.pirise.com/wp-json/">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://medservice24.pirise.com/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://medservice24.pirise.com/wp-includes/wlwmanifest.xml"> 
    <link rel="canonical" href="http://medservice24.pirise.com/">
    <link rel="shortlink" href="http://medservice24.pirise.com/">
    <link rel="alternate" type="application/json+oembed" href="http://medservice24.pirise.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fmedservice24.pirise.com%2F">
    <link rel="alternate" type="text/xml+oembed" href="http://medservice24.pirise.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fmedservice24.pirise.com%2F&amp;format=xml">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJRj7AGnKyouR_PLTZbwgxXAIxqhzq1V8&amp;callback=initMap"></script>
    <style type="text/css">.fancybox-margin{margin-right:17px;}</style><style type="text/css">.fancybox-margin{margin-right:17px;}</style><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/7/intl/ru_ALL/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/7/intl/ru_ALL/util.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/7/intl/ru_ALL/stats.js"></script>
    <link rel="stylesheet" href="css/font-awesome.css"/> <!--Added-->
    <link rel="stylesheet" href="css/style.css"/> <!--Added-->
</head>
<body class="page-template page-template-pages page-template-template-home page-template-pagestemplate-home-php page page-id-5">
    <header id="header">
        <div class="row">
            <div class="logo">
                <a href="http://medservice24.pirise.com">
                    <img src="http://medservice24.pirise.com/wp-content/uploads/2016/10/logo.png" alt="Медсоветник">
                </a>
            </div>
            <div class="select-position">
                <div class="select-holder">
                    <script type="text/javascript">
                        jQuery( document ).ready(function() {
                            taxonomyOfLocation();
                        });
                        function taxonomyOfLocation(){
                            var page = jQuery('#taxonomy_location').val();
                            jQuery.ajax({
                                type: "POST",
                                url: "http://medservice24.pirise.com/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_location_tax.php",
                                data: {tax_id: page},
                                success: function(data) {
                                    jQuery('#ajax-select-filter-geo').html(data);
                                }
                            });
                            jQuery.ajax({
                                type: "POST",
                                url: "http://medservice24.pirise.com/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
                                data: {tax_id: page},
                                success: function (data) {
                                    jQuery('#health-facility-doctor').html(data);

                                }
                            });
                        };
                    </script>
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
                        <script type="text/javascript">
                            jQuery( document ).ready(function() {
                                taxonomyOfLocationChild();
                            });
                            function taxonomyOfLocationChild(){
                                var page = jQuery('#taxonomy_location_child').val();
                                jQuery.ajax({
                                    type: "POST",
                                    url: "http://medservice24.pirise.com/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_location_tax_child.php",
                                    data: {tax_id: page},
                                    success: function(data) {
                                        jQuery('#ajax-taxonomy-child').html(data);
                                    }
                                });
                                jQuery.ajax({
                                    type: "POST",
                                    url: "http://medservice24.pirise.com/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
                                    data: {tax_id: page},
                                    success: function (data) {
                                        jQuery('#health-facility-doctor').html(data);

                                    }
                                });
                            };
                        </script>
                    </div>
                </div>
                <div class="select-holder" id="ajax-taxonomy-child">
                    <select onchange="areaId();" id="area-id" name="area-id">
                        <option value="8">Район</option>
                    </select>
                    <script type="text/javascript">
                        function areaId() {
                            var page = jQuery('#area-id').val();
                            jQuery.ajax({
                                type: "POST",
                                url: "http://medservice24.pirise.com/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
                                data: {tax_id: page},
                                success: function (data) {
                                    jQuery('#health-facility-doctor').html(data);
                                }
                            });
                        }
                    </script>
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
            <div class="return">
                <a href="#">Вернуться к списку</a>
            </div>
            <div class="personal-cab box clearfix">
                <div class="title">
                    <h2>Медицинский центр</h2>
                </div>
                <div class="left-col">
                    <div class="navigation">
                        <ul>
                            <li><a href="/main.php">Основное</a></li>
                            <li><a href="/promo.php">Акции</a></li>
                            <li><a href="/news.php">Новости</a></li>
                            <li><a href="/special.php">Специальные предложения</a></li>
                            <li><a href="/medturism.php">Медтуризм</a></li>
                            <li><a href="/zayavki.php">Заявки пациентов</a></li>
                            <li><a href="/foto.php">Фото</a></li>
                        </ul>
                        <span class="allert-block">Закрыто на ремонт</span>
                    </div>
                </div>
                <div class="right-col">
                
                  <form name="formMultiFoto" action="action.php" method="POST" class="dwnld form-foto-list">
                  
                  <div class="foto-list">
                  
                    <div class="download-holder clearfix">
                        <span class="top-txt">Загрузить файлы</span>
                        
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="photo-holder">
                                <img src="img/empty-img.jpg" alt="empty">
                                <div class="icon-holder">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        
                    </div>
                    </div>
                    <div class="add">
                    <div class="button-add add_foto_js">
                        <span>Добавить</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                    </div>
                    <div class="button-save">
                        <button>Сохранить</button>
                    </div>
                    </form>
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
                        <li><a class="twitter" href="#"><img src="http://medservice24.pirise.com/wp-content/uploads/2016/10/twitter.png" alt=""></a></li>
                        <li><a class="linkedIn" href="#"><img src="http://medservice24.pirise.com/wp-content/uploads/2016/10/ln.png" alt=""></a></li>
                        <li><a class="googleplus" href="#"><img src="http://medservice24.pirise.com/wp-content/uploads/2016/10/g.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var _wpcf7 = {"recaptcha":{"messages":{"empty":"\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430 \u043f\u043e\u0434\u0442\u0432\u0435\u0440\u0434\u0438\u0442\u0435, \u0447\u0442\u043e \u0412\u044b - \u043d\u0435 \u0440\u043e\u0431\u043e\u0442."}}};
        /* ]]> */
    </script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.6"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var pollsL10n = {"ajax_url":"http:\/\/medservice24.pirise.com\/wp-admin\/admin-ajax.php","text_wait":"\u0412\u0430\u0448 \u043f\u043e\u0441\u043b\u0435\u0434\u043d\u0438\u0439 \u0437\u0430\u043f\u0440\u043e\u0441 \u0435\u0449\u0435 \u043e\u0431\u0440\u0430\u0431\u0430\u0442\u044b\u0432\u0430\u0435\u0442\u0441\u044f. \u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430 \u043f\u043e\u0434\u043e\u0436\u0434\u0438\u0442\u0435 ...","text_valid":"\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430 \u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u043e \u0432\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u043e\u0442\u0432\u0435\u0442.","text_multiple":"\u041c\u0430\u043a\u0441\u0438\u043c\u0430\u043b\u044c\u043d\u043e \u0434\u043e\u043f\u0443\u0441\u0442\u0438\u043c\u043e\u0435 \u0447\u0438\u0441\u043b\u043e \u0432\u0430\u0440\u0438\u0430\u043d\u0442\u043e\u0432:","show_loading":"1","show_fading":"1"};
        /* ]]> */
    </script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/wp-polls/polls-js.js?ver=2.73.2"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var ratingsL10n = {"plugin_url":"http:\/\/medservice24.pirise.com\/wp-content\/plugins\/wp-postratings","ajax_url":"http:\/\/medservice24.pirise.com\/wp-admin\/admin-ajax.php","text_wait":"\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u043d\u0435 \u0433\u043e\u043b\u043e\u0441\u0443\u0439\u0442\u0435 \u0437\u0430 \u043d\u0435\u0441\u043a\u043e\u043b\u044c\u043a\u043e \u0437\u0430\u043f\u0438\u0441\u0435\u0439 \u043e\u0434\u043d\u043e\u0432\u0440\u0435\u043c\u0435\u043d\u043d\u043e.","image":"stars","image_ext":"gif","max":"5","show_loading":"1","show_fading":"1","custom":"0"};
        var ratings_mouseover_image=new Image();ratings_mouseover_image.src="http://medservice24.pirise.com/wp-content/plugins/wp-postratings/images/stars/rating_over.gif";;
        /* ]]> */
    </script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/plugins/wp-postratings/js/postratings-js.js?ver=1.84"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/themes/medservice24/js/jquery.main.js?ver=4.7.5"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/themes/medservice24/js/library/slick.min.js?ver=4.7.5"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-content/themes/medservice24/js/common.js?ver=4.7.5"></script>
    <script type="text/javascript" src="http://medservice24.pirise.com/wp-includes/js/wp-embed.min.js?ver=4.7.5"></script>
    <script src="http://medservice24.pirise.com/wp-content/themes/medservice24/js/library/jquery.validate.min.js"></script>
    
    <script src="js/main.js"></script>

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
    <div class="popup-holder">
        <div id="login" class="lightbox coop-form">
            <h2>По вопросам сотрудничества обращайтесь</h2>
            <div role="form" class="wpcf7" id="wpcf7-f90-o2" dir="ltr" lang="en-GB">
                <div class="screen-reader-response"></div>
                <form action="/#wpcf7-f90-o2" method="post" class="wpcf7-form" novalidate="novalidate">
                    <div style="display: none;">
                        <input name="_wpcf7" value="90" type="hidden">
                        <input name="_wpcf7_version" value="4.6" type="hidden">
                        <input name="_wpcf7_locale" value="en_GB" type="hidden">
                        <input name="_wpcf7_unit_tag" value="wpcf7-f90-o2" type="hidden">
                        <input name="_wpnonce" value="8a3f37bc58" type="hidden">
                    </div>
                    <div class="col-75">
                        <label for="input-coop" class="req">Имя</label><span class="wpcf7-form-control-wrap your-name"><input name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="text"></span>
                    </div>
                    <div class="col-75">
                        <label for="input-coop2">Компания</label><span class="wpcf7-form-control-wrap your-company"><input name="your-company" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" type="text"></span>
                    </div>
                    <div class="col-75">
                        <label for="input-coop3" class="req">Телефон</label><span class="wpcf7-form-control-wrap your-tel"><input name="your-tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" type="tel"></span>
                    </div>
                    <div class="col-75">
                        <label for="input-coop4">Сообщение</label><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span>
                    </div>
                    <div class="col-100">
                        <span class="add"> <span class="red">*</span> обязательны для заполнения</span><input value="Отправить" class="wpcf7-form-control wpcf7-submit" type="submit"><span class="ajax-loader"></span>
                    </div>
                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                </form>
            </div>
        </div>
        <div id="register" class="lightbox">
        </div>
    </div>
    <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front" style="top: 582.35px; left: 879px; display: none;" tabindex="-1" role="dialog" aria-describedby="ajax-login-register-login-dialog" aria-labelledby="ui-id-1">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-1" class="ui-dialog-title">Авторизация</span>
            <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" title="Close"><span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">Close</span></button>
        </div>
        <div id="ajax-login-register-login-dialog" class="zm_alr_login_dialog zm_alr_dialog ajax-login-register-container ui-dialog-content ui-widget-content" data-security="6edcae7d21">
            <div id="ajax-login-register-login-target" class="ajax-login-register-login-dialog">Загрузка...</div>
        </div>
    </div>
    <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front" style="top: 582.35px; left: 879px; display: none;" tabindex="-1" role="dialog" aria-describedby="ajax-login-register-dialog" aria-labelledby="ui-id-2">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-2" class="ui-dialog-title">Регистрация</span>
            <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" title="Close"><span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">Close</span></button>
        </div>
        <div id="ajax-login-register-dialog" class="zm_alr_register_dialog zm_alr_dialog ajax-login-register-container ui-dialog-content ui-widget-content" data-security="13295faec6" style="">
            <div id="ajax-login-register-target" class="ajax-login-register-dialog">Загрузка...</div>
        </div>
    </div>
    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-3" tabindex="0" style="display: none;"></ul>
    <span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-4" tabindex="0" style="display: none;"></ul>
    <span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>






</body>
</html>