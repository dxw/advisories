<div class="cont-header">

  		<!-- Menu -->
	  	<div class="container">
	    	<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
			      <a href="#" title="" id="menu_search"  data-html="true" data-toggle="popover" data-placement="left" data-content="<form action='' method='get' class='mobile-search'><input type='text' placeholder='Search...'></form>"  class="share"><i class="icon-search icon-large"></i></a>
		      	  <div id="menu_bg"><i class="icon-reorder icon-2x"></i></div>
		      	  <div id="menu_cont">
                            <select id="menu" name="menu">
                                   <option value="">- Select -</option>
                                   <option value="/">Home</option>
                                   <option value="/plugins">Plugins</option>
                                   <option value="/advisories">Advisories</option>
                                   <option value="/about">About</option>
                                   <option value="#contact_us">Contact</option>
                            </select>
		      	  </div>
		          <!-- Logo -->
		          <div class="brand_logo">
		          	<a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo.png" alt="dxw logo"/><span>dxw</span>security</a>
		          </div>
		          <!-- Logo end -->
		          <div class="nav-collapse collapse">
                            <?php 
                              wp_nav_menu( array( 
                                'theme_location' => 'primary_navigation',
                                'menu_class' => 'nav'
                              )); 
                            ?>
		          </div>
		      </div>
		    </div>
	  	</div>
	  	<!-- Menu end -->
  	</div>
  	<!-- Header End -->
