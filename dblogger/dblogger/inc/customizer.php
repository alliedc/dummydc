<?php
/**
 * dblogger Theme Customizer
 *
 * @package dblogger
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dblogger_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'dblogger_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dblogger_customize_partial_blogdescription',
		) );
	}
    
    
     $wp_customize->remove_control('blogdescription');
     $wp_customize->remove_section('header_image');
     $wp_customize->remove_section('background_image');
    
     $wp_customize->get_section('title_tagline')->title = __( 'Branding' );  
    
     $wp_customize->add_setting( 'header_image', array(
			'default'                   => '',
			'type'                      => 'theme_mod',
			'capability'                => 'edit_theme_options',
			'sanitize_callback'         => 'esc_url_raw',
		) );
    
     $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,'header_image', array(
            'label'                     => __( 'Header Image', '' ),
            'section'                   => 'title_tagline',
            'settings'                  => 'header_image',
            'context'                   => 'header_image',
            'priority'                  => 20,
            ) 
        ) );
    
    
//
//    require_once( 'lib/theme-info.php' );
//    
//    
//     $wp_customize->add_section( 'dblogger_theme_info', array(
//            'title'                 => __( 'Theme INFO', 'dblogger' ),
//            'priority'              => 0,
//        ) );
//    
//    
//	$wp_customize->add_setting( 'dblogger_info', array(
//		'capability'                => 'edit_theme_options',
//		'sanitize_callback'         => 'sanitize_text_field',
//	) );
//
//	$wp_customize->add_control( new spore_info( $wp_customize, 'dblogger_info', array(
//		'section'                   => 'dblogger_theme_info',
//		'priority'                  => 10,
//	) ) );
    
    
    $wp_customize->add_section('dblogger_header', array(
        'title'                     => __('Header Intro', 'dblogger'),
        'description'               => 'Easily edit your header section',
        'priority'                  => 100,

    ));

    $wp_customize->add_setting( 'dblogger_back_img', array(
        'default'                   => '',
        'type'                      => 'theme_mod',
        'capability'                => 'edit_theme_options',
        'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,'dblogger_back_img', array(
        'label'                     => __( 'Background Image', '' ),
        'section'                   => 'dblogger_header',
        'settings'                  => 'dblogger_back_img',
        'context'                   => 'dblogger_back_img',
        'priority'                  => 1,
        ) 
    ) );

    $wp_customize->add_setting( 'dblogger_heder_text', array(      
        'default'                   => 'Create your own website with our free themes.' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_heder_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Heading', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 2,
    ) );	

    $wp_customize->add_setting( 'dblogger_tagline_text', array(      
        'default'                   => 'WELCOME TO DCRAZED' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_tagline_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Tagline', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 3,
    ) );	

    $wp_customize->add_setting( 'dblogger_button_text', array(      
        'default'                   => 'click more' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 4,
    ) );	


    $wp_customize->add_setting( 'dblogger_button_url', array(      
        'default'                   => 'www.burstfly.com' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 5
    ) );	  

  //**************************  GUIDE SECTION****************************************//    
    
    $wp_customize->add_section('dblogger_guide_section', array(
        'title'                     => __('Guide section', 'dblogger'),
        'description'               => 'Easily edit the index',
        'priority'                  => 101,
    ) );

   /* $wp_customize->add_setting( 'dblogger_guide_check', array( 
        'default'                  => 0,
        'transport'                => 'postMessage',
        'sanitize_callback'        => 'sanitize_text_field',
       ) );

    $wp_customize->add_control( 'dblogger_guide_check', array(
        'type'					   => 'checkbox',
        'label' 				   => __( 'Enable/Disable this section', 'dblogger' ),
        'section'  				   => 'dblogger_guide_section',
        'priority' 				   => 1,
      ) ); */
    
    $wp_customize->add_setting( 'dblogger_guide_icon', array(
			'default'                   => '',
			'type'                      => 'theme_mod',
			'capability'                => 'edit_theme_options',
			'sanitize_callback'         => 'esc_url_raw',
            'transport'                 => 'postMessage',
		) );
    
	 $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,'dblogger_guide_icon', array(
            'label'                     => __( 'Guide Icon', '' ),
            'section'                   => 'dblogger_guide_section',
            'settings'                  => 'dblogger_guide_icon',
            'context'                   => 'dblogger_guide_icon',
            'priority'                  => 2,
            ) 
        ) );
    
    

     $wp_customize->add_setting( 'dblogger_guide_title', array(   
          'default'              =>'How to Guides',
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
      ) );    

     $wp_customize->add_control( 'dblogger_guide_title', array(
        
        'type'						=> 'text',
        'label' 					=> __( 'Title', 'dblogger' ),
        'section'  					=> 'dblogger_guide_section',
        'priority' 					=> 2,
      ) );	   

     $wp_customize->add_setting( 'dblogger_guide_desc', array(
            'default'               => 'Start a blog and earn money online. Learn from
                                    these amazing articles we have created for you 
                                        that help you build any type of blog from scracth.', 
            'sanitize_callback'         => 'sanitize_text_field',
            'transport'                 => 'postMessage',
        ));
    
     $wp_customize->add_control( 'dblogger_guide_desc', array(
            'type'                      => 'textarea',
            'label'                     => __( 'Description', 'dblogger' ),
            'section'                   => 'dblogger_guide_section',
            'priority'                  =>  3,
        ) );
 
    
      global $options_categories;
            $wp_customize->add_setting('dblogger_slide_categories', array(
                'default' => '',
                'type' => 'option',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'dblogger_sanitize_slidecat'
            ));
            $wp_customize->add_control('dblogger_slide_categories', array(
                'label' => __('Slider Category', 'dblogger'),
                'section' => 'dblogger_guide_section',
                'type'    => 'select',
                'description' => __('Select a category for the featured post slider', 'dblogger'),
                'choices'    => $options_categories
            ));
    
     $wp_customize->add_setting(
    'dblogger_post_number',
		array(
            'default' => '6',
			'sanitize_callback' => 'dblogger_sanitize_integer'
		)
    );

    $wp_customize->add_control(
    'dblogger_post_number',
    array(
        'type' => 'integer',
		
        'label' => __('Number Of Slides To Show - i.e 10 (default is 3)','dblogger'),
        'section' => 'dblogger_guide_section',
		
        )
    );
    
    
  //************************** OUR THEME SECTION****************************************//    
    
    $wp_customize->add_section('dblogger_theme_section', array(
        'title'                     => __('Our Theme section', 'dblogger'),
        'description'               => 'Easily edit the index',
        'priority'                  => 102,
    ) );

  /*  $wp_customize->add_setting( 'dblogger_theme_check', array( 
        'default'                  => 1,
        'transport'                => 'postMessage',
        'sanitize_callback'        => 'sanitize_text_field',
       ) );

    $wp_customize->add_control( 'dblogger_theme_check', array(
        'type'					   => 'checkbox',
        'label' 				   => __( 'Enable/Disable this section', 'dblogger' ),
        'section'  				   => 'dblogger_theme_section',
        'priority' 				   => 1,
      ) ); 
*/
      $wp_customize->add_setting( 'dblogger_theme_title', array(      
        'default'                   => 'Our Themes' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
      ) );    

     $wp_customize->add_control( 'dblogger_theme_title', array(
        'type'						=> 'text',
        'label' 					=> __( 'Title', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 2,
      ) );	  

    $wp_customize->add_setting( 'dblogger_theme_button_text', array(      
        'default'                   => 'click more' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_theme_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 4,
    ) );	


    $wp_customize->add_setting( 'dblogger_theme_button_url', array(      
        'default'                   => '#' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_theme_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 5
    ) );	  


    
    $wp_customize->add_setting( 'dblogger_post_related_post_count', 
           array( 
               'default' => '3' ,
               'transport' => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field',
           ) );
	$wp_customize->add_control( 'dblogger_post_related_post_count', 
           array(
			'type' => 'text',
			'section' => 'dblogger_theme_section', // Required, core or custom.
			'label' => __( "Related Post Count", 'dblogger' ),
			//'description' => esc_attr__( 'Example: John Smith <span>CEO, Coni Inc.</span>', 'coni' ),
		) ); 
    
    
    /* Subscribe Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'dblogger_newsletter' ,
			array(
				'priority'    => 110,
				'title'       => esc_html__( 'Subscribe', 'dblogger' ),
				'description' => '',
				
			)
		);
    
       
    $wp_customize->add_setting( 'dblogger_newsletter_disable', 
           array( 
               'default' => 0,
               /*'transport' => 'postMessage',*/
               'sanitize_callback' => 'dblogger_main_sanitize_checkbox',
               'transport'          =>'postMessage',
           ) );
    
	$wp_customize->add_control( 'dblogger_newsletter_disable', array(
			'type'									=> 'checkbox',
			'label' 								=> __( 'Hide Subscribe?', 'dblogger' ),
			'section'  								=> 'dblogger_newsletter',
			'priority' 								=> 1,
            'description' => esc_html__('Check this box to hide subscribe form.', 'dblogger'),
        
	) );	
    
			// Mailchimp Form Title
			$wp_customize->add_setting( 'dblogger_newsletter_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'SUBSCRIBE', 'dblogger' ),
                    'transport'         => 'postMessage', // refresh or postMessage
				)
			);
			$wp_customize->add_control( 'dblogger_newsletter_title',
				array(
					'label'       => esc_html__('Subscribe Form Title', 'dblogger'),
					'section'     => 'dblogger_newsletter',
					'description' => ''
				)
			);

			// Mailchimp action url
			$wp_customize->add_setting( 'dblogger_newsletter_mailchimp',
				array(
					'sanitize_callback' => 'devfly_main_sanitize_url',
					'default'           => '',
                    'transport'         => 'postMessage', // refresh or postMessage
				)
			);
			$wp_customize->add_control( 'dblogger_newsletter_mailchimp',
				array(
					'label'       => esc_html__('MailChimp Action URL', 'dblogger'),
					'section'     => 'dblogger_newsletter',
					'description' => __( 'The newsletter form use MailChimp, please follow <a target="_blank" href="http://kb.mailchimp.com/lists/signup-forms/host-your-own-signup-forms">this guide</a> to know how to get MailChimp Action URL. Example <i>//yourlist.us8.list-manage.com/subscribe/post?u=anything</i>', 'dblogger' )
					
				)
			);
    
     $wp_customize->add_setting( 'dblogger_newsletter_det', array(      
        'default'                   => 'We protect your privacy. We provide you with high quality updates.' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage', // refresh or postMessage              
    ) );    

    $wp_customize->add_control( 'dblogger_newsletter_det', array(
        'type'						=> 'text',
        'label' 					=> __( 'Newsletter Details', 'dblogger' ),
        'section'  					=> 'dblogger_newsletter',
    ) );	
    
}
add_action( 'customize_register', 'dblogger_customize_register' );


function dblogger_sanitize_integer( $input ) {
    	if( is_numeric( $input ) ) {
        return intval( $input );
   	}
	}

function dblogger_sanitize_slidecat( $input ) {
    global $options_categories;
    if ( array_key_exists( $input, $options_categories ) ) {
        return $input;
    } else {
        return '';
    }
}

function dblogger_main_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dblogger_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dblogger_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dblogger_customize_preview_js() {
	wp_enqueue_script( 'dblogger-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dblogger_customize_preview_js' );
