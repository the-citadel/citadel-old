<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="https://www.google.com/search">
	<label for="<?php echo $unique_id; ?>">
		Search citadel.edu
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="Search The Citadel..." value="<?php echo get_search_query(); ?>" name="q" />
	<input type="hidden"  name="sitesearch"
value="citadel.edu" />
	<button type="submit" class="search-submit" aria-label="Search citadel.edu"><span class="screen-reader-text"><i class="fas fa-search"></i></span></button>
</form>