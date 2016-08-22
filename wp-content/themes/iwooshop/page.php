<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * @package iwooshop
 */

get_header();
global $post;

?>

<div class="content_pad">

	<?php while ( have_posts() ) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page_thumb_main clearfix">
			
				<h2><?php the_title(); ?></h2>
			
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					<div class="page-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>

				<div class="page-content">
					<?php the_content();

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				
					wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'iwooshop' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div><!-- .entry-content -->

			</div>
		</article>
	<?php endwhile; ?>

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'iwooshop' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

</div>

<?php get_footer(); ?>