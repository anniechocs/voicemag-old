<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
							<?php		$EM_Event = em_get_event($post->ID, 'post_id'); ?>
	<div class="entry-content">
		
		<h4><?php echo $EM_Event->output('#_EVENTDATES') . "&nbsp;" ; ?> 
				<?php  echo $EM_Event->output('#_12HSTARTTIME'); ?></h4>
		<p class="event-place"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?> </p>
												
<?php 
			if ( has_post_thumbnail() ) {
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			list($width, $height) = getimagesize($url);
			if ($width > $height) { ?>
			   	<div class="flex-img-holder">
					<img class="card-thmb-horiz" src="<?php echo $url; ?>"> 
				</div>
			<?php } else { ?>
			   	<div class="flex-img-holder flex-img-vert">
					<img class="card-thmb-vert" src="<?php echo $url; ?>"> 
				</div>
			<?php }	?>

			<?php } //end of if ?>

				<?php echo $EM_Event->output('#_EVENTNOTES'); ?> 

		  	<div class="map-holder">
				<?php echo $EM_Event->output('#_LOCATIONMAP'); ?> 
			</div>

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