<?php
ob_start();
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>    
<![endif]-->

<!--[if !(IE 7) & !(IE 8) & !(IE 9)]><-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <!-- <title><?php wp_title( '|', true, 'right' ); ?></title> -->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main" >
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i> </a>
	<!--start of header-->
    <header>
    	<a class="menu-button" id="loginButton" href="#"><span class="fa fa-bars"></span></a>
        
        <div class="mobile_menu" id="loginBox">
        	<div class="mobile_search">
                <?php if (!get_theme_mod('disable_search_box')) { ?>
                        <div class="top_search">
                            <?php if(is_woocommerce_active()) { ?>
                                <form method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'iwooshop' ); ?>" />
                                    <input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'iwooshop' ); ?>" />
                                    <input type="hidden" name="post_type" value="product" />
                                 </form> 
                            <?php } else{ ?>
                                <form method="get" id="searchform1" action="<?php echo esc_url( home_url() ); ?>/">
                                    <div>
                                        <input type="text" name="s" id="search1" value="" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                                        <input type="submit" id="searchsubmit1" value="Search" class="btn" />
                                    </div>
                                </form>  
                            <?php } ?>
                        </div>
                <?php } ?>
            </div>
            <?php echo wp_nav_menu( array('theme_location' => 'primary',) ); ?>
        </div>
    	
        <div class="header_part">
        	<div class="container">
            	<div class="row">
                	
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    <?php if (get_theme_mod( 'custom_logo' )) {
                            $logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
                        }else{
                            $logo = get_template_directory_uri().'/images/logo.png';
                        }  ?>
                    	<div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="main_logo" /></a></div>
                        <div class="small_logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="sticky_logo" /></a></div>
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8">
                    	<div class="top_right">
                        	<div class="tp_top">
                            	<div class="pull-right">
                                    <ul>
                                        <?php if (!get_theme_mod('disable_phone_num')) { ?>
                                            <li class="contact_us"><i class="fa fa-phone"></i><?php echo get_theme_mod('phone_num_text' , '0-123-456789'); ?></li>
                                        <?php } ?>
                                        
                                        <?php if (!get_theme_mod('disable_cart') && is_woocommerce_active()) { ?>
                                            <li class="cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','iwooshop' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count , 'iwooshop'), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a></span> 
                                                <div class="cart_box">
                                                    <?php
                                                        if (is_active_sidebar( 'header-cart' )) {
                                                            dynamic_sidebar('header-cart');
                                                        }
                                                    ?>
                                                </div>
                                            </li><!-- .mini-cart -->
                                        <?php } ?>
                                        
                                        <?php if (!get_theme_mod('disable_search_box')) { ?>
                                                <li class="top_search">
                                                    <?php if(is_woocommerce_active()) { ?>
                                                        <form method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'iwooshop' ); ?>" />
                                                            <input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'iwooshop' ); ?>" />
                                                            <input type="hidden" name="post_type" value="product" />
                                                         </form> 
                                                    <?php } else{ ?>
                                                        <form method="get" id="searchform2" action="<?php echo esc_url( home_url() ); ?>/">
                                                            <div>
                                                                <input type="text" name="s" id="s2" value="" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                                                                <input type="submit" id="searchsubmit2" value="Search" class="btn" />
                                                            </div>
                                                        </form>  
                                                    <?php } ?>
                                                </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>    
                            </div>
                            
                            <div class="nav">
                            	<?php echo wp_nav_menu( array('theme_location' => 'primary',) ); ?>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

    </header>

    <?php if (!is_page_template('template/front-page.php')) { ?>
    <!--end of header-->
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">

    <?php }