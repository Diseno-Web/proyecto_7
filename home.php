<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proyect7
 */

get_header();
?>

<div class="content-shrink">
		
    <section class="header-banner" id="header_banner">
        <div>
            <div class="hbanner-logo"><img src="<?php echo get_custom_logo_src(); ?>" alt="<?php echo img_atributos(get_custom_logo_src())[alt]; ?>"></div>
            <div class="hbanner-txt">
                <div class="hbanner-txt-big wow fadeInUp"><?php echo get_option('texto01_banner_section'); ?></div> 
                <div class="hbanner-txt-small wow fadeInUp"><?php echo get_option('texto02_banner_section') ?></div>
                <a class="btn flat-btn wow fadeInUp" href="<?php echo get_option('texto03_banner_section') ?>">Contactanos</a>
            </div>
            <a href="#about" class="down-btn scroll"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
            <div class="slider-img" data-zs-src='["<?php echo get_option( 'imagen_upload_01' ) ?>", "<?php echo get_option( 'imagen_upload_02' ) ?>", "<?php echo get_option( 'imagen_upload_03' ) ?>"]'></div>
        </div>
    </section>
    <!-- header-banner -->
    <section id="about" class="">
        
        <div class="content-boxed">
<!-- 
            <div class="split-color wow slideInLeft">
                <div class="section-number">#01</div>
                <h2 class="section-heading"><span>Nosotros</span></h2>
            </div>
 -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-5">
                    <?php if(get_option('imagen_nosotros_01')) { ?>
                        <div class="about-img mb-5 wow fadeInLeft"><img src="<?php echo get_option('imagen_nosotros_01'); ?>" alt=""></div>
                    <?php }else{ ?>
                        <div class="about-img mb-5 wow fadeInLeft">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo get_option('nosotros_link'); ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="pl-3 wow fadeInRight">
                        <h2 class="heading-border mb-5 text-color-skyblue"> <?php echo get_option('titulo_nosotros'); ?></h2>
                        <p> <?php echo get_option('texto_nosotros'); ?></p>
                        <div class="row">                              
                        <div class="col-lg-6">
                        <ul class="about-list">
                            <li>is simply dummy text </li>
                            <li>Lorem Ipsum has been </li>
                            <li>Standard dummy text</li>
                            <li>Analize business plan</li>
                            <li>Simply dummy text of</li>
                        </ul>
                        </div>
                        <div class="col-lg-6">
                        <ul class="about-list">
                            <li>Lorem Ipsum has been the</li>
                            <li>the printing and typesetting</li>
                            <li>Lorem Ipsum has been the</li>
                            <li>Analize business plan</li>
                            <li>standard dummy text</li>
                        </ul>
                        </div>
                        </div>
                        </div>
                    </div>                           
                </div>

            </div>

            <h2 class="section-heading2 wow zoomIn">Nosotros</h2>

        </div>

    </section>

    <!-- about us -->
    <section id="services" class="bg-light-black">

        <div class="content-boxed">

            <div class="container-fluid">

                <div class="row">       
                <?php 
                    /* $micat_test = get_theme_mod('cat_noticias');
                    echo($micat_test); */
                        $args = array(
                            'category_name' => get_theme_mod('cat_servicios'),
                            'posts_per_page' => 6
                        );
						
					    $the_query = new WP_Query( $args );
						// The Loop
						
                            if ( $the_query->have_posts() ) :
                            
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $link = get_permalink();
									$title = get_the_title();
									$excerpt = wp_strip_all_tags(excerpt_word( 25 ) );
                                    
                                    $meta_value = get_post_meta($post->ID, '_rs_icon_tag', true);

                                    if( empty( $meta_value ) ) {
                                        $meta_value = "flaticon-operation";
                                    }
											
                    ?>                  
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-box3 clearfix wow fadeInUp">
                            <div class="service-icon"><?php echo $meta_value ?><!-- <i class="fas fa-coins"></i> --></div>
                            <div class="service-disc">
                                <h3><?php echo $title ?></h3>
                                <p> <?php echo $excerpt?></p>
                            </div>
                            <a class="btn btn-default" href= "<?php echo $link?>">Más Info</a>
                        </div>
                    </div>  

                    <?php
                                endwhile;
                            endif;
                            // Reset Post Data
                            wp_reset_postdata();
                    ?>


                                                             
                </div>

            </div>

            <h2 class="section-heading2 wow zoomIn"><?php echo get_option('title_servicios'); ?> </h2>

        </div>

    </section>

    <!-- our services -->
    <section id="projects">

        <div class="content-boxed">
 
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 text-center">
                        <div class="wow flipInX">
                        <div class="tabmenu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        <div class="toolbar">
                            <button class="btn btn-default filter-button" data-filter="all">All</button>
                            <button class="btn btn-default filter-button" data-filter="Business">Business</button>
                            <button class="btn btn-default filter-button" data-filter="Finance">Finance</button>
                            <button class="btn btn-default filter-button" data-filter="Consulting">Consulting</button>
                        </div>
                        </div>
                    </div>

                    <?php 
                        $args = array(
                            'category_name' => get_theme_mod('cat_productos'),
                            'posts_per_page' => 6
                        );
                        
                        $the_query = new WP_Query( $args );
                        // The Loop
                            if ( $the_query->have_posts() ) :
                            
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $link = get_permalink();
                                    $title = get_the_title();
                                    $excerpt = wp_strip_all_tags(excerpt_word( 25 ) );
                                    $alt = img_atributos(get_the_post_thumbnail_url())[alt];

                    ?>


                    <div class="gallery_product col-lg-4 col-md-6 col-sm-6 filter Business">
                        <div class="work-box wow fadeInUp">                    
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $alt ?>" />              
                            <div class="hoverinfo">
                                <div class="link-icons">
                                    <a href="<?php the_post_thumbnail_url('large'); ?>" data-superlightcaption="<?php echo $title ?>" class="prolink-icon zoom-img-icon"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                    <a href="<?php echo $link ?>" class="prolink-icon"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $link ?>"><strong class="txt-white"><?php echo $title ?></strong></a><br />
                                <span class="txt-white"><?php echo $excerpt ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                            endwhile;
                        endif;
                        // Reset Post Data
                        wp_reset_postdata();
                    ?>

                </div>

            </div>

            <h2 class="section-heading2 wow zoomIn"><?php echo get_option('title_productos'); ?></h2>

        </div>

    </section>

    <!-- gallery -->
    <section id="testimonial" class="bg-light-black">

        <div class="content-boxed">

            <div class="container-fluid">
                <div class="row">

                <?php 
                    $args = array(
                        'category_name' => get_theme_mod('cat_noticias'),
                        'posts_per_page' => 6
                    );
                    
                    $the_query = new WP_Query( $args );
                    // The Loop
                        if ( $the_query->have_posts() ) :

                        
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                $link = get_permalink();
                                $title = get_the_title();
                                $excerpt = wp_strip_all_tags(excerpt_word( 25 ));
                                $alt = img_atributos(get_the_post_thumbnail_url())[alt];
                ?>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="<?php echo $link ?>">
                            <div class="service-box3 clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <div class="service-img"><img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $alt ?>"></div>
                                <div class="service-disc">
                                <h3 class="m-4"><?php echo $title ?></h3>
                                <p><?php echo $excerpt ?></p>
                                </div>                          
                            </div>
                        </a>
                    </div>

                <?php
                        endwhile;
                    endif;
                    // Reset Post Data
                    wp_reset_postdata();
                ?>
             
                </div>
            </div>

            <h2 class="section-heading2 wow zoomIn"><?php echo get_option('title_noticias'); ?></h2>

        </div>

    </section>       
    <!-- testimonial -->
    <section id="contact" class="">

        <div class="content-boxed">

            <!-- <div class="split-color wow slideInLeft">

                <div class="section-number">#05</div>

                <h2 class="section-heading"><span>Contactanos</span></h2>

            </div> -->

            <div class="container-fluid">
            
                <div class="row">
                <div class="col-12">
                    <h2 class="heading-border mb-5 text-center wow fadeIn"><?php echo  get_option('texto_contactos') ?></h2>
                </div>
                </div>
                
                <div class="row mb-5">                       
                <div class="col-lg-4">
                    <div class="contact-box clearfix wow fadeInRight">
                    <div class="contact-icon contact-icon2"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-txt">
                    <h3>Direccion</h3>
                    <p><?php echo get_option('direccion_contactos'); ?></p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-wow-delay="0.5s" class="contact-box clearfix wow fadeInRight">
                    <div class="contact-icon contact-icon2"><i class="fas fa-phone"></i></div>
                    <div class="contact-txt">
                    <h3>Telefono</h3>
                    <p><a href="tel:+<?php echo get_option('telefono_contactos'); ?>"><?php echo get_option('telefono_contactos'); ?></a></p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-wow-delay="0.6s" class="contact-box clearfix wow fadeInRight">
                    <div class="contact-icon contact-icon2"><i class="far fa-envelope"></i></div>
                    <div class="contact-txt">
                    <h3>Email</h3>
                    <p><a href="mailto:<?php echo get_option('email_contactos'); ?>"><?php echo get_option('email_contactos'); ?></a></p>
                    </div>
                    </div>
                </div>                        
                </div>

                <div class="row">    
                    <div class="col-lg-6">    
                        <div class="pr-3 mb-5 wow fadeInUp">  
                        <div class="gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5318757.547416603!2d-102.68669410298362!3d39.27850135067613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1529304398054" width="100%" height="538" allowfullscreen></iframe></div>                                
                        </div> 
                    </div>            
                    <div class="col-lg-6">
                        <div class="pl-3">
                        <h2 class="heading-border wow fadeInRight">Escribenos</h2>
                        <div data-wow-delay="0.5s" class="contact-form wow zoomIn">

                            <form id="contact_form">

                                <div class="f-field"><input name="fname" type="text" placeholder="Nombres" required></div>

                                <div class="f-field"><input name="email" type="text" placeholder="Email" required></div>

                                <div class="f-field"><input name="phone" type="text" placeholder="Telefono" required></div>

                                <div class="f-field"><textarea name="msg" placeholder="Mensaje"></textarea></div>

                                <div class="sent-btn"><input name="submit" type="submit" value="Enviar"></div>

                            </form>

                        </div>                                
                        </div>   
                    </div>       
                </div>

            </div>

            <h2 class="section-heading2 wow zoomIn">Contactanos</h2>

        </div>

    </section>         

    <!-- our contact -->

</div>

<?php
get_footer();