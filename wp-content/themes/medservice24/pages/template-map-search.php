<?php
/*
Template Name: Map Search Page
*/
get_header();
$term_id = $_POST['tax_id'];

if($term_id != 0){
	$geo_term = $term_id;
}else{
	if(!empty($_SESSION['geo_term_city'])){
		$geo_term = $_SESSION['geo_term_city'];
	}else{
		$geo_term = $_SESSION['geo_term_region'];
	}
}

if(!empty($_POST['direction']) && !empty($_POST['direction_type'])){

	$direction = $_POST['direction'];
	$direction_type = $_POST['direction_type'];

	$args = array(
		'post_type' => array( 'health_facility', 'doctor'),
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'location_geo',
				'field'    => 'id',
				'terms'    => array( $geo_term ),
			)
		),
		'meta_query' => array(
			array(
				'key'     => $direction_type,
				'value'   => $direction,
				'compare' => 'LIKE'
			)
		)
	);
	$r_direction = new WP_Query( $args );
	if ( $r_direction->have_posts() ) :
	$id_institutions = array();
	while ( $r_direction->have_posts() ) : $r_direction->the_post(); 
		$id_institutions[] =  $post->ID;
	endwhile;
	endif;
	wp_reset_postdata(); 
}

if(!empty($_POST['title'])){
	$str = $_POST['title'];
	$args = array(
		'post_type' => array( 'health_facility', 'doctor'),
		'post_status' => 'publish',
		'posts_per_page' => -1,
		's' => $str,
		'tax_query' => array(
			array(
				'taxonomy' => 'location_geo',
				'field'    => 'id',
				'terms'    => array( $geo_term ),
			)
		),
	);
	$r_title = new WP_Query( $args );
	if ( $r_title->have_posts() ) :
	$id_title = array();
	while ( $r_title->have_posts() ) : $r_title->the_post(); 
		$id_title[] = $post->ID;
	endwhile;
	endif;
	wp_reset_postdata(); 
	
}
if(!empty($_POST['title']) && !empty($_POST['direction']) && !empty($_POST['direction_type'])){
	$result = array_merge($id_title, $id_institutions);
}elseif(!empty($_POST['direction']) && !empty($_POST['direction_type'])){
	$result = $id_institutions;
}elseif(!empty($_POST['title'])){
	$result = $id_title;
}

$r = new WP_Query( array(
	'post_type' => array( 'health_facility', 'doctor'),
	'post_status' => 'publish',
	'post__in' => $result,
	'posts_per_page' => -1,
));
if ( $r->have_posts() ) :
	while ( $r->have_posts() ) : $r->the_post(); 
		$location_address = get_field('location_address', $post->ID);
		$id_geo_position[] = array(
			'id_post' => $post->ID,
			'id_post_title' => $post->post_title,
			'geo_latitude' => $location_address['lat'],
			'geo_longitude' => $location_address['lng'],
			'location_address' => $location_address['address']
		);
		
	endwhile; 
endif;
wp_reset_postdata();

//count midpoint location
$lat = array();
$lng = array();
foreach ($id_geo_position as $row) {
    $lat[] = $row['geo_latitude'];
    $lng[] = $row['geo_longitude'];
}
$map_lat = array_sum($lat) / count($lat);
$map_lng = array_sum($lng) / count($lng);

?>
<style>
      html, body {
        margin: 0;
        padding: 0;
      }
      #map {
        height: 500px;
      }
    </style>
<div class="container-fluid">
<?php if(!empty($_POST['title']) && !empty($_POST['direction']) && !empty($_POST['direction_type'])){
	echo '<div id="map"></div>';
}elseif(!empty($_POST['direction']) && !empty($_POST['direction_type'])){
	echo '<div id="map"></div>';
}elseif(!empty($_POST['title'])){
	echo '<div id="map"></div>';
}else{
	echo '<div><h3>Извините по Вашему запросу ничего не найдено <a href="'. home_url() .'">перейти к фильтру</a></h3</div>';
}
?>
    <script>
		function initMap() {
			//var center = new google.maps.LatLng(<?php echo $map_lat;?>, <?php echo $map_lng ;?>);
			var center = {lat: <?php echo $map_lat;?>, lng: <?php echo $map_lng;?>};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: center,
				scrollwheel: false
			});

			setMarkers(map);
		}
		var musees = <?php echo json_encode($id_geo_position);?>;
		function setMarkers(map) {
		 
			/*var image = {
				url: '<?php echo home_url(); ?><?php echo $pin_marker;?>',
				size: new google.maps.Size(30, 46),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(0, 46)
			};*/
		  
			
			var infowindow =  new google.maps.InfoWindow({
				content: ''
			});
			
			for (i = 0; i < musees.length; i++) {
				// create a marker
				var marker = new google.maps.Marker({
					title: musees[i].id_post_title,
					position: new google.maps.LatLng(musees[i].geo_latitude, musees[i].geo_longitude),
					map: map,
					//icon: image,
					labelContent: "77",
					labelAnchor: new google.maps.Point(-16, 52),
					labelClass: "labels" // the CSS class for the label
				});
			
				// add an event listener for this marker
				bindInfoWindow(marker, map, infowindow, "<h3>" + musees[i].id_post_title + "</h3><strong>Адрес: </strong>" + musees[i].location_address + "</br>", musees[i].id_post);   
			}
		}
		function bindInfoWindow(marker, map, infowindow, html, musee_id) {
			google.maps.event.addListener(marker, 'click', function () {
					infowindow.setContent(html);
					infowindow.open(map, marker);
					load_post(false, musee_id);
			});
        }
		function load_post(e, pid){
			$.ajax({
				type: "POST",
				url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/map-search.php",
				data: {
					'id_post' : pid,
				},
				cache: false,
                success: function (html) {
                    $("#ajax-map-post").html(html);
                }
			});
		}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClN2dUGU9wlcbuAreLB5rnO66v9CjmFkc&callback=initMap"
        async defer></script>
	<div id="ajax-map-post">
	
	</div>
		
</div>

<?php get_footer(); ?>