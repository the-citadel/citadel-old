<?php 

defined( 'ABSPATH' ) || exit;

function citadel_child_menu() {

	$args = array(
		'post_parent' => get_the_ID(),
		'post_status' => 'publish',
	);

	$children = get_children($args);

	if ( !empty($children) ) {
	?>
		<nav class="page-children-items wrapper">
			<ul>
			<?php
				$args = array(
					'post_type' 		=> 'page',
					'posts_per_page' 	=> -1,
					'post_parent'		=> get_the_ID(),
					'order'				=> 'ASC',
					'orderby'			=> 'menu_order',
				);

				$parent = new WP_Query( $args );

				if ( $parent->have_posts() ) {
					while ( $parent->have_posts() ) : $parent->the_post();

				?>

				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

				<?php
					endwhile;
				wp_reset_postdata();

				}
			?>
			</ul>
		</nav>
	<?php
	}
	
}