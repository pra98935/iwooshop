<?php 

/* Template Name: Front Page Template*/

get_header();  

    // Home Page Slider
    if (!get_theme_mod('slider_setting')) : ?>
   
        <div class="slider_animated">

            <div id="slider1" class="owl-carousel owl-theme">
                <div class="item">
                    <img class="img-responsove" alt="Image" src="<?php echo esc_url( get_theme_mod( 'slider_image1' , get_template_directory_uri() . '/images/banner1.jpeg' ) ); ?>" >
                    <div class="banner_content">
                        <?php echo get_theme_mod('slider1_text' , '<div class="heading"> Welcome To Iwooshop </div>'); ?>
                        <br/>
                        <a class="click" href="<?php get_theme_mod('slider1_btn' , '#'); ?>">Shop now</a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsove" alt="Image" src="<?php echo esc_url( get_theme_mod( 'slider_image2' , get_template_directory_uri() . '/images/banner2.jpeg' ) ); ?>" >
                    <div class="banner_content">
                        <?php echo get_theme_mod('slider2_text' , '<div class="heading"> Welcome To Iwooshop </div>'); ?>
                        <br/>
                        <a class="click" href="<?php get_theme_mod('slider2_btn' , '#'); ?>">Shop now</a>
                    </div> 
                </div>
                <div class="item">
                    <img class="img-responsove" alt="Image" src="<?php echo esc_url( get_theme_mod( 'slider_image3' , get_template_directory_uri() . '/images/banner1.jpeg' ) ); ?>" >
                    <div class="banner_content">
                        <?php echo get_theme_mod('slider3_text' , '<div class="heading"> Welcome To Iwooshop </div>'); ?>
                        <br/>
                        <a class="click" href="<?php get_theme_mod('slider3_btn' , '#'); ?>">Shop now</a>
                    </div>
                </div>
            </div>

        </div>
    
    <?php endif; ?>

    <div class="main_content">
        <div class="container">
            <div class="row">
                
            <?php if (!get_theme_mod('disable_categories_section')) : ?>

                <div class="sell_pro pad_btm wow fadeInUp" data-wow-offset="300">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="salpr_sep">
                                    <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="zoom_hover">
                                            <div class="gl_cloth sale_img">
                                                <img class="img-responsive" src="<?php echo esc_url( get_theme_mod( 'first_category_image' , get_template_directory_uri() . '/images/iwooshop_default.jpg' ) ); ?>" alt="Image" >
                                            </div>
                                            <div class="s_content">
                                                <h4><?php echo get_theme_mod('first_category_title' , 'Girls cloth'); ?></h4>
                                                <p><?php echo get_theme_mod('first_category_content' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'); ?></p>
                                                <a class="click" href="<?php get_theme_mod('first_category_link' , '#'); ?>">Shop now</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="zoom_hover">
                                            <div class="boy_cloth sale_img">
                                                <img class="img-responsive" alt="Image" src="<?php echo esc_url( get_theme_mod( 'second_category_image' , get_template_directory_uri() . '/images/iwooshop_default.jpg' ) ); ?>">
                                            </div>
                                            <div class="s_content">
                                                <h4><?php echo get_theme_mod('second_category_title' , 'Men cloth'); ?></h4>
                                                <p><?php echo get_theme_mod('second_category_content' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'); ?></p>
                                                <a class="click" href="<?php get_theme_mod('second_category_link' , '#'); ?>">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="zoom_hover">
                                            <div class="bag sale_img">
                                                <img class="img-responsive" alt="image" src="<?php echo esc_url( get_theme_mod( 'third_category_image' , get_template_directory_uri() . '/images/iwooshop_default.jpg' ) ); ?>">
                                            </div>
                                            <div class="s_content">
                                                <h4><?php echo get_theme_mod('third_category_title' , 'Bags'); ?></h4>
                                                <p><?php echo get_theme_mod('third_category_content' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'); ?></p>
                                                <a class="click" href="<?php get_theme_mod('third_category_link' , '#'); ?>">Shop now</a>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                <?php endif; ?>


                <div class="selling_produts ">
                    <div class="container">

                    <?php
                        /* New Product */
                        if (!get_theme_mod('disable_new_product_section')) {

                            $title = get_theme_mod('new_product_section_title' , 'New Products');
                            $post_pr_page = get_theme_mod('new_product_no_of_product' , '6');
                            echo iwooshop_new_product($title , $post_pr_page);  
                        }  
                        /* Featured Product */
                        if (!get_theme_mod('disable_featured_product_section')) {
                            $title = get_theme_mod('featured_product_section_title' , 'Featured Products');
                            $post_pr_page = get_theme_mod('featured_product_no_of_product' , '6');
                            echo iwooshop_featured_product($title, $post_pr_page);
                        }
                        
                        /* Best Selling */
                        if (!get_theme_mod('disable_best_selling_product_section')) {
                            $title = get_theme_mod('best_selling_product_section_title' , 'Best Selling Product');
                            $post_pr_page = get_theme_mod('no_of_best_selling_product' , '6');
                            echo iwooshop_best_selling_product($title , $post_pr_page);
                        }
                        
                        /* Blog Section */
                        if (!get_theme_mod('disable_blog_section')) {
                            $post_pr_page = get_theme_mod('no_of_blog_section' , '6');
                            echo iwooshop_blog_section($post_pr_page);
                        } 
                    ?>

                    </div><!-- Container -->
                </div><!-- Section -->
                </div>
            </div>
        <?php 
            //<!-- Tastimonial -->
            if (!get_theme_mod('disable_testimonial_section')) { 
                echo iwooshop_testimonial_section(); 
            } 
        ?>
        
        <div class="clearfix"></div>
        </div>
    </div>
<?php get_footer();  ?>