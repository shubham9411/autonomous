<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="page">
			<header class="header" id="masthead">
				<div class="container-fluid">
					<div class="jumbotron">
						<h2><?php _e( bloginfo() , 'anomous' ); ?></h2>
						<p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
						responsive, mobile-first projects on the web.</p>
					</div>
					<p>This is some text.</p>
					<p>This is another text.</p>
				</div>
				</header> <!-- .header-->
				<div class="content">