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
		<body>
<div id="text-carousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="row">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="carousel-content">
                        <div>
                            <p>Student are informed to report before specified date.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <p>Worshop will take place btwn these dates.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <p>us provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>


</div>
</body>

	</head>
	<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="50">
		<div class="page">
			<header class="header" id="header">

				<?php get_template_part( 'templates/header/header' , 'masthead' ); ?>

				<?php get_template_part( 'templates/header/header' , 'navigation' ); ?>

			</header> <!-- .header-->

			<div class="content">
