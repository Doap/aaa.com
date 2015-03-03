<?php get_sidebar( 'footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'wprestyle_in_before_colophon' ); ?>
		<div class="site-info">
		<div class="container">
			<?php do_action( 'wprestyle_before_credits' );
			printf( __( 'Proudly Powered By', 'wprestyle' ) ); ?><a target="_Blank" href="<?php echo esc_url( __( 'http://wordpress.org/', 'wprestyle' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'wprestyle' ); ?>"><?php printf( __( ' %s', 'wprestyle' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme:', 'wprestyle' ) ); ?><?php printf( __( ' %s', 'wprestyle' ), 'WPRestyle By:' ); ?><a target="_blank" href="<?php echo esc_url( __( 'http://www.wpstrapcode.com/', 'wprestyle' ) ); ?>" title="<?php esc_attr_e( 'WP Strap Code', 'wprestyle' ); ?>"><?php printf( __( ' %s', 'wprestyle' ), 'WP Strap Code' ); ?></a>
		<?php do_action( 'wprestyle_after_credits' ); ?>
	    </div>
	    </div><!-- .site-info -->
<?php do_action( 'wprestyle_in_after_colophon' ); ?>
</footer><!-- #colophon -->
<?php do_action( 'wprestyle_below_footer' );

wp_footer(); ?>
	</body>
</html>