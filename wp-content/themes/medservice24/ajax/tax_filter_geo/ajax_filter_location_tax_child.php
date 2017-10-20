<?php 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

session_start();
$term_id = $_POST['tax_id'];
$_SESSION['geo_term_city'] = $term_id;
$taxonomy_name = 'location_geo';
$args = array(
	'parent' => $term_id,	
); 

$cats = get_terms($taxonomy_name, $args); 

?>
	<select onchange="areaId();" id="area-id" name="area-id">
		<?php 
			echo '<option value="'. $term_id.'">Район</option>';
			if(!empty($term_id)){
				foreach($cats as $cat){
					echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';
				}
			}
		?>
	</select>
	<script type="text/javascript">
		function areaId() {
			var page = jQuery('#area-id').val();
			jQuery.ajax({
				type: "POST",
				url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
				data: {tax_id: page},
				success: function (data) {
					jQuery('#health-facility-doctor').html(data);
				}
			});
		}
	</script>