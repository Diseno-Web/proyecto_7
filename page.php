<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proyect7
 */

get_header();
?>


<main id="primary" class="content-shrink">

<?php get_template_part( 'template-parts/content', 'head' ); ?>

<div class="container">
	  <div class="row">
		<div class="col-lg-12">
			<?php
			while ( have_posts() ) :
				the_post();

				the_content();

			?>

				<div class="footer_buttons clear">
					<?php rs_prev_next(); ?>
				</div>
				<!-- <div class="dlab-divider bg-gray-dark op4"><i class="icon-dot c-square"></i></div> -->

				<footer class="entry-footer">
					
					<?php //proyect7_entry_footer(); ?>

				</footer><!-- .entry-footer -->

			<?php
			endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>
</main><!-- #main -->


<?php
get_footer();
