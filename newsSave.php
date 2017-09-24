<?php
// помещаем настраницу в вп
// шордкод [exec][/exec] внем пишем пхп (беz <?php  ?>)




// Создаем массив данных новой записи
$post_data = array(
  'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
  'post_content'  => $_POST['post_content'],
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array( 8,39 )
);

// Вставляем запись в базу данных
wp_insert_post( $post_data );


// Создаём объект записи
  $my_post = array(
     'post_title' => 'Название записи', // wp_strip_all_tags( $_POST['post_title'] )
     'post_content' => 'А вот и текст. Ура, товарищи!', // $_POST['post_content']
     'post_status' => 'publish',
     'post_author' => 1,
     'post_category' => array(8,39)
  );

// Вставляем запись в базу данных
  wp_insert_post( $my_post );
?>
//помещаем в function.php для шорткода
/*
function exec_php($matches){
	eval('ob_start();'.$matches[1].'$inline_execute_output = ob_get_contents();ob_end_clean();');
	return $inline_execute_output;
}
function inline_php($content){
	$content = preg_replace_callback('/\[exec\]((.|\n)*?)\[\/exec\]/', 'exec_php', $content);
	$content = preg_replace('/\[exec off\]((.|\n)*?)\[\/exec\]/', '$1', $content);
	return $content;
}
add_filter('the_content', 'inline_php', 0);
*/