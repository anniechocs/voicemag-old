<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">

			<div class="row row-with-vspace">	

			<?php 
				$this_page_id=$wp_query->post->ID; 
				$args1 = array(
				'posts_per_page'=>3,
				'post_type'=>'page',
				'order'=>'ASC',
				'orderby'=>'name',
				'post_parent'=>$this_page_id,
				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => 'area',
				// 		'field' => 'slug',
				// 		'terms' => array( 'monmouth', 'ross','chepstow' )
				// 	)
				// )
				);
			?>

			<?php $query1 = new WP_Query( $args1);
	               
	                		while ( $query1->have_posts() ) {
										$query1->the_post();
										?>

										<section class="feature-card">
											<div class="card-head">	

										 	</div>
									     	<?php 
				     							if ( has_post_thumbnail() ):
												$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
											   	<div class="feature-img-holder">
												 <img class="card-thmb-horiz" src="<?php echo $url; ?>"> 
												 <a class="feature-title" href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													<h2> <?php the_title() ?> </h2>
												</a>
												</div>
											<?php endif; ?>												
				     					</section>	


									<?php }   // end of while for query
										wp_reset_postdata(); ?>
</div> <!-- .row -->



		<!--the main posts -->		

			<?php get_template_part( 'template-parts/homepages/content', 'moreposts' );
				echo "\n\n"; ?>


		<div class="clearfix"></div>
		<?php
		/**
		 * This wp_link_pages option adapt to use bootstrap pagination style.
		 * The other part of this pager is in inc/template-tags.php function name bootstrapBasicLinkPagesLink() which is called by wp_link_pages_link filter.
		 */
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'bootstrap-basic') . ' <ul class="pagination">',
			'after'  => '</ul></div>',
			'separator' => ''
		));
		?>
	</div><!-- .entry-content -->
	<div class="clearfix"></div>
	
	<footer class="entry-meta">
		<?php bootstrapBasicEditPostLink(); ?> 
	</footer>
<!-- 	<div class="clearfix"></div> -->
</article><!-- #post-## -->