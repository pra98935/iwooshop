<?php
/**
 * The main template file.
 * @package iwooshop
 */
get_header();
?>
<div class="col-md-12">
	<div class="content_pad clearfix">
		<div id="content" class="large-9 left columns" role="main">
			<div class="page-inner" id="blog-landing">
				<?php /* The loop */
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						
							get_template_part( 'content'); 
						
						endwhile;   
						if (function_exists("iwooshop_pagination")) {
							iwooshop_pagination($post->max_num_pages);
						}
				endif; ?>
			</div><!--page-inner -->
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>