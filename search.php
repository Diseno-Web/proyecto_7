<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package proyect7
 */

get_header();
?>
<main id="primary" class="content-shrink">

<?php if ( have_posts() ) : ?>

	<?php get_template_part( 'template-parts/content', 'head' ); ?>

<div class="container">
  <div class="row">
	
	<?php
		
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

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
	?>

  </div>
			<!-- fin de row -->
			<!-- Pagination -->
			<?php  rs_pagination_boostrap(); ?>

</div>
	<!-- fin de container -->
<?php
	else :
?>

	<div class="container text-center">
		<div class="search_notfound">
			Sin Nada que mostrar
		</div>

		<?php get_search_form(); ?>
		<br>
		<a class="btn flat-btn wow fadeInUp" href="<?php echo get_home_url(); ?>">  HOME </a>
	</div>

		
<?php				
	endif;
?>
	</main><!-- #main -->

<?php
get_footer();
