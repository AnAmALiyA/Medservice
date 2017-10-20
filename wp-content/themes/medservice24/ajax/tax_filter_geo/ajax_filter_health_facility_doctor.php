<?php 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$directions_doctor = get_post_meta( 47 , 'field_58049409862a4', true );
$directions_health_facilities = get_post_meta( 48 , 'field_5804958083baf', true );
$term_id = $_POST['tax_id'];

$args = array(
	'post_type' => array( 'health_facility'),
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'location_geo',
			'field'    => 'id',
			'terms'    => array( $term_id ),
		)
	)
);
$r = new WP_Query( $args );
wp_reset_postdata(); 

?>
<script>
jQuery.widget("custom.catcomplete", $.ui.autocomplete, {
		_create: function () {
			this._super();
			this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
		},
		_renderMenu: function (ul, items) {
			var that = this,
				currentCategory = "";
			jQuery.each(items, function (index, item) {
				var li;
				if (item.category != currentCategory) {
					//ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
					currentCategory = item.category;
				}
				li = that._renderItemData(ul, item);
				if (item.category) {
					li.attr("aria-label", item.category + " : " + item.label);
				}
			});
		}
});
jQuery(function () {
	var data = [
		<?php foreach($directions_doctor['choices'] as $row){
			echo '{ label: "'. $row .'", desc: "directions_doctor"},';
		}?>
		<?php foreach($directions_health_facilities['choices'] as $row){
			echo '{ label: "'. $row .'", desc: "directions_health_facilities"},';
		}?>
	];

	jQuery("#direction").catcomplete({
		delay: 0,
		source: data,
		select: function (event, ui) {
			jQuery("#direction_type").val(ui.item.desc);
			return true;
		}
	});
});
jQuery(function () {
	var data = [
	
		<?php foreach($r->posts as $posts){
			echo '{ label: "'. $posts->post_title .'", desc: "'. $posts->ID .'"},';
		}?>
	];

	jQuery("#title").catcomplete({
		delay: 0,
		source: data,
		select: function (event, ui) {
			jQuery("#title_id").val(ui.item.desc);
			return true;
		}
	});
});

</script>
	<?php if($term_id != 0):?>
		<div class="row">
			<div class="col-100">
				<div class="ui-widget">
				
				<form id="map-search" class="search-form" action="<?php echo home_url(); ?>/map-search/" name="mapSearch" method="post">
					<input placeholder="Поиск по специализации" name="direction" id="direction">
					<input type="hidden" id="direction_type" name="direction_type">
				
					<input placeholder="Поиск по названию учреждения" name="title" id="title">
					<input type="hidden" id="title_id" name="title_id">
					<input type="hidden" value="<?php echo $term_id;?>" id="tax_id" name="tax_id">
				</form>
				<form style="display:none;" id="AdvancedSearch" class="search-form" action="<?php echo home_url(); ?>/search/" name="AdvancedSearch" method="post">
					<input type="hidden" value="<?php echo $term_id;?>" id="tax_id" name="tax_id">
				</form>
				</div>
			</div>
		</div>
		
		<div class="row">
			<button form="map-search" type="submit"><?php _e( 'Показать на карте', 'medservice24' ); ?></button> 
			<button form="AdvancedSearch" type="submit"><?php _e( 'Расширенный поиск', 'medservice24' ); ?></button> 
		</div>
	<?php else:?>
		<div class="row">
			<div class="col-100 search-form">
				<h2>Укажите свою локацию</h2>
				<button form="AdvancedSearch" type="submit"><?php _e( 'Расширенный поиск', 'medservice24' ); ?></button> 
			</div>
		</div>
	<?php endif;?>
	