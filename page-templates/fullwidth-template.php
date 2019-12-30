<?php
/*
Template Name: Full-Width Layout
 */
/**
 * The template for displaying all pages full width
 *
 * This is the template that displays all pages full width by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php
if(has_post_thumbnail( get_queried_object_id() )){
	echo '<div class="single-featured-image-header">';
	echo get_the_post_thumbnail(NULL, 'full');
	echo '</div><!-- .single-featured-image-header -->';
}
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header-full-width">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php twentyseventeen_edit_link( get_the_ID() ); ?>
					</header>
					<div class="entry-content-full-width">
						<?php
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
									'after'  => '</div>',
								)
							);
							?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
?>
