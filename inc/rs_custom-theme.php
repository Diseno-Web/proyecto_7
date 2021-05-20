<?php
/**
 * web_theme custom-webtheme
 * Añade las opciones de personalizacion al thema
 * 
 * @package web_theme
 */

// array de categorias para las opciones del thema
function get_categories_select() {
 $teh_cats = get_categories();
    $results = [];
    $count = count($teh_cats);
    for ($i=0; $i < $count; $i++) {
      if (isset($teh_cats[$i]))
        $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
      else
        $count++;
    }
  return $results;
}

// configurar las opciones del thema ( nativo de wordpress)

function my_customize_register( $wp_customize ) {
  $wp_customize->add_panel( 'my_custom_options', array(
    'title' => __( 'Mis Opciones', 'textdomain' ),
    'priority' => 160,
    'capability' => 'edit_theme_options',
  ));
 
  // Section para Google Analytics
  $wp_customize->add_section( 'google_analytics_section' , array(
    'title' => __( 'Google Analytics', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 1,
    'capability' => 'edit_theme_options',
  ));

  //Google Analytics
  $wp_customize->add_setting( 'my_google_analytics', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('my_google_analytics', array(
    'label' => __( 'Código de Google Analytics', 'textdomain' ),
    'section' => 'google_analytics_section',
    'priority' => 1,
    'type' => 'textarea',
  ));
  

  //Section para Banner
  $wp_customize->add_section( 'banner_section' , array(
    'title' => __( 'Opciones de Banner', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 2,
    'capability' => 'edit_theme_options',
  ));
    
  //Banner opciones
    
  $wp_customize->add_setting('imagen_upload_01', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));
 
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_upload_01', array(
        'label'    => __('Imagen para Banner01 tamaño 870 x 1210 pixel', 'textdomain'),
        'section'  => 'banner_section',
        'priority' => 1,
        'settings' => 'imagen_upload_01',
  )));
    
    
  $wp_customize->add_setting( 'texto01_banner_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('texto01_banner_section', array(
    'label' => __( 'Titulo para Banner01', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 2,
    'type' => 'text',
  ));
    
  $wp_customize->add_setting( 'texto02_banner_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('texto02_banner_section', array(
    'label' => __( 'SubTitulo para Banner01', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 3,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto03_banner_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('texto03_banner_section', array(
    'label' => __( 'Link para el Boton del Banner 01', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 4,
    'type' => 'text',
  ));
    
// banner imagen 02
    
  $wp_customize->add_setting('imagen_upload_02', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_upload_02', array(
        'label'    => __('Imagen para Banner02 tamaño 870 x 1210 pixel', 'textdomain'),
        'section'  => 'banner_section',
        'priority' => 5,
        'settings' => 'imagen_upload_02',
  )));


  $wp_customize->add_setting( 'texto01_banner2_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto01_banner2_section', array(
    'label' => __( 'Titulo para Banner02', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 6,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto02_banner2_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto02_banner2_section', array(
    'label' => __( 'SubTitulo para Banner02', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 7,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto03_banner2_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto03_banner2_section', array(
    'label' => __( 'Link para el Boton del Banner 02', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 8,
    'type' => 'text',
  ));
    
// banner imagen 03
    
  $wp_customize->add_setting('imagen_upload_03', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_upload_03', array(
        'label'    => __('Imagen para Banner03 tamaño 870 x 1210 pixel', 'textdomain'),
        'section'  => 'banner_section',
        'priority' => 9,
        'settings' => 'imagen_upload_03',
  )));


  $wp_customize->add_setting( 'texto01_banner3_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto01_banner3_section', array(
    'label' => __( 'Titulo para Banner03', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 10,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto02_banner3_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto02_banner3_section', array(
    'label' => __( 'SubTitulo para Banner03', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 11,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto03_banner3_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto03_banner3_section', array(
    'label' => __( 'Link para el Boton del Banner 03', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 12,
    'type' => 'text',
  ));  

 // banner imagen 04
    
  $wp_customize->add_setting('imagen_upload_04', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_upload_04', array(
        'label'    => __('Imagen para Banner04 tamaño 870 x 1210 pixel', 'textdomain'),
        'section'  => 'banner_section',
        'priority' => 13,
        'settings' => 'imagen_upload_04',
  )));


  $wp_customize->add_setting( 'texto01_banner4_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto01_banner4_section', array(
    'label' => __( 'Titulo para Banner04', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 14,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto02_banner4_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto02_banner4_section', array(
    'label' => __( 'SubTitulo para Banner04', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 15,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto03_banner4_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto03_banner4_section', array(
    'label' => __( 'Link para el Boton del Banner 04', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 16,
    'type' => 'text',
  ));       
    
  // banner imagen 05
    
  $wp_customize->add_setting('imagen_upload_05', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_upload_05', array(
        'label'    => __('Imagen para Banner05 tamaño 870 x 1210 pixel', 'textdomain'),
        'section'  => 'banner_section',
        'priority' => 17,
        'settings' => 'imagen_upload_05',
  )));


  $wp_customize->add_setting( 'texto01_banner5_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto01_banner5_section', array(
    'label' => __( 'Titulo para Banner05', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 18,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto02_banner5_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto02_banner5_section', array(
    'label' => __( 'SubTitulo para Banner05', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 19,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto03_banner5_section', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto03_banner5_section', array(
    'label' => __( 'Link para el Boton del Banner 05', 'textdomain' ),
    'section' => 'banner_section',
    'priority' => 20,
    'type' => 'text',
  ));       
      
    
  // Section para Redes Sociales
  $wp_customize->add_section( 'social_section' , array(
    'title' => __( 'Redes Sociales', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 3,
    'capability' => 'edit_theme_options',
  ));
    
    //Redes Sociales: Facebook
  $wp_customize->add_setting( 'my_facebook_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('my_facebook_url', array(
    'label' => __( 'Facebook URL', 'textdomain' ),
    'section' => 'social_section',
    'priority' => 1,
    'type' => 'text',
  ));
 
  //Redes Sociales: Twitter
  $wp_customize->add_setting( 'my_twitter_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('my_twitter_url', array(
    'label' => __( 'Twitter URL', 'textdomain' ),
    'section' => 'social_section',
    'priority' => 2,
    'type' => 'text',
  ));
 
  //Redes Sociales: Google Plus
  $wp_customize->add_setting( 'my_instagram_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('my_instagram_url', array(
    'label' => __( 'Instagram URL', 'textdomain' ),
    'section' => 'social_section',
    'priority' => 3,
    'type' => 'text',
  ));
    
  //Redes Sociales: Linkeding
  $wp_customize->add_setting( 'my_linkedin_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('my_linkedin_url', array(
    'label' => __( 'Linkedin URL', 'textdomain' ),
    'section' => 'social_section',
    'priority' => 4,
    'type' => 'text',
  ));  
    
    

  // Section para Contactanos
  $wp_customize->add_section( 'contactanos_section' , array(
    'title' => __( 'Datos de Contacto', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 4,
    'capability' => 'edit_theme_options',
  ));
    
    
 //Datos de contactos
  $wp_customize->add_setting( 'texto_contactos', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('texto_contactos', array(
    'label' => __( 'Texto de Contactanos', 'textdomain' ),
    'section' => 'contactanos_section',
    'priority' => 1,
    'type' => 'textarea',
  ));
    
  $wp_customize->add_setting( 'telefono_contactos', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('telefono_contactos', array(
    'label' => __( 'Telefono de Contacto', 'textdomain' ),
    'section' => 'contactanos_section',
    'priority' => 2,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'email_contactos', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('email_contactos', array(
    'label' => __( 'Email de Contacto', 'textdomain' ),
    'section' => 'contactanos_section',
    'priority' => 3,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'direccion_contactos', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('direccion_contactos', array(
    'label' => __( 'Dirección de Contacto', 'textdomain' ),
    'section' => 'contactanos_section',
    'priority' => 4,
    'type' => 'text',
  ));
    
  
    
  // Section para Nosotros
  $wp_customize->add_section( 'nosotros_section' , array(
    'title' => __( 'Datos de la seccion Nosotros', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 5,
    'capability' => 'edit_theme_options',
  ));
    
    
 //Datos de Nosotros
  $wp_customize->add_setting( 'titulo_nosotros', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('titulo_nosotros', array(
    'label' => __( 'Titulo de Nosotros', 'textdomain' ),
    'section' => 'nosotros_section',
    'priority' => 1,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'Subtitulo_nosotros', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('Subtitulo_nosotros', array(
    'label' => __( 'Sub Titulo de Nosotros', 'textdomain' ),
    'section' => 'nosotros_section',
    'priority' => 2,
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto_nosotros', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('texto_nosotros', array(
    'label' => __( 'Texto de Nosotros', 'textdomain' ),
    'section' => 'nosotros_section',
    'priority' => 3,
    'type' => 'text',
  ));
    
  $wp_customize->add_setting('imagen_nosotros_01', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
  ));
 
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_nosotros_01', array(
        'label'    => __('Imagen para Nosotros 1920 x 1280', 'textdomain'),
        'section'  => 'nosotros_section',
        'priority' => 4,
        'settings' => 'imagen_nosotros_01',
  )));
    
    
  $wp_customize->add_setting( 'nosotros_link', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('nosotros_link', array(
    'label' => __( 'Nosotros URL', 'textdomain' ),
    'section' => 'nosotros_section',
    'priority' => 5,
    'type' => 'text',
  ));
    
    
// Section para Categorias Home
  $wp_customize->add_section( 'categorias_section' , array(
    'title' => __( 'Categorias a Mostrar', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 6,
    'capability' => 'edit_theme_options',
  ));
    
    
//Datos de Categorias Home
// Para obtener la categoria usar
// $micat_test = get_theme_mod('cat_noticias');
// echo($micat_test);


 
  //servicios
  $wp_customize->add_setting( 'title_servicios', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('title_servicios', array(
    'label' => __( 'Texto (html) para Servicios', 'textdomain' ),
    'section' => 'categorias_section',
    'priority' => 1,
    'type' => 'textarea',
  ));


  $wp_customize->add_setting( 'cat_servicios', array(
    'default' => 'uncategorized',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('cat_servicios', array(
    'label'   => 'Elija la categoria para servicios',
    'section' => 'categorias_section',
    'priority' => 1,
    'type'    => 'select',
    'choices' => get_categories_select()
  ));

  //Productos
  $wp_customize->add_setting( 'title_productos', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('title_productos', array(
    'label' => __( 'Texto (html) para la Productos', 'textdomain' ),
    'section' => 'categorias_section',
    'priority' => 2,
    'type' => 'textarea',
  ));

  $wp_customize->add_setting( 'cat_productos', array(
    'default' => 'uncategorized',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('cat_productos', array(
    'label'   => 'Elija la categoria para Productos',
    'section' => 'categorias_section',
    'priority' => 2,
    'type'    => 'select',
    'choices' => get_categories_select()
  ));


  //Testimonios 
  $wp_customize->add_setting( 'title_testimonios', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('title_testimonios', array(
    'label' => __( 'Texto (html) para Testimonios', 'textdomain' ),
    'section' => 'categorias_section',
    'priority' => 3,
    'type' => 'textarea',
  ));

  $wp_customize->add_setting( 'cat_testimonios', array(
    'default' => 'uncategorized',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('cat_testimonios', array(
    'label'   => 'Elija la categoria para Testimonios',
    'section' => 'categorias_section',
    'priority' => 3,
    'type'    => 'select',
    'choices' => get_categories_select()
  ));

  
  //Noticias 
  $wp_customize->add_setting( 'title_noticias', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('title_noticias', array(
    'label' => __( 'Texto (html) para Noticias/Blog ', 'textdomain' ),
    'section' => 'categorias_section',
    'priority' => 4,
    'type' => 'textarea',
  ));

  $wp_customize->add_setting( 'cat_noticias', array(
    'default' => 'uncategorized',
    'capability' => 'edit_theme_options',
  ));
 
  $wp_customize->add_control('cat_noticias', array(
    'label'   => 'Elija la categoria para Noticias',
    'section' => 'categorias_section',
    'priority' => 4,
    'type'    => 'select',
    'choices' => get_categories_select()
  ));


  // Section para Call to action
  $wp_customize->add_section( 'call_to_action' , array(
    'title' => __( 'Llamada a la accion', 'textdomain' ),
    'panel' => 'my_custom_options',
    'priority' => 7,
    'capability' => 'edit_theme_options',
  ));

  //Call to action

  $wp_customize->add_setting('imagen_cta', array(
    'default'           => 'image.jpg',
    'capability'        => 'edit_theme_options',
    'type'           => 'option',

  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imagen_cta', array(
      'label'    => __('Imagen para Llamdada a la accion 1920 x 1280', 'textdomain'),
      'section'  => 'call_to_action',
      'priority' => 1,
      'settings' => 'imagen_cta',
  )));


  $wp_customize->add_setting( 'texto01_cta', array(
  'type' => 'option',
  'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto01_cta', array(
  'label' => __( 'Titulo para Llamada a la accion', 'textdomain' ),
  'section' => 'call_to_action',
  'priority' => 2,
  'type' => 'text',
  ));

  $wp_customize->add_setting( 'texto02_cta', array(
  'type' => 'option',
  'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('texto02_cta', array(
  'label' => __( 'SubTitulo para Llamada a la accion', 'textdomain' ),
  'section' => 'call_to_action',
  'priority' => 3,
  'type' => 'text',
  ));

  $wp_customize->add_setting( 'link_cta', array(
  'type' => 'option',
  'capability' => 'edit_theme_options',
  ));

  $wp_customize->add_control('link_cta', array(
  'label' => __( 'Link para el Boton del Llamada a la accion', 'textdomain' ),
  'section' => 'call_to_action',
  'priority' => 4,
  'type' => 'text',
  ));       
    
    
    
}
add_action( 'customize_register', 'my_customize_register' );
