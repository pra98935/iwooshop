<?php
/**
 * Template Name: Page With Left Sidebar
 */
get_header();
?>

<div class="content_pad">
	<!-- Sidebar -->
	<div class="col-md-3">
	<?php 

		if ( is_page() && is_active_sidebar( 'page-sidebar' ) ) {
			
			dynamic_sidebar( 'page-sidebar' );
				
		} else { 
		    	echo '<p style="padding:6% 0">You need to assign Widgets to <strong>"Page Sidebar"</strong> in <a href="'.get_site_url().'/wp-admin/widgets.php">Apperance > Widgets</a> to show anything here</p>';
		}

	?>
	</div>

	<div class="col-md-9">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page_thumb_main clearfix">
					
					<h2><?php the_title(); ?></h2>
					
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

	</div>
</div>
<?php get_footer(); ?>