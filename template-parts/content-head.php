<section class="rs_header" >
			<?php

				if ( is_singular() ) {
					$ulimgcat=url_img_thumb('large');
					if(empty($ulimgcat)){
						$ulimgcat = get_template_directory_uri() . '/img/bg_head.jpg';
					}

				}elseif( is_category() ){

					$nombre = single_cat_title("", false);
					$categorias = get_categories( array( "hide_empty"=>false, 'name' => $nombre, ) );
					 
					foreach($categorias as $cat){
							$c_id = $cat->term_id;
							$term_meta = get_option("taxonomy_$c_id"); 
						 
							$ulimgcat = $term_meta['imagen'];
						}

					if(empty($ulimgcat)){
							$ulimgcat = get_template_directory_uri() . '/img/bg_head.jpg';
					}

				}elseif ( is_search() ) {
					$ulimgcat = get_template_directory_uri() . '/img/bg_buscar.jpg';
				}elseif ( is_404() ) {
					$ulimgcat = get_template_directory_uri() . '/img/bg_404.jpg';
				} else {
					$ulimgcat = get_template_directory_uri() . '/img/bg_head.jpg';
				}
				?>

			<div class="bg" style="background-image:url(<?php echo $ulimgcat ?>);"></div>
				<div class="container">
					<div class="text-center px-5 pt-5 position-relative">

					<?php
						if ( is_singular() ) {
							//the_title( '<h1 class="text-white entry-title">', '</h1>' );
							the_title( '<h1 class="text-white entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						}elseif( is_category() ){ ?>
							<h1 class="text-white"><?php echo single_cat_title("", false); ?> </h1>
						<?php
						}elseif ( is_search() ) {
							?>
							<h1 class="text-white entry-title">
								<?php printf( esc_html__( 'Busqueda por: %s', 'web_theme' ), '<span>' . get_search_query() . '</span>' ); ?> 
							</h1>
						<?php 
						}elseif ( is_404() ) {
						?>
							<h1>Error 404 - pagina no encontrada</h1>
						<?php
						} else {
							the_title( '<h1 class="text-white entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						}?>
						<!-- Breadcrumb row -->
						<div class="breadcrumb-row">
							<?php the_breadcrumb(); ?>
						</div>
						<!-- Breadcrumb row END -->
						
					</div>
				</div>
		</section>

