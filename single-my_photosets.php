<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			
			<h1>single-my_photosets</h1>

			<?php while ( have_posts() ) : the_post(); ?>

				

				<!-- Do my own stuff -->
				
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
					if ( $images ) :
						$total_images = count( $images );
						
						foreach ($images as $image):
							# code...
								$image = array_shift( $images );
								$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
				
				<figure class="gallery-thumb">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</figure><!-- .gallery-thumb -->


					<?php endforeach; ?>
				
				<?php endif; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>