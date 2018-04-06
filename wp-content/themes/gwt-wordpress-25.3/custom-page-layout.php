<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GWT
 * @since Government Website Template 2.0
 * Template Name: Homepage
 */

get_header();
include_once('inc/banner.php');
// do_shortcode('[wonderplugin_slider id=1]');
echo do_shortcode('[wonderplugin_slider id=1]');
?>
<?php govph_displayoptions( 'govph_panel_top' ); ?>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div id="main-content" class="container-main" role="document" style="padding: 10px;margin-top: 30px;">
	<div class="row">
		<div id="content" class="col-sm-12" role="main">
			<?php
			get_news();
			function get_news(){
				global $wpdb;
				$children_query = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_parent = 43", $post->post_type );
				$children       = $wpdb->get_results( $children_query );
				// print_r($children);
			}

			 ?>
			<?php
				while( have_posts() ) : the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- entry-content -->
					<div class="entry-content">
						<div class="entry-meta">
							<?php gwt_wp_posted_on(); ?>
							<p></p>
						</div>
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'gwt_wp' ),
								'after'  => '</div>',
							) );
						?>
					</div>

				</article>
				<?php
				endwhile; //end of the loop
			?>
		</div><!-- end content -->

		<?php
		// if(is_active_sidebar('left-sidebar')){
		// 	govph_displayoptions( 'govph_sidebar_left' );
		// }
		?>
		<?php
		// if(is_active_sidebar('right-sidebar')){
		// 	govph_displayoptions( 'govph_sidebar_right' );
		// }
		?>

	</div><!-- end row -->
</div><!-- end main -->

<script>
$(".entry-title").closest(".row").remove();
</script>
<?php
global $wpdb;
$sql = $wpdb->prepare( "SELECT COUNT(id) as y,barangay as label  FROM spt_cases GROUP BY barangay","" );
$brgys       = json_encode( $wpdb->get_results( $sql ),JSON_NUMERIC_CHECK );
?>
<script>
var optionsBrgy = {
	animationEnabled: true,
	title: {
		text: "Crime rate per Barangay"
	},
	axisY: {
		title: "Number of Victims",
		suffix: "",
		includeZero: false
	},
	axisX: {
		title: "Barangays"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#",
    dataPoints: <?php echo $brgys ?>
    // [
		// 	{ label: "Iraq", y: 10.09 },	
		// 	{ label: "T & C Islands", y: 9.40 },
		// 	{ label: "Nauru", y: 8.50 },
		// 	{ label: "Ethiopia", y: 7.96 },	
		// 	{ label: "Uzbekistan", y: 7.80 },
		// 	{ label: "Nepal", y: 7.56 },
		// 	{ label: "Iceland", y: 7.20 }
		// ]
	}]
};
$("#chartBrgy").CanvasJSChart(optionsBrgy);
// if(jQuery("#chartBrgy").length > 0 ){
// 	jQuery("#chartBrgy").html("<p>asdasd</p>")
// }

</script>

<?php govph_displayoptions( 'govph_panel_bottom' ); ?>

<?php get_footer(); ?>
