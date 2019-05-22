<?php global $post; ?>
<span itemscope itemtype="http://schema.org/BreadcrumbList">
	<a href="<?php echo network_site_url(); ?>">Citadel Home</a><i class="fas fa-angle-right"></i><?php if (is_front_page()) { 
			echo get_bloginfo( 'name' ); 
		} else { 
			if ($post->post_parent) { ?><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a><i class="fas fa-angle-right"></i><a href="<?php echo get_permalink($post->post_parent); ?>"><?php $parent_title = get_the_title($post->post_parent); echo $parent_title; ?></a><i class="fas fa-angle-right"></i><?php echo get_the_title();
			} else if ($blog_id == 1) { 
				echo get_the_title();
			} else { ?><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a><i class="fas fa-angle-right"></i><?php echo get_the_title(); ?>
	<?php } } ?>
</span>