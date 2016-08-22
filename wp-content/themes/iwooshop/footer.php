<?php
/**
 * The template for displaying the footer
 */
?>
<?php if (!is_page_template('template/front-page.php')) { ?>
            </div><!-- col-md-12 -->
        </div><!-- Row -->
    </div><!-- Container -->

<?php } ?>

</div><!-- Main -->
<!--start of footer-->
<footer class="footer_section">    	
    <div class="footer_set" data-role="header" data-position="fixed" data-fullscreen="true">
        <?php if (!get_theme_mod('disable_footer_section')) { ?>
            <div class="ft_black pad_btm">
            	<div class="container">
                	<div class="row">
                        <!-- Sidebar 1 -->
                        <div class="col-md-3">
                            <?php if (is_active_sidebar('footer-sidebar-1')) : ?>
                                <?php dynamic_sidebar('footer-sidebar-1'); ?>
                            <?php endif; ?>
                        </div>
                        <!-- Sidebar 2 -->
                        <div class="col-md-3">
                            <?php if (is_active_sidebar('footer-sidebar-2')) : ?>
                                <?php dynamic_sidebar('footer-sidebar-2'); ?>
                            <?php endif; ?>
                        </div>
                        <!-- Sidebar 3 -->
                        <div class="col-md-3">
                            <?php if (is_active_sidebar('footer-sidebar-3')) : ?>
                                <?php dynamic_sidebar('footer-sidebar-3'); ?>
                            <?php endif; ?>
                        </div>
                        <!-- Sidebar 4 -->
                        <div class="col-md-3">
                            <?php if (is_active_sidebar('footer-sidebar-4')) : ?>
                                <?php dynamic_sidebar('footer-sidebar-4'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    <div class="footer_btm_block">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-3 col-md-3 col-sm-3"><div class="line_h"><?php echo get_theme_mod( 'left_text_setting' , 'Copyright @ 2016 - All Rights Reserved'); ?></div></div>
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php if (!get_theme_mod('disable_social_icon')) { ?>
                    	<div class="social_icon">
                        	<ul>
                            	<li><a href="<?php echo get_theme_mod('social_icon_facebook','https://www.facebook.com/'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo get_theme_mod('social_icon_google','https://www.googleplus.com/'); ?>" target="_blank"><i class="fa fa-google"></i></a></li>
                                <li><a href="<?php echo get_theme_mod('social_icon_linkedin','https://www.linkedin.com/'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="<?php echo get_theme_mod('social_icon_youtube','https://www.youtube.com/'); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="<?php echo get_theme_mod('social_icon_twitter','https://www.twitter.com/'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo get_theme_mod('social_icon_envelope','https://www.envelope.com/'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-right"><div class="line_h"><?php echo esc_html(get_theme_mod('right_text_setting', 'Privacy - Terms and Conditions')); ?></div></div>
            </div>
        </div>
    </div>
    </div>
</footer><!--end of footer-->

<!-- HTML5 shim and Respond.js' ?> for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js' ?> doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' ?>"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js' ?>"></script>
    <![endif]-->
    
    <!--start of header fixed js-->
    <?php if (get_theme_mod('disable_sticky_header')) { ?>
        <script type="text/javascript">
            jQuery(window).scroll(function() {
                var windscroll = jQuery(window).scrollTop();
                if (windscroll >= 100) {
                    jQuery('header').addClass('fixed_header');
                    jQuery('#main').each(function(i) {
                        if (jQuery(this).position().top <= windscroll - 20) {
                            jQuery('header').removeClass('active2');
                            jQuery('header').eq(i).addClass('active2');
                        }
                    });
            
                } else {
            
                    jQuery('header').removeClass('fixed_header');
                    jQuery('header').removeClass('active2');
                    jQuery('header').addClass('active2');
                }
            
            }).scroll();
                    
        </script>
    <?php } ?>

<?php wp_footer(); ?>
</body>
</html>