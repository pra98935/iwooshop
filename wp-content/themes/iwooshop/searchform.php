<?php 
/*
 * The template for displaying search forms
 */
?>
<form role="search" method="get" class="search-form clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<?php /* <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'iwooshop' ); ?></span> */ ?>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'iwooshop' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'iwooshop' ); ?></span></button>
</form>