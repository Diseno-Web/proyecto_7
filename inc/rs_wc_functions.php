<?php
/**
 * web_theme misfunciones
 * Bliblioteca de funciones del theme
 * Por RogerSoto.com
 * 
 * @package rs_bishop
 */


//img_atributos
if ( !function_exists('rs_cart_list') ) {
    // uso:  img_atributos(url_img);
    // devuelve un array
    // $alt = img_atributos(get_the_post_thumbnail_url())[alt];
    // ejemplo: echo img_atributos(get_option('imagen_upload_02'))[alt]
    function rs_cart_list( )
    {
        global $woocommerce;
        $items = $woocommerce->cart->get_cart();
        $cart_list = array();
        
            foreach($items as $item => $values) { 

                
                $_product =  wc_get_product( $values['data']->get_id() );

                //get_permalink( $values['product_id'] );
                //product id
                //echo "id producto ".$values['product_id'];
                //product image
                $getProductDetail = wc_get_product( $values['product_id'] );
                //echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
        
                //echo "<b>".$_product->get_title() .'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
                $price = get_post_meta($values['product_id'] , '_price', true);
                //echo "  Price: ".$price."<br>";
                /*Regular Price and Sale Price*/
                //echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
                //echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";

                $regularprice = get_post_meta($values['product_id'] , '_regular_price', true);
                $saleprice = get_post_meta($values['product_id'] , '_sale_price', true);

                $produc_in_cart = array( 
                    "prod_id" => $values['product_id'],
                    "link" => get_permalink( $values['product_id'] ),
                    "imagen" => $getProductDetail->get_image(),
                    "titulo" => $_product->get_title(),
                    "cantidad"  =>  $values['quantity'],
                    "precio" => $price,
                    "regularPrecio" => $regularprice ,
                    "precioOferta" => $saleprice
                );
                array_push($cart_list, $produc_in_cart);
            }

            return $cart_list;


    }
}


?>
