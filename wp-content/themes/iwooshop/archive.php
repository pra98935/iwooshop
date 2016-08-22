<?php
/**
 * The template for displaying archive pages
 */
get_header(); ?>
<div class="content_pad clearfix">
	<div id="content" class="large-9 left columns" role="main">
		<div class="page-inner" id="blog-landing">
				
		<?php if ( have_posts() ) { ?>

				<div class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</div><!-- .page-header -->

				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'content' );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				if (function_exists("iwooshop_pagination")) {
					iwooshop_pagination($post->max_num_pages);
				}

			// If no content, include the "No posts found" template.
			} else{
				get_template_part( 'content', 'none' );
			}

		?>
		</div><!-- Page-innner -->
	</div><!-- Large-9 -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>