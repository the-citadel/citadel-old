<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<button id="search-toggle" type="button" aria-label="Search citadel.edu">
	<span class="screen-reader-text"><i class="fas fa-search"></i> Search</span>
</button>

<section id="search-overlay">
	<button id="search-close" aria-label="Close search">
		<span class="screen-reader-text"><i class="fas fa-times"></i></span>
	</button>
	<div class="container">
		<form role="search" method="get" class="search-form" action="https://www.google.com/search" autocomplete="off">
			<div class="field-container">
				<label for="<?php echo $unique_id; ?>">
					Search citadel.edu
				</label>
				<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="Search The Citadel..." value="<?php echo get_search_query(); ?>" name="q" autocomplete="off" />
				<input type="hidden"  name="sitesearch"
			value="citadel.edu" />
				<button type="submit" class="search-submit" aria-label="Search citadel.edu"><span class="screen-reader-text"><i class="fas fa-search"></i></span></button>
			</div>
		</form>
			<?php
				$args = array(
					'site__not_in' 	=> 1,
					'public'		=> 1,
				);

				$subsites = get_sites($args);

				// Sort blogs alphabetically.
				uasort( 
				    $subsites, 
				    function( $a, $b ) {
				        // Compare site blog names alphabetically for sorting purposes.
				        return strcmp( $a->__get( 'blogname' ), $b->__get( 'blogname' ) );
				    }
				);
		
				if ( ! empty ( $subsites ) ) {
					
					echo '<ul id="site-list">';

					foreach( $subsites as $subsite ) {
						$subsite_id = get_object_vars( $subsite )["blog_id"];
						$subsite_name = get_blog_details( $subsite_id )->blogname;
						$subsite_link = get_blog_details( $subsite_id )->siteurl;
						if ( get_site_option( 'msregister_blog1_id' ) != $subsite_name && get_site_option( 'msregister_exclude_' . $subsite_name ) != 'yes' ) { 
								printf(
									'<li class="list-item visible"><a href="' . $subsite_link . '">' . $subsite_name . '</a></li>',
									esc_attr( $subsite_name ),
            						esc_html( $subsite_name )
            					);
            			}
					}
					
					echo '</ul>';
				
				}
			?>
	</div>
</section>


	