<?php 
$wprestyle_serv1_url   = esc_url(get_theme_mod( 'wprestyle_box_url1' ));
$wprestyle_serv2_url   = esc_url(get_theme_mod( 'wprestyle_box_url2' ));
$wprestyle_serv3_url   = esc_url(get_theme_mod( 'wprestyle_box_url3' ));
$wprestyle_serv3_url   = esc_url(get_theme_mod( 'wprestyle_box_url4' )); 
?>       		
		<!-- three column box -->
			<div class="wprestyle-column-box-wrapper">

				<!-- Box1 -->
				<div class="wprestyle-column-box first">
					<div class="box-image">
						<?php if ( get_theme_mod('wprestyle_box_image1')) { ?>
						    <img src="<?php echo esc_html(get_theme_mod('wprestyle_box_image1')); ?>">
						<?php } else { ?>
						    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/02.jpg">
						<?php } ?>
					
					<div class="box-text">
						<?php if ( get_theme_mod('wprestyle_box_title1') && get_theme_mod( 'wprestyle_box_url1' )) { ?>
							<a href="<?php echo $wprestyle_serv1_url ?>">
							    <h4><?php echo esc_html(get_theme_mod('wprestyle_box_title1')); ?></h4>
							</a>
						<?php } elseif ( get_theme_mod('wprestyle_box_title1')) { ?>
							<h4><?php echo esc_html(get_theme_mod('wprestyle_box_title1')); ?></h4>
							<?php } else { ?>
							    <h4><?php _e('CUSTOMIZER OPTIONS', 'wprestyle'); ?></h4>
						    <?php } 
						?>						
						
						<?php if ( get_theme_mod('wprestyle_box_text1')) { ?>
							<p><?php echo esc_html(get_theme_mod('wprestyle_box_text1')); ?></p>							
						<?php } else { ?>
							<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien...', 'wprestyle'); ?></p>
						<?php } ?>
						
					</div>
					
					</div>
					
				</div>
				<!-- Box1 -->

				<!-- Box2 -->
				<div class="wprestyle-column-box second">
					<div class="box-image">
						<?php if ( get_theme_mod('wprestyle_box_image2')) { ?>
						    <img src="<?php echo esc_html(get_theme_mod('wprestyle_box_image2')); ?>">
						<?php } else { ?>
						    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/03.jpg">
						<?php } ?>
					</div>
					<div class="box-text">
						<?php if ( get_theme_mod('wprestyle_box_title2') && get_theme_mod( 'wprestyle_box_url2' )) { ?>
							<a href="<?php echo $wprestyle_serv2_url ?>">
							    <h4><?php echo esc_html(get_theme_mod('wprestyle_box_title2')); ?></h4>
							</a>
						<?php } elseif ( get_theme_mod('wprestyle_box_title2')) { ?>
							    <h4><?php echo esc_html(get_theme_mod('wprestyle_box_title2')); ?></h4>
							<?php } else { ?>
							    <h4><?php _e('CLEAN POST GRID', 'wprestyle'); ?></h4>
						    <?php } 
						?>						
						
						<?php if ( get_theme_mod('wprestyle_box_text2')) { ?>
							<p><?php echo esc_html(get_theme_mod('wprestyle_box_text2')); ?></p>							
						<?php } else { ?>
							<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien...', 'wprestyle'); ?></p>
						<?php } ?>
					</div>
				</div>
				<!-- Box2 -->

				<!-- Box3 -->
				<div class="wprestyle-column-box third">
					<div class="box-image">
						<?php if ( get_theme_mod('wprestyle_box_image3')) { ?>
						    <img src="<?php echo esc_html(get_theme_mod('wprestyle_box_image3')); ?>">
						<?php } else { ?>
						    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/04.jpg">
						<?php } ?>
					</div>
					<div class="box-text">
						<?php if ( get_theme_mod('wprestyle_box_title3') && get_theme_mod( 'wprestyle_box_url3' )) { ?>
							<a href="<?php echo $wprestyle_serv3_url ?>">
							    <h4><?php echo esc_html(get_theme_mod('wprestyle_box_title3')); ?></h4>
							</a>
						<?php } elseif ( get_theme_mod('wprestyle_box_title3')) { ?>
							<h4><?php echo esc_html(get_theme_mod('wprestyle_box_title3')); ?></h4>
							<?php } else { ?>
							    <h4><?php _e('JETPACK PORTFOLIO SUPPORT', 'wprestyle'); ?></h4>
						    <?php } 
						?>						
						
						<?php if ( get_theme_mod('wprestyle_box_text3')) { ?>
							<p><?php echo esc_html(get_theme_mod('wprestyle_box_text3')); ?></p>							
						<?php } else { ?>
							<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien...', 'wprestyle'); ?> </p>
						<?php } ?>
					</div>
				</div>
				<!-- Box3 -->
				
				<!-- Box4 -->
				<div class="wprestyle-column-box fourth">
					<div class="box-image">
						<?php if ( get_theme_mod('wprestyle_box_image4')) { ?>
						    <img src="<?php echo esc_html(get_theme_mod('wprestyle_box_image4')); ?>">
						<?php } else { ?>
						    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/05.jpg">
						<?php } ?>
					</div>
					<div class="box-text">
						<?php if ( get_theme_mod('wprestyle_box_title4') && get_theme_mod( 'wprestyle_box_url4' )) { ?>
							<a href="<?php echo $wprestyle_serv4_url ?>">
							    <h4><?php echo esc_html(get_theme_mod('wprestyle_box_title4')); ?></h4>
							</a>
						<?php } elseif ( get_theme_mod('wprestyle_box_title4')) { ?>
							<h4><?php echo esc_html(get_theme_mod('wprestyle_box_title4')); ?></h4>
							<?php } else { ?>
							    <h4><?php _e('CLEAN PORTFOLIO GRID', 'wprestyle'); ?></h4>
						    <?php } 
						?>						
						
						<?php if ( get_theme_mod('wprestyle_box_text4')) { ?>
							<p><?php echo esc_html(get_theme_mod('wprestyle_box_text4')); ?></p>							
						<?php } else { ?>
							<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien...', 'wprestyle'); ?> </p>
						<?php } ?>
					</div>
				</div>
				<!-- Box4 -->

			</div>
		<!-- three column box -->		
	