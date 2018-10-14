	<footer>
		<nav>
		<?php 
			if( has_nav_menu('footer') ) : 
				wp_nav_menu( array( 'theme_location' => 'footer' ) );
			else: 
				wp_nav_menu( array( 'theme_location' => 'main' ) );
			endif;
		?>
		</nav>
		<?php
			if( has_nav_menu('social') ) :
				wp_nav_menu('social');
			endif; 
		?>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>