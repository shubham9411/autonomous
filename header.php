<?php
/**
 * Header For Theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="50">
		<div class="page">
			<header class="header" id="header">
			
				<?php get_template_part( 'templates/header/header' , 'masthead' ); ?>

				<?php get_template_part( 'templates/header/header' , 'navigation' ); ?>

				<?php get_template_part( 'templates/header/header' , 'notification' ); ?>

			</header> <!-- .header-->

			<div class="content">
