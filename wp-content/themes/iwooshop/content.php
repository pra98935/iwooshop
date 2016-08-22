<?php
/**
 * Display All post content 
 */
global $page, $post;
?>
<div class="blog_normal">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
		<!-- meta information -->
		<div class="normal-row-meta">	
			<div class="post-date large date">
				<span class="post-date-day"><?php echo get_the_time('d', get_the_ID()); ?></span>
				<span class="post-date-month" ><?php echo get_the_time('M', get_the_ID()); ?></span>
			</div>

			<div class="normal-title-right">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="tx-div small"></div>
					<div class="entry-meta">
						<?php 
							printf( __( '<span class="meta-author">by <strong><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></strong>.</span> Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>', 'iwooshop' ),
								esc_url( get_permalink() ),
								esc_attr( get_the_time() ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
								esc_attr( sprintf( __( 'View all posts by %s', 'iwooshop' ), get_the_author() ) ),
								get_the_author()
							);
						?>
					</div><!-- .entry-meta -->
			</div><!--normal-title-right-->
			<div class="clearfix"></div>
		</div><!--normal-row-meta-->
	
        <!-- featured image -->
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
			<div class="entry-image">
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('full'); ?>
				</a>
			</div>
		<?php }
        
        // <!-- code for display tag -->
		
		$tags_list = get_the_tag_list( '', __( ', ', 'iwooshop' ) );
		
		if ( $tags_list ) { ?>
			<span class="tags-links normal-tags">
				<?php printf( __( 'Tagged %1$s', 'iwooshop' ), $tags_list ); ?>
			</span>
		<?php } // End if $tags_list ?>

		<!-- code for content section -->
		<div class="entry-content">
			<?php 
			    
				the_content();
				
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iwooshop' ),'after'  => '</div>',) );
			?>
		</div>
		
        <!-- code for Attachment images start -->
        <?php 
            $args = array(
			'post_type'   => 'attachment',
			'numberposts' => -1,
			'post_status' => 'any',
			'post_parent' => $post->ID,
			'exclude'     => get_post_thumbnail_id(),
		);

		$attachments = get_posts($args); ?>

        <div class="bloggallery">
			<?php 
			if ( $attachments ) {
				foreach ( $attachments as $attachment ) {
				 	$image = wp_get_attachment_image_src( $attachment->ID, 'full'); 
				 	$link =wp_get_attachment_url( $attachment->ID );
	                ?>
			 		<a href="<?php echo $link; ?>" data-lightbox="lightbox"><img src="<?php echo $image[0] ?>" /></a>
			<?php }
			}  ?>
		</div>
		<!-- code for Attachment images End -->

        <!-- .entry-meta -->
		<footer class="entry-meta">
			<span class="comments-link right"><?php comments_popup_link( __( 'Leave a comment', 'iwooshop' ), __( '<strong>1</strong> Comment', 'iwooshop' ), __( '<strong>%</strong> Comments', 'iwooshop' ) ); ?></span>
		</footer>
	</article><!-- #post-## -->
</div>