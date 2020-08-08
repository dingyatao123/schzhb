<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
$thisid = $post -> ID;
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/style.css" rel="stylesheet">
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-3.5.1.min.js" type='text/javascript'></script>

	</head>

	<body <?php body_class(); ?>>
		<div id="header">
			<div id="header_main">
				<div class="header_date">
					今天是
					<script language="JavaScript">
					today=new Date();
					var week; var date;
					if(today.getDay()==0) week="星期日"
					if(today.getDay()==1) week="星期一"
					if(today.getDay()==2) week="星期二"
					if(today.getDay()==3) week="星期三"
					if(today.getDay()==4) week="星期四"
					if(today.getDay()==5) week="星期五"
					if(today.getDay()==6) week="星期六"
					date=(today.getFullYear())+"年"+(today.getMonth()+1)+"月"+today.getDate()+"日"+"  "
					document.write("<span style='font-size: 9pt;'>"+date+week+"</span>");
					</script>
				</div>
				<!-- <div class="header_contact">
					<ul>
						<li><a class="email" href="<?php echo get_permalink(22); ?>">领导信箱</a></li>
					</ul>
				</div> -->
			</div>
		</div>
		<a href="/"><div id="header_logo"></div></a>
		<div id="nav">
			<div id="nav_main" class="clear">
				<?php if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) { ?>
					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
						<ul class="primary-menu reset-list-style">
						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								array(
									'container'  => '',
									'items_wrap' => '%3$s',
									'theme_location' => 'primary',
								)
							);
						}
						?>
						</ul>
					</nav><!-- .primary-menu-wrapper -->
				<?php } ?>
			</div>
		</div>