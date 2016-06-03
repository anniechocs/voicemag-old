<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
							<?php		$EM_Event = em_get_event($post->ID, 'post_id'); ?>
	<div class="entry-content">
		<div class="row row-with-vspace">
	<div id="event-left" class="col-sm-6">	

			<?php 	if ( has_post_thumbnail() ):
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			list($width, $height) = getimagesize($url);
			if ($width > $height): ?>
			   	<div class="event-img-holder">
					<img class="event-thmb-horiz" src="<?php echo $url; ?>"> 
				</div>
			<?php else:?>
			   	<div class="event-img-holder">
					<img class="event-thmb-vert" src="<?php echo $url; ?>"> 
				</div>
			<?php endif;	?>

			<?php endif; ?>
		</div> <!-- end #event-left -->
		<div id="event-right" class="col-sm-6">
			<dl>
			  <dt>Date: </dt>
			  <dd><?php echo $EM_Event->output('#_EVENTDATES') . "&nbsp;" ; ?> </dd>

			<dt>Time: </dt>
			<dd><?php  echo $EM_Event->output('#_EVENTTIMES'); ?></dd>
			<?php if(!empty($EM_Event->location_id)): ?>
				<dt>Location: </dt>
				<dd>
				<a href="<?php 	echo $EM_Event->output('#_LOCATIONURL'); ?>">
				 <?php echo $EM_Event->output('#_LOCATIONNAME'); ?></a> </dd>
			<?php endif; ?> 
			</dl>

			<dl>
		     	<?php 
		     	$field = "contact-phone";
		     	$contactphone =  get_post_meta($post->ID, $field, true);
		     	$field = "contact-url";
				$contacturl =  get_post_meta($post->ID, $field, true);	
				$field = "tickets";
				$tickets =  get_post_meta($post->ID, $field, true);	?>
						<?php if ($contactphone != ''): ?> 
							<dt>Contact: </dt><dd><?php echo $contactphone; ?></dd>
						<?php endif; ?>
						<?php if ($contacturl != ''): ?> 
							<dt>Visit: </dt><dd><?php echo $contacturl; ?></dd>
						<?php endif; ?>
						<?php if ($tickets != ''): ?> 
							<dt>Tickets: </dt><dd><?php echo $tickets; ?></dd>
						<?php endif; ?>
			</dl>

	</div> <!-- end #event-left -->
	</div>  <!--end row -->

	<div  class="row">
		<section class="event-notes">
				<?php echo $EM_Event->output('#_EVENTNOTES'); ?> 

			<div class="event-image-holder">
				<?php echo $EM_Event->output('#_LOCATIONMAP'); ?> 
			</div>
		</section>
	</div> <!-- end .row-->

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