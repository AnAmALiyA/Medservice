<?php
[exec]

if ( !function_exists('media_handle_upload') ) {
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	}

$my_post = array(
     'post_title' =>  wp_strip_all_tags( $_POST['name_promo1'] ), //'Название записи', //
     'post_content' => wp_strip_all_tags( $_POST['comment_promo1'] ),  //'А вот и текст. Ура, товарищи!', // 
     'post_status' => 'publish',
     'post_author' => 1,
     'post_category' => array(6)
  );

// Вставляем запись в базу данных
  wp_insert_post( $my_post );


// Для примера возьмём картинку с моего же блога, которая была залита вне структуры wordpress

 // Прикрепим к ранее сохранённому посту
//CONFIRMED Workabily id is found
 $ID_post = get_page_by_title( $_POST['name_promo1'], '', 'post' );
$post_id = $ID_post ->ID;

$description = "Картинка для обложки";
 


//FCK works
$url1 = get_attachment_link( $_FILES['promo_img_1'] );


$tmp1 = download_url($url);




$file_array1 = array();
// Name exist
$file_array1['name'] = $_FILES['promo_img_1']['name'];


$file_array1['tmp_name'] = $_FILES['promo_img_1']['tmp_name'] ; // $tmp1;

$media_id2 = media_handle_sideload( $file_array1, $post_id, $description);

// Проверяем на наличие ошибок
	if( is_wp_error($media_id) ) 
	{
		@unlink($file_array['tmp_name']);
		echo $media_id->get_error_messages();
	}

// 
// Удаляем временный файл
@unlink( $file_array1['tmp_name'] );
 
// Файл сохранён и добавлен в медиатеку WP. Теперь назначаем его в качестве облож
 set_post_thumbnail($post_id, $attachment_id);
[/exec]