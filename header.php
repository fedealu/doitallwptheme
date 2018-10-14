<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header role="banner">

	<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>
	<?php if ( has_nav_menu( 'main' ) ) : ?>
		<?php get_template_part( 'template-parts/navigation/nav', 'main'); ?>
	<?php endif; ?>
</header>	
