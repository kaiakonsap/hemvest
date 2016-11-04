<?php

function widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Jaluse  vorm', 'hemvest2016' ),
		'id'            => 'footer',
		'description'   => __( 'Lisa vorm jalusesse.', 'hemvest2016' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
   ) );
}
add_action( 'widgets_init', 'widgets_init' );

function register_my_menu()
{
  register_nav_menus( array(
   'left-header-menu' => 'Left Header Menu',
   'right-header-menu' => 'Right Header Menu',
   ) );
}

add_action('init', 'register_my_menu');
add_theme_support('post-thumbnails');

if (function_exists('add_theme_support')) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 210, 139, true);
  update_option('thumbnail_size_w', 210);
  update_option('thumbnail_size_h', 139);
}



function scripts() {

	wp_enqueue_style( 'styles', get_template_directory_uri().'/screen.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,300' );
	wp_enqueue_style( 'merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300' );
  wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/af5e7f14e0.js', array( 'jquery' ) );

  wp_enqueue_script( 'func', get_template_directory_uri().'/js/functions.js', array( 'jquery' ) );
  wp_enqueue_script( 'bootstrap1', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );


}
add_action( 'wp_enqueue_scripts', 'scripts' );


$args = array(
  'width'         => 130,
  'height'        => 130,
  'default-image' => get_template_directory_uri() . '/images/hemvest_logo.png',
  );
add_theme_support( 'custom-header', $args );

function create_posttype() {

  register_post_type( 'flat',
    array(
      'labels' => array(
        'name' => __('Korterid', 'hemvest2016'),
        'singular_name' => __('Korter', 'hemvest2016')
        ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('korterid', 'hemvest2016')),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        )
      )
    );

  register_post_type( 'feedback',
    array(
      'labels' => array(
        'name' => __( 'Tagasiside', 'hemvest2016' ),
        'singular_name' => __( 'Tagasiside', 'hemvest2016' )
        ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __( 'tagasiside', 'hemvest2016' )),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        )
      )
    );

}

add_action( 'init', 'create_posttype' );
add_action( 'init', 'create_tax' );

function create_tax() {
	register_taxonomy(
		'flatcat',
		'flat',
		array(
			'label' => __( 'Korterite kategooria', 'hemvest2016' ),
			'rewrite' => array( 'slug' => 'korteritekategooria' ),
			'hierarchical' => true,
      )
   );
}
add_post_type_support( 'flat', 'excerpt' ) ;
add_post_type_support( 'post', 'excerpt' ) ;
function custom_excerpt_length($text) {
  global $post;
  if ($post->post_type == 'post') {
    return substr($text, 0, 563);
  }
  else if ($post->post_type == 'flat') {
    return substr($text, 0, 371);
  }
  else {
    return substr($text, 0, 371);
    
  }
}
add_filter( 'wp_trim_excerpt', 'custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
  return '';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function customize_register( $wp_customize ) {


  $wp_customize->add_section(
    'footer_setting_section',
    array(
      'title' => 'Jaluse sätted',
      'description' => 'Muuda siit jaluse tekste.',
      'priority' => 9999,
      )
    );  
        //Add a setting
  $wp_customize->add_setting(
   'show_footer_text',
   array(
    'show_footer_text',
    'transport'   => 'postMessage'
    )
   );

    //Add control
  $wp_customize->add_control(
    'show_footer_text',
    array(
      'type' => 'checkbox',
      'label' => 'Show footer text',
      'section' => 'footer_setting_section'
      )
    );
    //Add a setting
  $wp_customize->add_setting(
    'footer_text_company',
    array(
     'default' => 'HEMVEST OÜ',
     'transport'   => 'postMessage'
     )
    );    
    //Add control
  $wp_customize->add_control(
    'footer_text_company',
    array(
      'label' => 'Firma nimi',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
    //Add a setting
  $wp_customize->add_setting(
    'footer_text_contact',
    array(
     'default' => 'Alina Kester',
     'transport'   => 'postMessage'
     )
    );

    //Add control
  $wp_customize->add_control(
    'footer_text_contact',
    array(
      'label' => 'Kontaktisik',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
     //Add a setting
  $wp_customize->add_setting(
    'footer_text_mail',
    array(
     'default' => 'alina@hemvest.ee',
     'transport'   => 'postMessage'
     )
    );

    //Add control
  $wp_customize->add_control(
    'footer_text_mail',
    array(
      'label' => 'E-mail',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
         //Add a setting
  $wp_customize->add_setting(
    'footer_text_phone',
    array(
     'default' => '+372 5816 4575',
     'transport'   => 'postMessage'
     )
    );

    //Add control
  $wp_customize->add_control(
    'footer_text_phone',
    array(
      'label' => 'Telefon',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
}
add_action('customize_register', 'customize_register');
function childtheme_customizer_live_preview() {
  wp_enqueue_script(
    'customize_register',			
    get_stylesheet_directory_uri().'/js/theme-customizer.js',
    array( 'jquery','customize-preview' ),	
    '1.0',						
    true						
    );
}
add_action( 'customize_preview_init', 'childtheme_customizer_live_preview' );

//nii
function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
  return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
 if (get_post_type()=='flat')
 {

  $classes = array_filter($classes, "remove_parent_classes");

  $term =  get_queried_object()->term_id;
  switch ($term)
  {
    case '8':
    if (in_array('menu-item-47', $classes))
    {
     $classes[] = 'current_page_parent';
   }
   break;
   case '7':
   if (in_array('menu-item-46', $classes))
   {
     $classes[] = 'current_page_parent';
   }
   break;
 }
}
return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');
