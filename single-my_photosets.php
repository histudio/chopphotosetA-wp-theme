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
			
			<?php while ( have_posts() ) : the_post(); ?>

				

				<!-- Do my own stuff -->
				
				<div id="slide_container">
					<div id="slide_images">
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
					
					if ( $images ) :
						$total_images = count( $images );
						
						foreach ($images as $image):
							# code...
								$image = array_shift( $images );
								$image_img_tag = wp_get_attachment_image( $image->ID, 'large' );
								
				?>
				
				<?php echo $image_img_tag; ?>


					<?php endforeach; ?>
				
				<?php endif; ?>
				
				</div><!-- #slide_images -->
			</div><!-- #slide_container -->

				<p id="slide_controls">
				<?php 
					
					for ($i=1; $i<=$total_images; $i++)
					  {
					  echo "<span>Image " . $i . "</span>";
					  };
				
				?>
				</p>

				<script type="text/javascript" charset="utf-8">
					
					jQuery(document).ready(function() {
					  jQuery('#slide_controls').on('click', 'span', function(){
					    jQuery("#slide_images").css("transform","translateX("+jQuery(this).index() * -640+"px)");
					    jQuery("#slide_controls span").removeClass("selected");
					    jQuery(this).addClass("selected");
					  });
					});
					
				</script>

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