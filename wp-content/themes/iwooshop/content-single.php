<?php
/**
 * Content single template display all single content
 * @package iwooshop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('normal-single'); ?>>
	
	<h2><?php the_title(); ?></h2>

	<!-- check if the post has a Post Thumbnail assigned to it. -->
	<?php if ( has_post_thumbnail() ) {  ?>
		<div class="entry-image">
			<?php the_post_thumbnail(); ?>
			<div class="post-date large">
				<span class="post-date-day"><?php echo get_the_time('d', get_the_ID()); ?></span>
				<span class="post-date-month"><?php echo get_the_time('M', get_the_ID()); ?></span>
			</div>
		</div>
	<?php } ?>

    <!-- entry-content -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array('before' => '<div class="page-links">' . __( 'Pages:', 'iwooshop' ),'after'  => '</div>',) ); ?>
	</div>

	<!-- set condition for share icon -->
	
	<div class="blog-share text-center">
		<div class="tx-div medium"></div>
	 	<div class="share42init" data-url="<?php the_permalink() ?>" data-title="<?php the_title() ?>"></div>
     	<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/share42.js'></script>
	</div>

	<!-- .entry-meta -->
	<?php if ( 'post' == get_post_type() ) : ?>
		<footer class="entry-meta" style="clear:both;">
		<?php /* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'iwooshop' ) );
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'iwooshop' ) );
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( 'Posted in %1$s and Tagged %2$s.', 'iwooshop' );
			} else {
				$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'iwooshop' );
			}

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>
		</footer>
    <?php endif; ?>
    
    <!-- author info -->
    <?php if ( 'post' == get_post_type() ) : ?>
			
			<div class="author-box author_container">
				<div class="row">
					<div class="col-sm-12">
					<div class="large-2 small-3 columns img_box">
						<?php $user = get_the_author_meta('ID'); ?>
						<?php echo get_avatar($user,90); ?>
					</div>
					<div class="large-10 small-9 columns img_cntnt_rgt">
						<h4 class="author-name"><?php _e('by','iwooshop') ?> <?php echo get_the_author_meta('display_name');?></h4>
						<p class="author-desc"><?php echo get_the_author_meta('user_description');?></p>
					</div>
				</div>
				</div>
			</div>
		
	<?php endif; ?>
</article><!-- #post-## -->