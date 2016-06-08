<?php
/**
 * Template Name: Home Page
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();

						if ( is_front_page() ):
							get_template_part( 'template-parts/content', 'home' );
						else:

							get_template_part( 'template-parts/content', 'area' );

						 endif;
							?>
					
						<?php
						} //endwhile have posts;
						?> 

					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 


