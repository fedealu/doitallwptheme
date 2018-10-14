<div class="nav">
	<div class="nav-toggler">
		<button class="toggler" aria-controls="main-menu" aria-expanded="false">
			<?php
				echo doitall_get_svg( array( 'icon' => 'bars' ) );
				echo doitall_get_svg( array( 'icon' => 'close' ) );
				_e( 'Menu', 'doitall' );
			?>
		</button>
	</div>
	<nav>
		<?php 
			wp_nav_menu( array( 
				'theme_location' => 'main',
				'menu_id' => 'main-menu'
			));
		?>
	</nav>
</div>