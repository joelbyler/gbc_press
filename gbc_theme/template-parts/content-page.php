<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gbc_theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <?php

			$post_content = get_the_content();
			$matches = array();
      $parallax_img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) );

			if(strpos($post_content, "featured_video") !== false){
				$matches = array();
				preg_match('/media_path="(.*?)"/', $post_content, $matches);
			}
			if (!empty($matches)){

				echo '<figure id="parallax-header-video" class="parallax-video">';
				echo '<video autoplay muted loop >';
				echo '<source src="' . $matches[1] . '" type="video/mp4">';
				echo 'Your browser does not support HTML5 video.';
				echo '</video>';
				echo '</figure>';

			} elseif (has_post_thumbnail()) {
        the_title( '<div id="parallax-header" class="parallax" data-foo="bar" style="background-image: url(' . esc_url(get_the_post_thumbnail_url( )) . ');"><h1 class="entry-title">', '</h1></div>' );
      } else {
        // the_title( '<h1 class="entry-title">', '</h1>' );
			}

    ?>
	</header><!-- .entry-header -->
  <div class="entry-content">
		<?php

		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gbc_theme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'gbc_theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
