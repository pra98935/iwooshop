<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if (is_home() || is_single() || is_archive() || is_search()) { ?>

<div class="large-3 columns left sidebar">
	<?php if(is_active_sidebar('sidebar-1')) { 
			dynamic_sidebar('sidebar-1'); 
		} else{ 
			echo '<p style="padding:30% 10%">You need to assign Widgets to <strong>"Shop Sidebar"</strong> in <a href="'.get_site_url().'/wp-admin/widgets.php">Apperance > Widgets</a> to show anything here</p>';
		} 
	?>
</div><!-- end sidebar -->	

<?php }