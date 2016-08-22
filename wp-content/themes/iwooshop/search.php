<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div class="content_pad">
	<div class="large-9 left columns">
		<?php if ( have_posts() ) { ?>
			
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'iwooshop' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			if (function_exists("iwooshop_pagination")) {
				iwooshop_pagination($post->max_num_pages);
			}

		// If no content, include the "No posts found" template.
		} else {
			get_template_part( 'content', 'none' );
		}
	?>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>