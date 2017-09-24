<?php
// require_once 'med-DAL.php';
//   this ->medDB = new MedDB;

// Создаем массив данных новой записи
$post_data = array(
  'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
  'post_content'  => $_POST['post_content'],
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array( 8,39 )
);

// Вставляем запись в базу данных
$post_id = wp_insert_post( $post_data );

?>