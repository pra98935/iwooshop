<?php 
/*
 * Some Custom Helper Functions
 */

/*============================================================
 || WooCommerce Helper Functions
 =============================================================*/
function is_woocommerce_active(){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        return true;
    }
}

// Header Cart Section

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' , 'iwooshop' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() , 'iwooshop' ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
<?php    
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
}

// Remove Cross Sells From Default Position 
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


 /*function for rating and review*/
function product_rating_stars ( $rating ) {
	$number = (!empty($rating)) ? number_format ( $rating, 1 ) : '0.00';
    // Get the integer part of the number
	$intpart = floor ( $number );
	// Get the fraction part
	$fraction = $number - $intpart;
	// Rating is out of 5
	// Get how many stars should be left blank
	$unrated = 5 - ceil ( $number );
	$stars = '';
	// Populate the full-rated stars
	if ( $intpart <= 5 ) {
	    for ( $i=0; $i<$intpart; $i++ )
	    	//$stars .= '<img style="width:15px; height:15px;" src="'.$bluestar.'" />';
	    	$stars .= '<i class="fa fa-star"></i>';
	}

	// Populate the half-rated star, if any
	if ( $fraction == 0.5 ) {
	    //$stars .= '<img style="width:15px; height:15px;" src="'.$halfstar.'" />';
	    $stars .= '<i class="fa fa-star-half"></i>';
	}

	// Populate the unrated stars, if any
	if ( $unrated > 0 ) {
	    for ( $j=0; $j<$unrated; $j++ )
	    	//$stars .= '<img style="width:15px; height:15px;" src="'.$bankstar.'" />';
	    	$stars .= '<i class="fa fa-star-o"></i>';
	}
	return $stars;
}

/*=======================================================================
 || Pagination Helper Functions
 =======================================================================*/
function iwooshop_pagination($pages = '', $range = 4){  
    global $paged;
    $showitems = ($range * 2)+1;  
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }   
    if(1 != $pages){
    echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
    if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
    if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
    for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
            echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        }
    }
    if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

/*==========================================================
 || NEW Product Section
 ============================================================*/

if(!function_exists('iwooshop_new_product')){
	function iwooshop_new_product( $title ='' , $posts_per_page = '') {
		$html = '';
	
		$html .= '<div class="featured_product pad_btm wow fadeInUp" data-wow-offset="300">';
		$html .= '<div class="sub_heading"><span>'.$title.'</span></div>';
        $html .= '<div id="owl-demo" class="owl-carousel">';
        if (is_woocommerce_active()) {
        $args = array( 'post_type' => 'product','posts_per_page' => $posts_per_page );
        $loop = new WP_Query( $args );

        while ($loop->have_posts() ) : $loop->the_post(); 

        global $product ;

        $post_thumbnail = get_the_post_thumbnail($product->post->ID , 'medium');
		
		$html .= '<div class="item">';
        $html .= '<div class="sub_item">';
        $html .= '<div class="showcase">';
        $html .= '<div class="showcase-slide">';
        $html .= '<div class="showcase-content">';
                                            
        if (has_post_thumbnail()) {
            $html .= $post_thumbnail;
        }else {
            $html .= '<img src="'.get_template_directory_uri().'/images/iwooshop_default.jpg" alt="01" />';
        }

        $html .= '</div>';
        $html .= '</div>';
                                    
        $html .= '<h4 class="text-center"><a href="'.$product->get_permalink().'">'.get_the_title().'</a></h4>';
                                    
        $html .= '<div class="review text-center">';
		$html .= product_rating_stars($product->get_average_rating());
		$html .= '</div>';
        $html .= '<div class="text-center"><div class="price">'.$product->get_price_html().'</div></div>';
        $html .= '<div class="prod_add_cart">';
        
        $html .= '<div class="add_cart">';
        
        $html .= do_shortcode('[add_to_cart id="'.$product->id.'" show_price="false"]');
        
        $html .= '</div>';

        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    	
    	endwhile;
        wp_reset_query();

        $html .= '<div class="clearfix"></div>';
        }
        $html .= '</div>';
        $html .= '</div>';

    	return $html;
	}
}

/*=============================================================
|| Featured Product Section
===============================================================*/

