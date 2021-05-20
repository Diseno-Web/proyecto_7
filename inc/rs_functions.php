<?php
/**
 * web_theme misfunciones
 * Bliblioteca de funciones del theme
 * Por RogerSoto.com
 * 
 * @package web_theme
 */


function get_custom_logo_src() {
    //Retornar la url del custom logo
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_meta = wp_get_attachment_image_src($custom_logo_id,'full');
        return $logo_meta[0];
    } else {
        return false;
    }
}

function url_img_thumb($rs_size){
    /* rs_size = 'thumbnail,medium,large,full' */
    $featured_img_url = get_the_post_thumbnail_url($post->ID, $rs_size);
    return $featured_img_url;
}

//img_atributos
if ( !function_exists('img_atributos') ) {
    // uso:  img_atributos(url_img);
    // devuelve un array
    // $alt = img_atributos(get_the_post_thumbnail_url())[alt];
    // ejemplo: echo img_atributos(get_option('imagen_upload_02'))[alt]
    function img_atributos( $rs_url_img )
    {
        $rs_img_id =  attachment_url_to_postid( $rs_url_img );
        $attachment = get_post( $rs_img_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
}

// retorna url de la imagen de categoria y la descripcion de la categoria
if ( !function_exists('get_cat_atributos') ) {
    // uso:  get_cat_atributos(nombre_categoria);
    // $micat=get_cat_atributos($nombre);
    // echo $micat[imagen];
    // echo $micat[descrip];

    function get_cat_atributos( $nombre_cat ){
        $catObj = get_category_by_slug($nombre_cat);
        $catid = $catObj->term_id;
        $term_meta = get_option("taxonomy_$catid"); 
/*         $urlimgcat = $term_meta['imagen'];
        $cat_desc = category_description( $catid );
 */
        return array(
            'imagen' => $term_meta['imagen'],
            'descrip' => category_description( $catid ),
        );
    }
}


function excerpt_word( $limit ) {
    // extracto por palabras
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
    }
    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function excerpt_char( $count ) {
    // extracto por letras
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = '<p>'.$excerpt.'... <a href="'.$permalink.'">Read More</a></p>';
    return $excerpt;
    }


function rs_pagination(){
    global $wp_query;
    $total = $wp_query->max_num_pages;

    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

    echo ('<div class="blog-pagination">');
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?pagina=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $total,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ) );
    echo ('</div>');

}

function rs_pagination01(){
    // obtenemos el total de páginas
    global $wp_query;
    $total = $wp_query->max_num_pages;
    // solo seguimos con el resto si tenemos más de una página
    echo ('<div class="blog-pagination">');
    if ( $total > 1 )  {
         // obtenemos la página actual
         if ( !$current_page = get_query_var('paged') )
              $current_page = 1;
         // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
         $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
         echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => $format,
              'current' => $current_page,
              'prev_next' => True,
              'prev_text' => __('&laquo; Anterior'),
              'next_text' => __('Siguiente &raquo;'),
              'total' => $total,
              'mid_size' => 4,
              'type' => 'list'
         ));
    }
    echo ('</div>');
    
}


if ( !function_exists( 'rs_pagination_boostrap' ) ) {
	function rs_pagination_boostrap(){
        // WordPress pagination for boostrap 4
		global $wp_query;
		ob_start();
		$translated = esc_html__( '', 'wpse64458' ); // Supply translatable string
		//$translated = esc_html__( 'Page', 'wpse64458' ); // Supply translatable string
		$pagination =  paginate_links( array(
		'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'array',
		'prev_text'          => __('<span></span> &laquo; ', 'wpse64458'),
		'next_text'          => __('&raquo; <span></span>', 'wpse64458'),
		//'prev_text'          => __('<span></span> &laquo; Anterior', 'wpse64458'),
		//'next_text'          => __('Siguiente &raquo; <span></span>', 'wpse64458'),
		'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>'
		) );  
		if ( ! empty( $pagination ) ) : ?>
		<ul class="pagination pagination-lg wpse64458_pagination justify-content-center">
		<?php foreach ( $pagination as $key => $page_link ) : ?>
		  <li class="page-item<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo str_replace( 'page-numbers', 'page-link', $page_link ); ?></li>
		<?php endforeach ?>
		</ul>
		<?php endif;
		echo ob_get_clean();
	}
}


if ( !function_exists( 'rs_prev_next' ) ) {
	function rs_prev_next(){
        
        echo ("<div class='rs-nav'>");
        
        $prev_post = get_previous_post(true);
        if ( ! empty( $prev_post ) ){
            echo ("<div class='rs-nav-prev'>");
                //previous_post_link();
                echo "<a href=". get_permalink( $prev_post->ID )."> &laquo; " .apply_filters( 'the_title', $prev_post->post_title ). "</a>";
            echo ("</div>");

        }
        $next_post = get_next_post(true);
        if ( ! empty( $next_post ) ) {
            echo ("<div class='rs-nav-next'>");
            echo "<a href=". get_permalink( $next_post->ID )."> " .apply_filters( 'the_title', $next_post->post_title ). "  &raquo; </a>";
            echo ("</div>");
        }    

        echo ("</div>");
    }
}

// Insertar Breadcrumb    
function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '»'; // delimiter between crumbs
    $home = '<span class="dashicons dashicons-admin-home"></span>'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Contenido de "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()



