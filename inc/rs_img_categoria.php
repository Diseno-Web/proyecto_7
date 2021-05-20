<?php
/* 
  Añadir imagen personalizada en las categorias 

  http://www.juanvt.com/blog/asociar-una-imagen-a-una-categoria-o-taxonomia-con-media-uploader/
  
*/

function categorias_add_new_meta_fields(){
	?>
	<div>
            <label for="term_meta[imagen]">
               <input type="text" name="term_meta[imagen]" size="36" id="upload_image" value=""><br>
               <input id="upload_image_button" type="button" class='button button-primary' value="Subir Imagen" />
               <br/><i>Introduce una URL o establece una imagen para este campo.</i>
            </label>
	</div>
	<?php
}
add_action( 'category_add_form_fields', 'categorias_add_new_meta_fields', 10, 2 );


function categorias_edit_meta_fields($term){
	$t_id = $term->term_id;
 
	$term_meta = get_option("taxonomy_$t_id");
	?>
		<tr valign="top" class='form-field'>
			<th scope="row">Subir imagen</th>
			<td>
				<label for="upload_image">
				    <input id="upload_image" type="text" size="36" name="term_meta[imagen]" value="<?php if( esc_attr( $term_meta['imagen'] ) != "") echo esc_attr( $term_meta['imagen'] ) ; ?>" />
				    <p><input id="upload_image_button" type="button" class='button button-primary' style='width: 100px' value="Subir Imagen" />
				    <i>Introduce una URL o establece una imagen para este campo.</i></p>
				</label>
				<p><?php if( esc_attr( $term_meta['imagen'] ) != "" ) echo "<table><tr><td><i><strong>Imagen actual</strong></i>:</td><td> <img src='".esc_attr( $term_meta['imagen'] )."'></td></tr></table>"; ?></p>
			</td>
		</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'categorias_edit_meta_fields', 10, 2 );

function categorias_save_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_category', 'categorias_save_custom_meta', 10, 2 );  
add_action( 'create_category', 'categorias_save_custom_meta', 10, 2 );


add_action('admin_enqueue_scripts', 'admin_scripts');
 
function admin_scripts() {
    // OJO: Estamos en una taxonomía, así que debemos atender al valor de $_GET['taxonomy']. Podemos cambiar 'category' por el slug de nuestra taxonomía.
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'category') {
        wp_enqueue_media();
        wp_register_script('admin-js', get_template_directory_uri().'/inc/rs_img_categoria.js', array('jquery'));  // Esto en el caso de que estemos en un plugin; si estamos en un Theme, hay que modificar la ruta de acceso, estableciendo la del Theme.
        wp_enqueue_script('admin-js');
    }
}



/*  Si queremos un array de categorías: */
 
//$categorias = get_categories( array( "hide_empty"=>false ) );
 
/*  Pero si lo que queremos es un array de términos de una taxonomía, entonces: */
 
//$terms = get_terms( "slugdetaxonomia", array( "hide_empty"=>false) );
 
/*  Ahora en el foreach vamos a usar $categorias, pero seria lo mismo usar $terms en su lugar. */
 
//foreach($categorias as $cat){
//    $c_id = $cat->term_id;
//    $term_meta = get_option("taxonomy_$c_id");  // ¡Dentro de $term_meta ya tenemos la URL de la imagen! Está en $term_meta['imagen'].
 
    /* Ahora la usamos como necesitemos. La imprimimos con un echo, la guardamos en otra variable...
       Por ejemplo, si queremos que ademas sea un enlace al archivo de la categoría, escribimos: */
//    echo("<a href='".get_term_link($c_id,"category")."'><img src='".$term_meta['imagen']."'></a>");
//}