if(!function_exists('iwooshop_featured_product')){
	function iwooshop_featured_product($title='' , $posts_per_page){
		$html = '';
	
		$html .='<div class="featured_product pad_btm wow fadeInUp" data-wow-offset="300">';
		$html .= '<div class="sub_heading"><span>'.$title.'</span></div>';
        $html .= '<div id="owl-demo0" class="owl-carousel">';
        if (is_woocommerce_active()) {
            $args = array( 'post_type' => 'product', 'meta_key' => '_featured','posts_per_page' => $posts_per_page,'meta_value' => 'yes' );
            $loop = new WP_Query( $args );

            while ($loop->have_posts() ) : $loop->the_post(); 

            global $product ;

            $post_thumbnail = get_the_post_thumbnail($product->post->ID , 'medium');
    		
    		$html .= '<div class="item">';
            $html .= '<div class="sub_item">';
            $html .= '<div id="'.$product->post->ID.'" class="showcase">';
            $html .= '<div class="showcase-slide">';
            $html .= '<div class="showcase-content">';
                                            
        if (has_post_thumbnail()) {
            $html .= $post_thumbnail;
        }else {
            $html .= '<img src="'.get_template_directory_uri().'/images/iwooshop_default.jpg" alt="01" />';
        }

        $html .= '</div>';
        $html .= '</div>';
                                    
        $html .= '<h4 class="text-center"><a href="'.$product->get_permalink().'">'.get_the_title().'</a></h4>';
                                    
        $html .= '<div class="review text-center">';
        $html .= product_rating_stars($product->get_average_rating());
        $html .= '</div>';
        $html .= '<div class="text-center"><div class="price">'.$product->get_price_html().'</div></div>';
        $html .= '<div class="prod_add_cart">';
        
        $html .= '<div class="add_cart">';
        
        $html .= do_shortcode('[add_to_cart id="'.$product->id.'" show_price="false"]');

        $html .= '</div>';
        
        $html .= '</div>';

        /*<div class="hot_item"><a href=""><img src="<?php echo get_bloginfo('template_directory') . '/images/hot_item.png' ?>"></a></div>*/
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    	
    	endwhile;
        wp_reset_query();

        $html .= '<div class="clearfix"></div>';
        }
        $html .= '</div>';
        $html .= '</div>';

    	return $html;
	}
}

/*=======================================================
|| Best selling Section
=========================================================*/

if(!function_exists('iwooshop_best_selling_product')){
	function iwooshop_best_selling_product($title ='' , $posts_per_page){
		$html = '';
	
		$html .='<div class="featured_product pad_btm wow fadeInUp" data-wow-offset="300">';
		$html .= '<div class="sub_heading"><span>'.$title.'</span></div>';
        $html .= '<div id="owl-demo1" class="owl-carousel">';
        if (is_woocommerce_active()) {
        $args = array( 'post_type' => 'product', 'meta_key' => 'total_sales','posts_per_page' => $posts_per_page,'orderby' => 'meta_value_num');
        $loop = new WP_Query( $args );

        while ($loop->have_posts() ) : $loop->the_post(); 

        global $product;

        $post_thumbnail = get_the_post_thumbnail($product->post->ID , 'medium');
		
		$html .= '<div class="item">';
        $html .= '<div class="sub_item">';
        $html .= '<div class="showcase">';
        $html .= '<div class="showcase-slide">';
        $html .= '<div class="showcase-content">';
                                            
        if (has_post_thumbnail()) {
		$html .= $post_thumbnail;
        }else {
		$html .= '<img src="'.get_template_directory_uri().'/images/iwooshop_default.jpg" alt="01" />';
        }

        $html .= '</div>';
        $html .= '</div>';
                                    
        $html .= '<h4 class="text-center"><a href="'.$product->get_permalink().'">'.get_the_title().'</a></h4>';
                                    
        $html .= '<div class="review text-center">';
        $html .= product_rating_stars($product->get_average_rating());
        $html .= '</div>';
        $html .= '<div class="text-center"><div class="price">'.$product->get_price_html().'</div></div>';
        $html .= '<div class="prod_add_cart">';
        
        $html .= '<div class="add_cart">';
        
        $html .= do_shortcode('[add_to_cart id="'.$product->id.'" show_price="false"]');
        
        $html .= '</div>';
        
        $html .= '</div>';

        /*<div class="hot_item"><a href=""><img src="<?php echo get_bloginfo('template_directory') . '/images/hot_item.png' ?>"></a></div>*/
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    	
    	endwhile;
        wp_reset_query();

        $html .= '<div class="clearfix"></div>';
        }
        $html .= '</div>';
        $html .= '</div>';

    	return $html;
	}
}

