<?php
/**
 * Template Name: Contact Template
 */
get_header();

		
	$address = get_theme_mod('contact_page_map' , 'london');
  
    $url = 'http://maps.google.com/maps/api/geocode/json?address='. urlencode($address) . '&sensor=true';
    
    	$response = wp_remote_fopen($url);
        
        $response = json_decode($response, true);

        $valid_address = '';
        
        if ( $response['status'] == 'OK' ) {
        	
	        $lat = $response['results'][0]['geometry']['location']['lat'];
	        $long = $response['results'][0]['geometry']['location']['lng'];
	        
	        $locations[] = array('lat' => $lat,'lng' => $long,'location' => $address,);
	    }else {
	    	$valid_address = 'Please Enter Valid Address';
	    }


    /* Set Default Map Area Using First Location */
    $map_area_lat = isset( $locations[0]['lat'] ) ? $locations[0]['lat'] : '';
    $map_area_lng = isset( $locations[0]['lng'] ) ? $locations[0]['lng'] : '';

    ?>
    
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
	<script>
	  	
		function initMap() {
			var myLatLng = {lat: <?php echo $map_area_lat; ?>, lng: <?php echo $map_area_lng; ?>};

			// Create a map object and specify the DOM element for display.
			var map = new google.maps.Map(document.getElementById('google_map'), {
			    center: myLatLng,
			    scrollwheel: false,
			    zoom: 10
			});

			// Create a marker and set its position.
			var marker = new google.maps.Marker({
			    map: map,
			    position: myLatLng,
			    title: '<?php echo $address; ?>'
			});
		}

	</script>

<div class="content_pad contact_template">
	<div class="row">
		<div class="col-md-12">
			<div class="page_thumb_main clearfix">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="col-md-6 contact_content">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page_thumb_main clearfix">
						
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'iwooshop' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->
					</div>

				</article><!-- #post -->
			<?php endwhile; ?>

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'iwooshop' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->	
		</div> <!-- end content -->

		<!--contact form -->
		<div class="col-md-6 contact_page">
			<?php $contact_form = get_theme_mod('contact_page_form');
			
				if ($contact_form) { echo do_shortcode( $contact_form ); }

			?>
		</div>

		<!-- Map  -->
		<div class="col-md-12 contact_map">

			<?php if ($valid_address) { ?>
					<div style="color:red;padding:30px,0px;"><?php echo $valid_address; ?></div>
			<?php } ?>

			<div id="google_map"></div>
			
		</div>
	</div>
</div>	
<?php get_footer(); ?>