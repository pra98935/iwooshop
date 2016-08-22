<?php
/**
 * Template Name: Page with subpage Template
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
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'iwooshop' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div><!-- .entry-content -->
			</div>
		</article>
	<?php endwhile; ?>

	<?php wp_reset_query();?>
	
	<!-- Get Child Page -->
	
	<div class="pageinner-thumb">
       	<div class="row">
            <div class="entry-content">
                
            <?php query_posts(array('showposts' => 20, 'post_parent' => get_the_id(), 'post_type' => 'page', 'order'=>'DESC',)); ?> 
			<?php while (have_posts()) : the_post(); ?>

                <div class="col-sm-4 ">
	                <div class="child_content">
						<div class="subpage_thumb" id="<?php the_ID(); ?>">
							<div class="tumb_inner_img">
								<?php the_post_thumbnail('full');  ?>   
							</div>           	
						</div>
						<div class="child_title <?php the_ID();?>" >
							<?php the_title(); ?>
						</div>
	                	<?php $read_more = '...'; ?>
	                	<p class="subpage_cont"><?php echo $text = wp_trim_words( get_the_content(), 50, $read_more ); ?></p>
	                	<div class="thumb_read_more">
	                		<a href="<?php echo get_permalink($post->ID); ?>">Read More</a>
	                	</div>
	                	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'iwooshop' ) . '</span>', 'after' => '</div>' ) ); ?>
	                </div>
                </div>

            <?php endwhile; ?>
			<?php wp_reset_query(); ?>
                
            </div>
        </div>
	</div>	
	        
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'iwooshop' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

</div>
<?php get_footer(); ?>