/*================================================================
 || Functions For Blog Section
===============================================================*/

if (!function_exists('iwooshop_blog_section')) {
    function iwooshop_blog_section($posts_per_page){ ?>

        <div class="blog_section pad_btm wow fadeInUp" data-wow-offset="300">
            <div id="owl-demo2" class="owl-carousel">
                <?php  
                    $query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => $posts_per_page ) );
                    while ( $query->have_posts() ) : $query->the_post();
                    global $post;
                ?>
                <div class="item">
                    <div class="blog_sep">
                        <div class="bl_head"><?php the_title(); ?></div>
                        <div class="bl_img">
                            <?php if (has_post_thumbnail()) {
                                    echo get_the_post_thumbnail($post->ID , 'medium');
                                }else{
                                    echo '<img alt="image" src="'.get_template_directory_uri().'/images/iwooshop.jpg">';
                                }
                            ?>                                 
                        </div>
                        <p><?php echo substr(strip_tags(get_the_content()),0,200); ?></p>
                        <div class="read_more"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i>Read more</a></div>
                        <div class="date_st"><?php echo get_the_date('d M'); ?></div>
                    <div class="clearfix"></div>
                    </div>
                </div>

                <?php endwhile; 
                    wp_reset_query(); ?>
            </div>
            <div class="clearfix"></div>
        </div>

<?php 
    }
}

/* Testimonial section */

if (!function_exists('iwooshop_testimonial_section')) {
    function iwooshop_testimonial_section(){

        $query = new WP_Query( array( 'category_name' => 'testimonial-category', ) );

        $html = '<div class="client_tesimonial pad_btm">';
        $html.= '<div class="container">';
        $html.= '<div id="owl-demo3" class="owl-carousel">';
        if ( $query->have_posts() ) : 
           while ( $query->have_posts() ) : $query->the_post(); 

        $html.= '<div class="item">';
        $html.= '<div class="testi_sep">';
        /*Image of testimonial*/
        $html.= '<div class="testi_img">';
        $html.= '<a href="">';
        $html.= get_the_post_thumbnail();
        $html.= '</a>';
        $html.= '</div>';

        $html.= '<div class="parr_set">';
        $html.= '<div class="top_qote set_f">';
        $html.= '<i class="fa fa-quote-left">';
        $html.= '</i>';
        $html.= '</div>';

        /*content of testimonial*/
        $html.= get_the_content();

        $html.= '<div class="bottom_qote set_f">';
        $html.= '<i class="fa fa-quote-right">';
        $html.= '</i>';
        $html.= '</div>';
        $html.= '</div>';

        /*Address*/
        $html.= '<div class="f_name">';
        $html.=  '<i class="fa fa-user"></i>';
        /*Title*/
        $html.= get_the_title();
        $html.= '</div>';

        $html.= '</div>';
        $html.=  '</div>';
        endwhile; 
        
        else : 

        $html .= '<div class="item">';
        $html .= '<div class="testi_sep">';
        $html .= '<div class="testi_img"><a href=""><img alt="image" src="'.get_template_directory_uri() . '/images/testimonial.jpeg"></a></div>';
        $html .= '<div class="parr_set"><div class="top_qote set_f"><i class="fa fa-quote-left"></i></div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel hendrerit ligula, tempor fringilla urna. Nunc dapibus a ante eget hendrerit. Curabitur in erat ac est feugiat sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos him <div class="bottom_qote set_f"><i class="fa fa-quote-right"></i></div></div>';
        $html .= '<div class="f_name"><i class="fa fa-user"></i>Constance Wu, Chinese actress</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="item">';
        $html .= '<div class="testi_sep">';
        $html .= '<div class="testi_img"><a href=""><img alt="image" src="'.get_template_directory_uri() . '/images/testimonial.jpeg"></a></div>';
        $html .= '<div class="parr_set"><div class="top_qote set_f"><i class="fa fa-quote-left"></i></div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel hendrerit ligula, tempor fringilla urna. Nunc dapibus a ante eget hendrerit. Curabitur in erat ac est feugiat sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos him <div class="bottom_qote set_f"><i class="fa fa-quote-right"></i></div></div>';
        $html .= '<div class="f_name"><i class="fa fa-user"></i>Constance Wu, Chinese actress</div>';
        $html .= '</div>';
        $html .= '</div>';

        endif; 
        $html .=  '</div>';
        $html .=  '</div>';
        $html .= '</div>';
        
        return $html;
    }
}

