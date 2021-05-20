<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package proyect7
 */

get_header();
?>


<main id="primary" class="content-shrink">

<?php get_template_part( 'template-parts/content', 'head' ); ?>

	<div class="container error-content">
		<div class="text-center">
			<h2 class="error-title">Opps, No lo encontramos !</h2><!-- /.error-title -->
			<h2 class="error-main">404</h2><!-- /.error-main -->
			<?php get_search_form(); ?>
			<br>
			
			<a class="btn flat-btn wow fadeInUp" href="<?php echo get_home_url(); ?>">  HOME </a>
		</div>
	</div><!-- /.container -->

</main><!-- #main -->




<?php
get_footer();
