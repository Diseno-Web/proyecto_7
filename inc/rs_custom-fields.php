<?php 

function your_namespace() {
    wp_enqueue_style( 'web_theme-style', get_stylesheet_uri() );
/*    wp_register_style('your_namespace', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('your_namespace');
    wp_register_script( 'your_namespace', plugins_url('your_script.js',__FILE__ ));
    wp_enqueue_script('your_namespace'); */
}

add_action( 'admin_init','your_namespace');


abstract class WPOrg_Meta_Box
{
    public static function add()
    {
        $screens = ['post', 'wporg_cpt'];  // $screens = array( 'post', 'page', 'book' ) || $screens = get_post_types(); 
        foreach ($screens as $screen) {
            add_meta_box(
                'rs_icon_box',          // Unique ID
                'Icono de la Categoria', // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }
 
    public static function save($post_id)
    {
        if (array_key_exists('wporg_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key',
                $_POST['wporg_field']
            );
			}
			if (array_key_exists('rs_icon_tag', $_POST)) {
				update_post_meta(
                    $post_id,
                    '_rs_icon_tag',
                    $_POST['rs_icon_tag']
                );
            }

    }
 
    public static function html($post)
    {
        $rs_icon_tag = get_post_meta($post->ID, '_rs_icon_tag', true);
        ?>
				<p>
					<label for="rs_icon_tag">Ingrese el Codigo para el icono deseado</label>
                    <?php
                     $cadena = $rs_icon_tag; 
                     $resultado = str_replace('"', "'", $cadena);
                    
                    ?>
                    <input type="text" name="rs_icon_tag" id="rs_icon_tag" placeholder="<?php echo $resultado; ?>" value="<?php echo $resultado; ?>">

                    <a href="https://icons8.com/line-awesome" target="_blank" >Mas Info</a>
                </p>
                
                

        <?php
    }
}
 
add_action('add_meta_boxes', ['WPOrg_Meta_Box', 'add']);
add_action('save_post', ['WPOrg_Meta_Box', 'save']);