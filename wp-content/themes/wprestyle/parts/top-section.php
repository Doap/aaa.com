
<!-- featured box -->
	<div class="featured-image-boxes">
		
		<div class="wprestyle-text">
		<h2 class="text-center v-center">
            <?php if (get_theme_mod( 'wprestyle_logo_image' )) : ?>
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			    <img src="<?php echo esc_url(get_theme_mod( 'wprestyle_logo_image' )); ?>" alt="<?php echo esc_html(get_theme_mod( 'wprestyle_logo_alt_text' )); ?>" />
			</a>
		<?php else : ?>
            <a class="brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php endif; ?>
		</h2>
				
		<?php get_template_part( 'parts/cta' ); ?>
			
	    </div>
		
		<div class="wprestyle-image">
			<?php if ( get_theme_mod('wprestyle_intro_image')) : ?>
				<img src="<?php echo esc_url(get_theme_mod('wprestyle_intro_image')); ?>" alt="<?php echo esc_html(get_theme_mod('wprestyle_intro_image_alttext')); ?>">
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/01.png">
			<?php endif; ?>
				
		</div>	
	
	</div>
<!-- featured box -->		
