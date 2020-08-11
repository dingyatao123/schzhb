<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>
		<footer id="site-footer" role="contentinfo" class="header-footer-group">
			<div id="nav2">
				<div id="nav_main2" class="clear">
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
			<div class="bottom">
				<?php echo get_post(2)->post_content; ?>		
			</div>
		</footer><!-- #site-footer -->
<?php wp_footer(); ?>
	</body>
</html>
