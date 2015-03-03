  	<div class="text-center">        
		<?php if ( get_theme_mod( 'wprestyle_intro_text_visibility' ) != 1 ) : ?>
		<?php if (get_theme_mod( 'wprestyle_intro_text' )) { ?>
		    <p class="lead">
			    <?php echo esc_html(get_theme_mod( 'wprestyle_intro_text' )) ;?>
			</p>
		<?php } else { ?>
		    <p class="lead">
			    <?php printf( __( 'We are a small team of web development enthusiasts aiming to generate clean and functional themes using the Bootstrap toolkit together with WordPress...', 'wprestyle' ) ); ?>
			</p>
        <?php } ?>
		<?php endif; ?>
		<br> 
      	<?php if ( get_theme_mod( 'wprestyle_intro_button_visibility' ) != 1 ) : ?>
		
	        <div class="btn-group purchase_toggle_buttons">
			<?php $wprestyle_purch_lt_url    = esc_url(get_theme_mod( 'wprestyle_purchase_left_url' )); ?>
			<?php $wprestyle_purch_lt_text   = esc_html(get_theme_mod( 'wprestyle_purchase_left_text' )); ?>
			<?php $wprestyle_purch_lt_target = esc_attr(get_theme_mod( 'wprestyle_purchase_left_url_target' )); ?>
			<?php $wprestyle_purch_rt_url    = esc_url(get_theme_mod( 'wprestyle_purchase_right_url' )); ?>
			<?php $wprestyle_purch_rt_text   = esc_html(get_theme_mod( 'wprestyle_purchase_right_text' )); ?>
			<?php $wprestyle_purch_rt_target = esc_attr(get_theme_mod( 'wprestyle_purchase_right_url_target' )); ?>			
			
			    <?php if (get_theme_mod( 'wprestyle_purchase_left_url' )) { ?>
				    <a href="<?php echo $wprestyle_purch_lt_url ?>" target="<?php echo $wprestyle_purch_lt_target ?>" type="button" class="btn btn-default purchase_toggle_button left">
				        <?php echo $wprestyle_purch_lt_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button left">
					    <?php printf( __( 'Take A Tour!', 'wprestyle' ) ); ?>
					</a>
				<?php } ?>
				
				<?php if (get_theme_mod( 'wprestyle_purchase_left_url' )) { ?>
				    <a href="<?php echo $wprestyle_purch_rt_url ?>" target="<?php echo $wprestyle_purch_rt_target ?>" type="button" class="btn btn-default purchase_toggle_button right">
				        <?php echo $wprestyle_purch_rt_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button right">
					    <?php printf( __( 'Create My Account!', 'wprestyle' ) ); ?>
					</a>
				<?php } ?>
                <span class="or-cta"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></span>
				
            </div>
			
	    
		<?php endif; ?>
    </div>
	
