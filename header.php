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
 oy  .h`       ymmmmmmmmmm:       /mmmmmmmmmy`      -d.  yo
.d-  ymy       `dmmmmmmmmmd.       ymmmmmmmmmh`     /my  -d.
oy  -mmm+       /mmmmmmmmmmy       .dmmmmmmmmmy     ymm-  yo
h+  +mmmd-       smmmmmmmmmm+       /mmmmmmmmmm-   :mmm+  +h
d/  smmmmh`      `dmmmmmmmmmd`       smmmmmmmmm:  `dmmms  /d
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

   Proudly powered by WordPress — http://wordpress.org/
   Designed and Developed By
-->
<!DOCTYPE html>
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
