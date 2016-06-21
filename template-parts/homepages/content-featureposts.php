<!-- Template Part for Home Styles. This is included in content-home.php and content-area.php  -->
		
	<!-- Main home page-->		
		<!-- find which homepage through custom field-->
     	<?php 
     	$field = "Area";
     	
			$catField =  get_post_meta($post->ID, $field, true);
				if ($catField != ''): 
					$area = $catField;
				endif;

		?>

			<div class="row row-with-vspace flex-row">	

			<?php 

				$args2 = array(
					'posts_per_page'=>3,
				'post_type'=>'post',
				'order'=>'ASC',
				'tag' => 'featured',
				'tax_query' => array(
					array(
						'taxonomy' => 'area',
						'field' => 'slug',
						'terms' => $area,
						//'terms' => array( 'monmouth', 'ross','chepstow' )
					)
				),
				);
			?>

			<?php $query2 = new WP_Query( $args2);
				$counter = 1;
	               
	                		while ( $query2->have_posts() ):
										$query2->the_post();
										$categories = get_the_category();	
										$heading = 'News';									 
										if ( ! empty( $categories ) ) {
										    $heading = esc_html( $categories[0]->name );   
										}
										if ( $heading == 'Uncategorised' ) {
										    $heading = 'News';   
										}
										?>

										<section class="vert-card em-card">
											<div class="card-head">	
												<h4 class="category"><?php echo $heading; ?></h4>
										 	</div>
										 	<div class="flex-grow">									 		
									     	<?php 
				     							if ( has_post_thumbnail() ):
												$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

													list($width, $height) = getimagesize($url);
													if ($width > $height): ?>
													<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													   	<div class="flex-img-holder">
															<img class="card-thmb-horiz" src="<?php echo $url; ?>"> 
														</div>
													</a>
													<?php else: ?>
													<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													   	<div class="flex-img-holder flex-img-vert">
															<img class="card-thmb-vert" src="<?php echo $url; ?>"> 
														</div>
													</a>
													<?php endif;	?>

											<?php endif; ?>
												<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													<h3> <?php the_title() ?> </h3>
												</a>												
												<?php echo the_excerpt() ?> 
											
											</div> <!-- .flex-grow -->

												<a  class="card-footer readmore" href="<?php the_permalink(); ?>" >
													read more...
												</a>
												
				     					</section>	

									<?php 
										endwhile;
										wp_reset_postdata(); ?>
</div> <!-- .row -->