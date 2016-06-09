<!-- Template Part for Home Styles. This is included in content-home.php  -->
		<!-- Main home page-->		
		<!-- find which homepage through custom field-->
     	<?php 
     	$field = "Area";
			$catField =  get_post_meta($post->ID, $field, true);
				if ($catField != ''):
					$area = $catField;
				endif;
		?>

			<div class="row flex-row">	

			<?php 

				$args2 = array(
					'posts_per_page'=>6,
				'post_type'=>'event',
				'order'=>'ASC',
				'event-categories' => $area,
				'meta_query' => array(
									array(
									//	'key' => '_start_ts', change this to display until end-time
										'key' => '_end_ts',
										'value' => current_time('timestamp'),
										'compare' => '>=',
										'type'=>'numeric'
									)
								),

				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				//'meta_key' => '_start_ts', // change this to display until end-time
				'meta_key' => '_end_ts',
				'meta_value' => current_time('timestamp'),
				'meta_value_num' => current_time('timestamp'),
				'meta_compare' => '>='
				);
			?>

			<?php $query2 = new WP_Query( $args2);
	                		while ( $query2->have_posts() ): 
										$query2->the_post();
										$EM_Event = em_get_event($post->ID, 'post_id');
										?>

										<section class="horiz-card em-card">											
											<div class="card-left">	
										     	<?php 
					     							if ( has_post_thumbnail() ):
													$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

														list($width, $height) = getimagesize($url);
														if ($width > $height): ?>
														   	<div class="flex-img-holder">
																<img class="card-thmb-horiz" src="<?php echo $url; ?>"> 
															</div>
														<?php else: ?>
														   	<div class="flex-img-holder flex-img-vert">
																<img class="card-thmb-vert" src="<?php echo $url; ?>"> 
															</div>
														<?php endif;	?>
												<?php endif; ?>
										 	</div>


										 	<div class="card-right">
												<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													<h3> <?php the_title() ?> <span class="horiz-event-date">
														<?php echo $EM_Event->output('#_EVENTDATES'); ?> </span></h3>
												</a>
												<?php echo $EM_Event->output('#_EVENTEXCERPT'); ?> 

												<a  class="read-more" href="<?php the_permalink(); ?>" >
													read more...
												</a>
											
											</div> <!-- .card-right -->
												
				     					</section>	

									<?php  endwhile;
										wp_reset_postdata(); ?>
</div> <!-- .row -->