<?php 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(!empty($_POST['tax_id'])){
	session_start();
	
	$term_id = $_POST['tax_id'];
	$_SESSION['geo_term_region'] = $term_id;
	
	if($_SESSION['geo_term_city']){
		$geo_term_city = $_SESSION['geo_term_city'];
	}else{
		$geo_info_ip = geo_location_ip();
	}
	
	$taxonomy_name = 'location_geo';
	$args = array(
		'parent' => $term_id,	
	); 
	$cats = get_terms($taxonomy_name, $args); ?>

		<select name="taxonomy_location_child" id="taxonomy_location_child" onchange="taxonomyOfLocationChild();">
			<?php 
				echo '<option value="0">Город</option>';
				foreach($cats as $cat){
					$select = '';
					if($geo_info_ip['city']['name_ru'] == $cat->name){
						$select = 'selected="selected"';
					}elseif($geo_term_city == $cat->term_id){
						$select = 'selected="selected"';
					}
					echo '<option '. $select .' value="'.$cat->term_id.'">'.$cat->name.'</option>';
				}
			?>
		</select>
		<script type="text/javascript">
			jQuery( document ).ready(function() {
				taxonomyOfLocationChild();
			});
			function taxonomyOfLocationChild(){
				var page = jQuery('#taxonomy_location_child').val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_location_tax_child.php",
					data: {tax_id: page},
					success: function(data) {
						jQuery('#ajax-taxonomy-child').html(data);
					}
				});
				jQuery.ajax({
				type: "POST",
				url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
				data: {tax_id: page},
				success: function (data) {
					jQuery('#health-facility-doctor').html(data);
					
					}
				});
			};
		</script>
<?php } else {?>
	<select id="" name="" onchange="">
		<option value=""><?php _e( 'Город', 'medservice24' ); ?></option>
	</select>
<?php } ?>

