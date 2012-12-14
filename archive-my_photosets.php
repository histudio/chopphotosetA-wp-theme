<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

				<h1>archive-my_photosets.php</h1>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'toolbox' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'toolbox' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'toolbox' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( 'Archives', 'toolbox' );
							endif;
						?>
					</h1>
				</header>

				<?php rewind_posts(); ?>

				<?php toolbox_content_nav( 'nav-above' ); ?>

				<!-- Start the Loop. -->
			 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			 <!-- Test if the current post is in category 3. -->
			 <!-- If it is, the div box is given the CSS class "post-cat-three". -->
			 <!-- Otherwise, the div box is given the CSS class "post". -->

			 <?php if ( in_category('3') ) { ?>
			           <div class="post-cat-three">
			 <?php } else { ?>
			           <div class="post">
			 <?php } ?>


			 <!-- Display the Title as a link to the Post's permalink. -->

			 


			 <!-- Display the Post's content in a div box. -->
			
			<div class="hover panel">
				<div class="front">
				  <div class="pad">
			
			<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			?>
				
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			
			<?php } else { ?>
			
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="http://placehold.it/200x200"></a>
				
			<?php } ?>

			</div>
		</div>
		<div class="back">
			<div class="pad">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
		</div>
	</div>


			 <!-- Stop The Loop (but note the "else:" - see next line). -->

			 <?php endwhile; else: ?>


			 <!-- The very first "if" tested to see if there were any Posts to -->
			 <!-- display.  This "else" part tells what do if there weren't any. -->
			 <p>Sorry, no posts matched your criteria.</p>


			 <!-- REALLY stop The Loop. -->
			 <?php endif; ?>
				
				
				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->


		<script type="text/javascript" charset="utf-8">

				$(document).ready(function(){

					// set up hover panels
					// although this can be done without JavaScript, we've attached these events
					// because it causes the hover to be triggered when the element is tapped on a touch device
					$('.hover').hover(function(){
						$(this).addClass('flip');
					},function(){
						$(this).removeClass('flip');
					});

					// set up click/tap panels
					$('.click').toggle(function(){
						$(this).addClass('flip');
					},function(){
						$(this).removeClass('flip');
					});

					// set up block configuration
					$('.block .action').click(function(){
						$('.block').addClass('flip');
					});
					$('.block .edit-submit').click(function(e){
						$('.block').removeClass('flip');

						// why not update that list for fun?
						$('#list-title').text($('#form_title').val());
						$('#list-items').empty();
						for (var num = 1; num <= $('#form_items').val(); num++) {
							$('#list-items').append('<li>Name '+num+'</li>');
						}
						e.preventDefault();
					});

					// set up contact form link
					$('.contact .action').click(function(e){
						$('.contact').addClass('flip');
						e.preventDefault();
					});
					$('.contact .edit-submit').click(function(e){
						$('.contact').removeClass('flip');
						// just for effect we'll update the content
						e.preventDefault();
					});

				});

		</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>