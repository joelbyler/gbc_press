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
 * @package gbc_theme
 *
 * Template Name: Grid Page Template
 */

get_header();
?>
  <h1>this is a custom grid page</h1>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

    endwhile; // End of the loop.

		?>

    <h4>Your ID <?php echo get_the_ID() ?></h4>

    <div class="row">

    <?php
      $args = array(
        'child_of' => $post->ID,
        'parent' => $post->ID,
        'hierarchical' => 0,
        'sort_column' => 'menu_order',
        'sort_order' => 'asc'
      );
      $mypages = get_pages( $args );
      foreach( $mypages as $post )
      { ?>
        <div class="col-4">
          <?php echo $post->post_title; ?>
        </div>
      <?php
      }
    ?>
    </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();