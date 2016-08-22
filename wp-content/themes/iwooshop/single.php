<?php
/**
 * The Template for displaying all single posts.
 *
 * @package iwooshop
 */
	
get_header(); 

?>
<div class="main-index big_feature_padd content_pad clearfix">
	<div id="content" class="large-9 left columns" role="main">
		<div class="page-inner">
		<?php	
			while ( have_posts() ) : the_post();
				
				get_template_part( 'content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
						comments_template();
					endwhile; // end of the loop. ?>
		</div> <!-- page-inner -->
	</div><!-- content -->
<?php get_sidebar(); ?>
</div><!-- main-index -->

<?php get_footer(); ?>