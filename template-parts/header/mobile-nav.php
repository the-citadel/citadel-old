<?php 

defined( 'ABSPATH' ) || exit;

?>

<nav id="mobile-nav" role="navigation" aria-label="main navigation">
	<ul class="flex-container">
		<li class="flex-item">
			<button class="menu-toggle" data-target="main-nav"><i class="fas fa-bars fa-fw" aria-hidden="true"></i><span class="mobile-label">Menu</span></button>
		</li>
		<li class="flex-item">
			<button class="secondary-toggle" data-target="secondary-nav"><i class="fas fa-users fa-fw" aria-hidden="true"></i><span class="mobile-label">People</span></button>
		</li>
		<li class="flex-item">
			<button class="search-toggle" data-target="search"><i class="fas fa-search fa-fw" aria-hidden="true"></i><span class="mobile-label">Search</span></button>
		</li>
		<li class="flex-item">
			<button class="tools-toggle" data-target="tools-nav"><i class="fas fa-tools fa-fw" aria-hidden="true"></i><span class="mobile-label">Tools</span></button>
		</li>
	</ul>
</nav>