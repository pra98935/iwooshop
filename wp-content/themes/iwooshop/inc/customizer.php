<?php
/**
 * Iwooshop Customizer functionality
 */

// Start customizer section
add_action( 'customize_register', 'iwooshop_theme_customizer' );

function iwooshop_theme_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// Remove some section
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_control('header_textcolor');
	// change title of title tage
	$wp_customize->get_section('title_tagline')->title = __( 'General Setting' , 'iwooshop');
	
	
	//Adding Setting for Primary color
	$wp_customize->add_setting('iwooshop_primary_color', array(
	 	'default'  	  => '#337ab7',
	 	'transport'   => 'refresh',
	 	'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iwooshop_primary_color', array(
		'priority' 		=> 0,
		'label' 		=> __( 'Primary Color' , 'iwooshop' ),
		'description' 	=> __( 'This is primary color. ex. button etc' , 'iwooshop' ),
		'section' 		=> 'colors',
		'settings'   	=> 'iwooshop_primary_color',
	) ) );

	//Adding Setting for Secondary color
	$wp_customize->add_setting('iwooshop_secondary_color', array(
	 	'default'  	  => '#337ab7',
	 	'transport'   => 'refresh',
	 	'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iwooshop_secondary_color', array(
		'priority' 		=> 1,
		'label' 		=> __( 'Secondary Color' , 'iwooshop' ),
		'description' 	=> __( 'This is Secondary color. ex. button etc' , 'iwooshop' ),
		'section' 		=> 'colors',
		'settings'   	=> 'iwooshop_secondary_color',
	) ) );

	/*
	 * Adding Section For Header
	 */
	$wp_customize->add_section('header_settings_section', array(
		  	'title'  	 => 'Header section',
		  	'priority'   => 81,
		));

			//Adding Setting for Enable Sticky Header
			$wp_customize->add_setting('disable_sticky_header', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_sticky_header', array(
			 	'label'   => 'Enable Sticky Header',
			  	'section' => 'header_settings_section',
			 	'type'    => 'checkbox',
			));

			//Adding Setting for Search Box
			$wp_customize->add_setting('disable_search_box', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_search_box', array(
			 	'label'   => 'Hide Search Box',
			  	'section' => 'header_settings_section',
			 	'type'    => 'checkbox',
			));

			//Adding Setting for Search Box
			$wp_customize->add_setting('disable_cart', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_cart', array(
			 	'label'   => 'Hide Cart',
			  	'section' => 'header_settings_section',
			 	'type'    => 'checkbox',
			));

			//Adding Setting for Search Box
			$wp_customize->add_setting('disable_phone_num', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_phone_num', array(
			 	'label'   => 'Hide phone number',
			  	'section' => 'header_settings_section',
			 	'type'    => 'checkbox',
			));
			$wp_customize->add_setting('phone_num_text', array(
			 	'default'  => '0-123-456789',
			 	'sanitize_callback' => 'sanitize_text_field',
			));
			$wp_customize->add_control('phone_num_text', array(
			 	'label'   => 'phone number Text',
			  	'section' => 'header_settings_section',
			 	'type'    => 'textbox',
			));
			

	/*
	 * Adding Section For Slider
	 */
		$wp_customize->add_section('slider_settings_section', array(
		  	'title'  => 'Home Page Slider',
		  	'priority'   => 82,
		));

			//adding setting for Enable slider
			$wp_customize->add_setting('slider_setting', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('slider_setting', array(
			 	'label'   => 'Disable Home Page slider',
			  	'section' => 'slider_settings_section',
			 	'type'    => 'checkbox',
			));
			
			// Slide 1 Setting

			$wp_customize->add_setting( 'slider_image1', array(
		        'default' => get_template_directory_uri() . '/images/banner1.jpeg',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
		     
		        'label'    => __( 'First Slide Image', 'iwooshop' ),
		        'section'  => 'slider_settings_section',
		        'settings' => 'slider_image1',
		    ) ) ); 


		    // Slide Text
			$wp_customize->add_setting('slider1_text', array(
				'default'  => __('<div class="heading" data-animate-in="fadeInUp" data-animate-out="fadeInUp" data-delay="800"><span>Dummy text</span></div><div class="sub_head" data-animate-in="fadeInUp" data-animate-out="fadeInUp" data-delay="1300">Welcome to Themes Evolved</div><p class="text-center" data-animate-in="fadeInUp" data-animate-out="fadeInUp" data-delay="1500">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since industry standard dummy text ever since</p><div class="shop_now" data-animate-in="fadeInUp" data-animate-out="fadeInUp" data-delay="1700"><a href="">Shop Now</a></div>' , 'iwooshop'),
				'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('slider1_text', array(
			 	'label'   => 'First Slide Text',
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('slider1_btn', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('slider1_btn', array(
			 	'label'   => "First Slider Link",
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textbox',
			));

			// Slide 2 Setting

			$wp_customize->add_setting( 'slider_image2', array(
		        'default' => get_template_directory_uri() . '/images/banner2.jpeg',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
		     
		        'label'    => __( 'Second Slider Image', 'iwooshop' ),
		        'section'  => 'slider_settings_section',
		        'settings' => 'slider_image2',
		    ) ) ); 
		    
		    // Slide Text
			$wp_customize->add_setting('slider2_text', array(
			 	'default'  => __('will be distracted by the readable content of a page when lookingat its layout. The point of using Lorem Ipsum' , 'iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));
			$wp_customize->add_control('slider2_text', array(
			 	'label'   => 'Second Slide Text',
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('slider2_btn', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('slider2_btn', array(
			 	'label'   => "Second Slider Link",
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textbox',
			));


			// $wp_customize->add_setting('slider2_text', array(
			//  	'default'  => __('','iwooshop'),
			//  	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			// ));

			// $wp_customize->add_control('slider2_text', array(
			//  	'label'   => "First Product Category content",
			//   	'section' => 'product_category_section',
			//  	'type'    => 'textarea',
			// ));


			// Slide 3 Setting

			$wp_customize->add_setting( 'slider_image3', array(
		        'default' => get_template_directory_uri() . '/images/banner1.jpeg',
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
		     
		        'label'    => __( 'Third Slider Image', 'iwooshop' ),
		        'section'  => 'slider_settings_section',
		        'settings' => 'slider_image3',
		    ) ) ); 
		    // Slider Text
			$wp_customize->add_setting('slider3_text', array(
			 	'default'  => __('Sliding Image 3' , 'iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));
			$wp_customize->add_control('slider3_text', array(
			 	'label'   => 'Third Slide Text',
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textarea',
			));


			$wp_customize->add_setting('slider3_btn', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('slider3_btn', array(
			 	'label'   => "Third Slider Link",
			  	'section' => 'slider_settings_section',
			 	'type'    => 'textbox',
			));

	/*
	 * Adding Setting for Categories section
	 */

		$wp_customize->add_section('product_category_section', array(
		  	'title'  => 'Product Category Section',
		  	'priority'   => 84,
		));

			$wp_customize->add_setting('disable_categories_section', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_categories_section', array(
			 	'label'   => 'Disable category Section',
			  	'section' => 'product_category_section',
			 	'type'    => 'checkbox',
			));

			// First Category

			$wp_customize->add_setting( 'first_category_image', array(
		        'default' => get_template_directory_uri() . '/images/iwooshop_default.jpg',
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'first_category_image', array(
		     
		        'label'    => __( 'First Category Image', 'iwooshop' ),
		        'section'  => 'product_category_section',
		        'settings' => 'first_category_image',
		    ) ) );

			$wp_customize->add_setting('first_category_title', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('first_category_title', array(
			 	'label'   => "First Product Category Title",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('first_category_content', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('first_category_content', array(
			 	'label'   => "First Product Category content",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('first_category_link', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('first_category_link', array(
			 	'label'   => "First Product Category Link",
			  	'section' => 'product_category_section',
			 	'type'    => 'textbox',
			));

			// Second Category

			$wp_customize->add_setting( 'second_category_image', array(
		        'default' => get_template_directory_uri() . '/images/iwooshop_default.jpg',
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'second_category_image', array(
		     
		        'label'    => __( 'Second Category Image', 'iwooshop' ),
		        'section'  => 'product_category_section',
		        'settings' => 'second_category_image',
		    ) ) );

			$wp_customize->add_setting('second_category_title', array(
			 	'default'  => __('Girls Cloth','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('second_category_title', array(
			 	'label'   => "Second Product Category Title",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('second_category_content', array(
			 	'default'  => __('Men Cloth','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('second_category_content', array(
			 	'label'   => "Second Product Category content",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('second_category_link', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('second_category_link', array(
			 	'label'   => "Second Product Category Link",
			  	'section' => 'product_category_section',
			 	'type'    => 'textbox',
			));


			// Third Category

			$wp_customize->add_setting( 'third_category_image', array(
		        'default' => get_template_directory_uri() . '/images/iwooshop_default.jpg',
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'third_category_image', array(
		     
		        'label'    => __( 'Third Category Image', 'iwooshop' ),
		        'section'  => 'product_category_section',
		        'settings' => 'third_category_image',
		    ) ) );

			$wp_customize->add_setting('third_category_title', array(
			 	'default'  => __('Men Cloth','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('third_category_title', array(
			 	'label'   => "Third Product Category Title",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('third_category_content', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
			));

			$wp_customize->add_control('third_category_content', array(
			 	'label'   => "Third Product Category content",
			  	'section' => 'product_category_section',
			 	'type'    => 'textarea',
			));

			$wp_customize->add_setting('third_category_link', array(
			 	'default'  => __('','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('third_category_link', array(
			 	'label'   => "Third Product Category Link",
			  	'section' => 'product_category_section',
			 	'type'    => 'textbox',
			));
		

	/*
	* Adding Panel For Products section
	*/
		
		$wp_customize->add_panel( 'product_section_panel', array(
		    'priority'     	 => 86,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => __('Product Section','iwooshop'),
		) );

		/*
		 * Adding Setting for New Product
		 */

			$wp_customize->add_section('product_section', array(
			  	'title'  	=> 'New Product Section',
			  	'priority'  => 0,
				'panel'     => 'product_section_panel'
				    
			));
			
			$wp_customize->add_setting('disable_new_product_section', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_new_product_section', array(
			 	'label'   => 'Disable New Product Section',
			  	'section' => 'product_section',
			 	'type'    => 'checkbox',
			));

			// Title For New Products
			$wp_customize->add_setting('new_product_section_title', array(
			 	'default'  => __('New Products','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('new_product_section_title', array(
			 	'label'   => 'Title For New Product Section',
			  	'section' => 'product_section',
			 	'type'    => 'textbox',
			));

			// Number Of Products
			$wp_customize->add_setting('new_product_no_of_product', array(
			 	'default'  => __('6','iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('new_product_no_of_product', array(
			 	'label'   => 'Disaply Number Of Product',
			  	'section' => 'product_section',
			 	'type'    => 'textbox',
			));

	/*
	 * Adding Section For Featured Product
	 */

		$wp_customize->add_section('featured_product_section', array(
		  	'title'  	=> 'Featured Product Section',
		  	'priority'  => 0,
			'panel'     => 'product_section_panel'
			    
		));

			//Adding Setting for Enable slider
			$wp_customize->add_setting('disable_featured_product_section', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_featured_product_section', array(
			 	'label'   => 'Disable Featured Product section',
			  	'section' => 'featured_product_section',
			 	'type'    => 'checkbox',
			));

			// Add title For Featured Product
			$wp_customize->add_setting('featured_product_section_title', array(
			 	'default'  => __('Featured Product' , 'iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('featured_product_section_title', array(
			 	'label'   => 'Title For Featured Product section',
			  	'section' => 'featured_product_section',
			 	'type'    => 'textbox',
			));

			// Add Number Of  Featured Product
			$wp_customize->add_setting('featured_product_no_of_product', array(
			 	'default'  => '6',
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('featured_product_no_of_product', array(
			 	'label'   => 'Number Of Featured Product',
			  	'section' => 'featured_product_section',
			 	'type'    => 'textbox',
			));

	/*
	 * Adding Section For Best selling Product
	 */
		$wp_customize->add_section('best_selling_product_section', array(
		  	'title'  	=> 'Best Selling Product Section',
		  	'priority'  => 0,
			'panel'     => 'product_section_panel',
		));

			//Adding Setting for Enable slider
			$wp_customize->add_setting('disable_best_selling_product_section', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_best_selling_product_section', array(
			 	'label'   => 'Disable Best Selling Product Section',
			  	'section' => 'best_selling_product_section',
			 	'type'    => 'checkbox',
			));

			//Adding Title For Best Selling Products
			$wp_customize->add_setting('best_selling_product_section_title', array(
			 	'default'  => __('Best Selling Product' , 'iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('best_selling_product_section_title', array(
			 	'label'   => 'Title For Best Selling Product Section',
			  	'section' => 'best_selling_product_section',
			 	'type'    => 'textbox',
			));

			// Number Of  Best Selling Products
			$wp_customize->add_setting('no_of_best_selling_product', array(
			 	'default'  => __('6' , 'iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('no_of_best_selling_product', array(
			 	'label'   => 'Number Of Best Selling Product',
			  	'section' => 'best_selling_product_section',
			 	'type'    => 'textbox',
			));


	/*
	* Adding Panel For Blog section
	*/
		
		$wp_customize->add_panel( 'blog_section_panel', array(
		    'priority'     	 => 88,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => __('Post Section','iwooshop'),
		) );
		
		// Adding Section For Blog Section

		$wp_customize->add_section('blog_section', array(
		  	'title'  	=> 'Blog Section',
		  	'priority'  => 0,
			'panel'     => 'blog_section_panel',
		));

			//Adding Setting for Enable slider
			$wp_customize->add_setting('disable_blog_section', array(
			 	'default'  => false,
			 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
			));

			$wp_customize->add_control('disable_blog_section', array(
			 	'label'   => 'Disable Blog Section',
			  	'section' => 'blog_section',
			 	'type'    => 'checkbox',
			));

			//Adding Number Of Product
			$wp_customize->add_setting('no_of_blog_section', array(
			 	'default'  => __('6' , 'iwooshop'),
			 	'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('no_of_blog_section', array(
			 	'label'   => 'Number Of Blog Post',
			  	'section' => 'blog_section',
			 	'type'    => 'textbox',
			));

			// Adding Section For Testimonial Section

			$wp_customize->add_section('testimonial_section', array(
			  	'title'  => 'Testimonial Section',
			  	'priority'  => 0,
				'panel'     => 'blog_section_panel',
			));
			

				//Adding Setting for Enable slider
				$wp_customize->add_setting('disable_testimonial_section', array(
				 	'default'  => false,
				 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
				));

				$wp_customize->add_control('disable_testimonial_section', array(
				 	'label'   => 'Disable Testimonial Section',
				  	'section' => 'testimonial_section',
				 	'type'    => 'checkbox',
				));

	/*
	* Adding Section For Contact Page
	*/
	
	$wp_customize->add_section('contact_page_settings', array(
	  	'title'  	=> 'Contact Page',
	  	'priority'	=> 90,
	));

		// Contact form Sedtion
		$wp_customize->add_setting('contact_page_form', array(
		 	'default'  => '',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('contact_page_form', array(
		 	'label'   => __('Enter Contact Form Shortcode ', 'iwooshop'),
		  	'section' => 'contact_page_settings',
		 	'type'    => 'textbox',
		));

		// Map Address Sedtion
		$wp_customize->add_setting('contact_page_map', array(
		 	'default'  => 'london',
		 	'sanitize_callback' => 'iwooshop_sanitize_textarea',
		));

		$wp_customize->add_control('contact_page_map', array(
		 	'label'   => __('Enter Contact Form Shortcode ', 'iwooshop'),
		  	'section' => 'contact_page_settings',
		 	'type'    => 'textarea',
		));


	/*
	* Adding Section For Footer Bar
	*/
	$wp_customize->add_section('footer_settings_section', array(
	  	'title'  	=> 'Footer Section',
	  	'priority'	=> 92,
	));

		// Disable Footer Sedtion
		$wp_customize->add_setting('disable_footer_section', array(
		 	'default'  => false,
		 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
		));

		$wp_customize->add_control('disable_footer_section', array(
		 	'label'   => __('Hide Above Footer Section', 'iwooshop'),
		  	'section' => 'footer_settings_section',
		 	'type'    => 'checkbox',
		));

		//Adding Setting For Left Footer Area
		$wp_customize->add_setting('left_text_setting', array(
		 	'default'  => __('Copyright @ 2016 - All Rights Reserved' , 'iwooshop'),
			'sanitize_callback' => 'iwooshop_sanitize_textarea',
		));

		$wp_customize->add_control('left_text_setting', array(
		 	'label'   => 'Footer Left Text',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textarea',
		));

		//Adding Setting For Right Footer text area 1
		$wp_customize->add_setting('right_text_setting', array(
		 	'default'  => __('Privacy - Terms and Conditions', 'iwooshop'),
			'sanitize_callback' => 'iwooshop_sanitize_textarea',
		));

		$wp_customize->add_control('right_text_setting', array(
		 	'label'   => 'Footer Right Text',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textarea',
		));

		//Adding Setting For Social Icon
		$wp_customize->add_setting('disable_social_icon', array(
		 	'default'  => false,
		 	'sanitize_callback' => 'iwooshop_sanitize_checkbox',
		));

		$wp_customize->add_control('disable_social_icon', array(
		 	'label'   => 'Disable Footer social Icon',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'checkbox',
		));

		//Adding Setting For Social Icon Facebook
		$wp_customize->add_setting('social_icon_facebook', array(
		 	'default'  => 'https://www.facebook.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_facebook', array(
		 	'label'   => 'Facebook Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));
		//Adding Setting For Social Icon Google
		$wp_customize->add_setting('social_icon_google', array(
		 	'default'  => 'https://www.googleplus.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_google', array(
		 	'label'   => 'Google Plus Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));
		//Adding Setting For Social Icon Linkedin
		$wp_customize->add_setting('social_icon_linkedin', array(
		 	'default'  => 'https://www.linkedin.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_linkedin', array(
		 	'label'   => 'Linkedin Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));
		//Adding Setting For Social Icon Linkedin
		$wp_customize->add_setting('social_icon_youtube', array(
		 	'default'  => 'https://www.youtube.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_youtube', array(
		 	'label'   => 'Youtube Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));
		//Adding Setting For Social Icon Twitter
		$wp_customize->add_setting('social_icon_twitter', array(
		 	'default'  => 'https://www.twitter.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_twitter', array(
		 	'label'   => 'Twitter Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));
		//Adding Setting For Social Icon Envelope
		$wp_customize->add_setting('social_icon_envelope', array(
		 	'default'  => 'https://www.envelope.com/',
		 	'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('social_icon_envelope', array(
		 	'label'   => 'Envelope Icon Link',
		  	'section' => 'footer_settings_section',
		 	'type'    => 'textbox',
		));

}

// Sanitize helper functions

function iwooshop_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function iwooshop_sanitize_textarea( $text ) {
	return esc_textarea( $text );
} 


add_action('customize_controls_print_styles', 'iwooshop_customizer_css');

function iwooshop_customizer_css(){ ?>

	<style type="text/css">
	.customize-control.customize-control-checkbox {font-size: 17px;font-weight: bold;border-bottom: 1px solid #C4C4C4;}
	.customize-control.customize-control-textbox label input {width: 100%;border-radius: 5px;}
	
	#customize-control-new_product_no_of_product, 
	#customize-control-featured_product_no_of_product,
	#customize-control-no_of_blog_section,
	#customize-control-right_text_setting { border-bottom-color: #000000;border-bottom-style: solid;border-bottom-width: 1px;padding-bottom: 40px;}
	</style>

<?php }

add_action( 'wp_enqueue_scripts', 'customizer_frontend_css' );

function customizer_frontend_css() { ?>

	<style type="text/css">
		 /* Color Section */
		.top_right li i , .blog_normal a , .normal-single a ,
		.header_part li.cart .cart-contents , 
		.header_part li.cart span ,
		.header_part li.cart .cart_box ul li a ,
		footer.footer_section a:hover , .comments-area a ,
		.sidebar_box li a:hover , .sub_item h4 a ,
		/*.products .grid-frame .text-center a*/ ,#tab-reviews a,.pagination a.inactive,
		.products .added_to_cart.wc-forward ,.woocommerce .entry-summary a { 
			color: <?php echo get_theme_mod('iwooshop_secondary_color' , '#337ab7'); ?>;
		}

		.cart_item .product-name > a , .woocommerce-info .showcoupon { 
			color: <?php echo get_theme_mod('iwooshop_secondary_color' , '#337ab7'); ?> !important;
		}
		
		.nav li:hover , .normal-row-meta .post-date.large.date , .search-form .search-submit ,
		.sidebar_box h4::after, .normal-single h2::after, .comment-form .submit ,.pagination .current,
		.comment-respond h2.comment-reply-title::after, .cart_totals h2::after, .coupon h3::after, .related.products h2::after, .checkout h3::after, .logged-in .woocommerce h2::after, .page_thumb_main h2::after ,
		.newsletter .newsletter-submit , .thumb_read_more a , .contact_form input[type="submit"] {
			background-color : <?php echo get_theme_mod('iwooshop_primary_color' , '#337ab7'); ?>;
		}

		.add_cart > a , .read_more > a ,
		.top_search input[type="submit"] , .thumb_read_more .btn.btn-primary ,
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button ,
		.cart_totals .checkout-button, #place_order {
			background-color : <?php echo get_theme_mod('iwooshop_primary_color' , '#337ab7'); ?> !important;
		}

		.woocommerce .woocommerce-info {
		    border-top-color: <?php echo get_theme_mod('iwooshop_primary_color' , '#337ab7'); ?> !important;
		}
		
		.sub_heading span {
    		border-bottom-color: <?php echo get_theme_mod('iwooshop_primary_color' , '#337ab7'); ?> !important;
		}
		
		.header_part li.cart .cart_box {
			border-color: <?php echo get_theme_mod('iwooshop_primary_color' , '#337ab7'); ?> !important;
		}

	</style>

<?php }