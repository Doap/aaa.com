<nav class="navbar navbar-trans navbar-static-top" role="navigation">
  <div class="container">
    <div class="col-sm-8">		
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only"><?php _e( 'Toggle navigation', 'wprestyle' ); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'nav-container collapse navbar-collapse',
            'container_id'      => 'navbar-collapse',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wprestyle_bootstrap_navwalker::fallback',
            'walker'            => new wprestyle_bootstrap_navwalker())
        );
    ?>
	</div>
	
  </div>
</nav>