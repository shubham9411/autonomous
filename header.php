<?php
/**
 * Header For Theme
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

?><!--

                   `-/+osssssssssssso+/-`
               ./oys+:.`            `.:+syo/.
            .+ys:.   .:/osyyhhhhyyso/:.   ./sy+.
          /ys:   -+ydmmmmmmmmmmmmmmmmmmdy+-   :sy/
        /h+`  -odmmmmmmmmmmmmmmmmmmmmmmmmmmdo-  `+h/
      :ho`  /hmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmds/   `oh:
    `sy.  /hmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmd+        .ys`
   .ho  `sdddhhhyhmmmdyyhhhdddddhhhyydmmmmy           oh.
  .h+          ``-dmmy.``         ``.ymmmmh            +h.
 `ho  `       /mmmmmmmmmmo       .dmmmmmmmms        ~~  oh`
 oy  .h`       ymmmmmmmmmm:       /mmmmmmmmmy`      -d.  yo      ____ _____ _  _____ _____ 
.d-  ymy       `dmmmmmmmmmd.       ymmmmmmmmmh`     /my  -d.    | __ )_   _| |/ /_ _|_   _|
oy  -mmm+       /mmmmmmmmmmy       .dmmmmmmmmmy     ymm-  yo    |  _ \ | | | ' / | |  | |  
h+  +mmmd-       smmmmmmmmmm+       /mmmmmmmmmm-   :mmm+  +h    | |_) || | | . \ | |  | |  
d/  smmmmh`      `dmmmmmmmmmd`       smmmmmmmmm:  `dmmms  /d    |____/ |_| |_|\_\___| |_|  
d/  smmmmms       :mmmmmmmmm+        `dmmmmmmmd.  smmmms  /d
h+  +mmmmmm/       smmmmmmmh  +       /mmmmmmmy  /mmmmm+  +h
oy  -mmmmmmd.      `dmmmmmd- +m/       smmmmmd. .dmmmmm-  yo
.d-  ymmmmmmh       :mmmmm+ .dmd-      `dmmmm/  ymmmmmy  -d.
 oy  .dmmmmmmo       smmmh  hmmmh`      :mmmy  +mmmmmd.  yo
 `ho  -dmmmmmd:      `dmd- ommmmms       smd- .dmmmmd-  oh`
  .h+  -dmmmmmd`      :m+ -dmmmmmm:      `do  hmmmmd-  +h.
   .ho  .ymmmmmy       + `hmmmmmmmd.      :` ommmmy.  oh.
    `sy.  /hmmmm+        ommmmmmmmmy        -dmmh/  .ys`
      :ho`  /hmmd-      :mmmmmmmmmmmo      `hmh/  `oh:
        /h+`  -odh`    `dmmmmmmmmmmmd:     oo-  `+h/
          /ys:   ~~    smmmmmmmmmmmmmd`       :sy/
            .+ys/.    `/osyyhhhhyyso/:`   ./sy+.
               ./oys+:.`            `.:+syo/.
                   `-/+osssssssssssso+/-`

   Proudly powered by WordPress - http://wordpress.org/
   Designed and Developed By Shubham Pandey with Rohit Juyal
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php wp_head(); ?>
		<script type="text/javascript">
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-90186372-5', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="50">
		<div class="page">
			<header class="header" id="header">

				<?php get_template_part( 'templates/header/header' , 'masthead' ); ?>

				<?php get_template_part( 'templates/header/header' , 'navigation' ); ?>

				<?php get_template_part( 'templates/header/header' , 'notification' ); ?>

			</header> <!-- .header-->

			<div class="content">
