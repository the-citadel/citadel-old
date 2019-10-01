<?php 

defined( 'ABSPATH' ) || exit;

function citadel_post_meta() {

	if ( is_single() ) {
	?>
		<p class="post-meta">
			<span class="attribution-meta"><?php echo bloginfo( 'name' ); ?> Blog</span>
			<span class="sep">|</span>
			<span class="date-meta"><?php echo the_date(); ?></span>
			<?php if ( has_category() ) : ?>
			<span class="category-meta"><?php echo get_the_category_list( ',' ); ?></span>
			<?php endif; ?>
			<?php if ( has_tag() ) : ?>
			<span class="tag-meta"><?php echo get_the_tag_list( '', ', ' ); ?></span>
			<?php endif; ?>
		</p>
	<?php
	} else {
	?>
		<p class="post-meta">
			<span class="attribution-meta"><?php echo bloginfo( 'name' ); ?> Blog</span>
		</p>
	<?php
	}

}