/*=======================================================
|| Related Product
=========================================================*/
if(!function_exists('iwooshop_related_product')){
    function iwooshop_related_product( $args ){
        $html = '';
    
        $html .='<div class="featured_product pad_btm wow fadeInUp" data-wow-offset="300">';
        $html .= '<div class="sub_heading"><span>Related Product</span></div>';
        $html .= '<div id="owl-demo6" class="owl-carousel">';
        if (is_woocommerce_active()) {
        $loop = new WP_Query( $args );

        while ($loop->have_posts() ) : $loop->the_post(); 

        global $product;

        $post_thumbnail = get_the_post_thumbnail($product->post->ID , 'medium');
        
        $html .= '<div class="item">';
        $html .= '<div class="sub_item">';
        $html .= '<div class="showcase">';
        $html .= '<div class="showcase-slide">';
        $html .= '<div class="showcase-content">';
                                            
        if (has_post_thumbnail()) {
        $html .= $post_thumbnail;
        }else {
        $html .= '<img src="'.get_template_directory_uri().'/images/iwooshop_default.jpg" alt="01" />';
        }

        $html .= '</div>';
        $html .= '</div>';
        
        $html .= '<div class="text-center">';                    
        $html .= '<h4><a href="'.$product->get_permalink().'">'.get_the_title().'</a></h4>';
                                    
        $html .= '<p>'.substr(get_the_content(), 0, 40).'</p>';
        $html .= '<div class="review">';
        $html .= product_rating_stars($product->get_average_rating());
        /*<img src="<?php echo get_bloginfo('template_directory') . '/images/review.png' ?>">*/
        $html .= '</div>';
        $html .= '<div class="prad">';
        $html .= '<div class="price">'.$product->get_price_html().'</div>';
        $html .= '<div class="add_cart">';
        
        $html .= do_shortcode('[add_to_cart id="'.$product->id.'" show_price="false"]');

        //$html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="clearfix"></div>';
        $html .= '</div>';
        $html .= '</div>'; // Text-center
       
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
        endwhile;
        wp_reset_query();

        $html .= '<div class="clearfix"></div>';
        }
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}

/*==================================================
 || Premium Options
 ===================================================*/
add_action('admin_menu', 'premium_options');

function premium_options() {
    add_theme_page('About Theme', 'About Theme', 'edit_theme_options', 'about-theme', 'about_theme_function');
}

function about_theme_function(){ ?>

    <!-- About Theme Style -->
    <style type="text/css">
        .left_column {float: left;width: 65%;}
        .right_column {float: left;width: 35%;}
        .p_theme_screenshot.theme-screenshot img {height: auto;width: 100%;}
        .right_column .new_link {margin: 12px 0;}
        .right_column .new_link a {padding: 0 14px;}

    </style>

    <?php $premium_site = 'http://themesevolved.com'; ?>

    <div class="wrap">
        <div class="theme-browser">    
        
            <!-- Left Column -->
            <div class="left_column">
                   
                <h2><?php esc_attr_e('About Theme Info', 'iwooshop'); ?></h2>

                <div class="theme-featured">
                    <img src="<?php echo get_template_directory_uri().'/images/free_vs_pro.png' ?>" alt="Image"/>                 
                </div>
                <div class="buy_now" style="text-align:center">
                    <a target="_blank" href="<?php echo $premium_site; ?>/buy-theme" class="button button-primary" style="width:150px">Buy Now</a>
                </div>
                   
            </div><!-- .left_column -->
            <!-- Right Column -->
            <div class="right_column">
                   
                <h3><?php esc_attr_e('Premium Theme', 'iwooshop'); ?></h3>
                <div class="new_link">
                    <a class="button button-primary" target="_blank" href="<?php echo $premium_site; ?>/iwooshopdemo">Live Demo</a>
                    <a class="button button-primary" target="_blank" href="<?php echo $premium_site; ?>/buy-theme">Buy Now</a>
                    <a class="button button-default" target="_blank" href="<?php echo $premium_site; ?>/iwooshopdemo/doc/">Documentation</a>
                </div>

                <div class="p_theme_screenshot theme-screenshot"> 
                    <img src="<?php echo get_template_directory_uri() . '/images/paid_theme.png' ;?>" alt="Image" >
                </div>

            </div><!-- .right_column -->

        </div><!-- .theme-browser -->
    </div><!-- .wrap -->

<?php
}


/* Footer Contact widget section  */

class footer_custom_widgets extends WP_Widget {
    
    function footer_custom_widgets() {
        parent::__construct( false, 'Iwooshop Footer Address Widget' );
    }

    function widget( $args, $instance ) { 
        extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', 
            $instance['title']);
            $address = $instance['text_address'];
            $text_email = $instance['text_email'];
            $text_phone = $instance['text_phone'];
            $text_skype = $instance['text_skype'];
            $text = $instance['text'];
        echo $before_widget;
        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';
            // Check if title is set
            if ( $title ) { echo $before_title . $title . $after_title; }
            // Check if textarea is set
            if( $address ) { echo '<p class="wp_widget_plugin_textarea icon">'.$address.'</p>'; }
            //Check if the Email is set
            if( $text_email ) { echo '<p class="wp_widget_plugin_text icon"><i class="fa fa-envelope-o"></i><a href="mailto:'.$text_email.'">'.$text_email.'</a></p>';}
             //Check if the phone is set
            if( $text_phone ) { echo '<p class="wp_widget_plugin_text icon"><i class="fa fa-phone"></i>'.$text_phone.'</p>'; }
            //Check if the SkypeId is set
            if( $text_skype ) { echo '<p class="wp_widget_plugin_text icon"><i class="fa fa-skype"></i><a href="skype:'.$text_skype.'?chat">'.$text_skype.'</a></p>'; }
            // Check if website link is set
            if( $text ) { echo '<i class="fa fa-link"></i><a href="'.$text.'" target="_blank">'.$text.'</a>'; }
        echo '</div>';
        
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
         $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text_address'] = strip_tags($new_instance['text_address']);
        $instance['text_email'] = strip_tags($new_instance['text_email']);
        $instance['text_phone'] = strip_tags($new_instance['text_phone']);
        $instance['text_skype'] = strip_tags($new_instance['text_skype']);
        $instance['text'] = strip_tags($new_instance['text']);
        return $instance;
    }

    function form( $instance ) {
        // Output admin widget options form
        $address = $title = $email = $phone = $text = $skypeid = '';
        if( $instance) {
            $title = esc_attr($instance['title']);
            $address = esc_textarea($instance['text_address']);
            $email = esc_attr($instance['text_email']);
            $phone = esc_attr($instance['text_phone']);
            $skypeid = esc_attr($instance['text_skype']);
            $text = esc_attr($instance['text']);
        }
    ?>    
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'iwooshop'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo  $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'iwooshop'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text_address'); ?>" name="<?php echo $this->get_field_name('text_address'); ?>"><?php echo $address; ?></textarea>
        </p>

         <p>
            <label for="<?php echo $this->get_field_id('text_skype'); ?>"><?php _e('SkypeID', 'iwooshop'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_skype'); ?>" name="<?php echo $this->get_field_name('text_skype'); ?>" type="text" value="<?php echo $skypeid; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text_email'); ?>"><?php _e('Email:', 'iwooshop'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_email'); ?>" name="<?php echo $this->get_field_name('text_email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text_phone'); ?>"><?php _e('Phone:', 'iwooshop'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_phone'); ?>" name="<?php echo $this->get_field_name('text_phone'); ?>" type="text" value="<?php echo $phone; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Website Link:', 'iwooshop'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" ></input>
        </p>
    <?php
    }
}

//Register widget
function footer_register_widgets() {
    register_widget( 'footer_custom_widgets' );
}
//Add widget funtion in Hook

add_action( 'widgets_init', 'footer_register_widgets' );