<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WWFSMJZ');</script>
		<!-- End Google Tag Manager -->
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>

		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWFSMJZ"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap row">

					<p id="logo" class="h1 col-sm-4" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow">the st<span style="font-size:0.8em;margin:0 -2px;">&#x25b2;</span>r simpler</a></p>
					<div class="dropdown--dropdowns row col-sm-12">
						<div class="dropdown--archive">
							<select name="archive-dropdown" class="dropdown--archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
							<option value=""><?php echo attribute_escape(__('archives')); ?></option>
							<?php wp_get_archives('type=monthly&format=option'); ?> </select>
						</div>
						<div class="dropdown--category">
							<?php wp_dropdown_categories( 'show_option_none=categories' ); ?>
							<script type="text/javascript">
								<!--
								var dropdown = document.getElementById("cat");
								function onCatChange() {
									if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
										location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
									}
								}
								dropdown.onchange = onCatChange;
								-->
							</script>
						</div>

					</div>
					<nav role="navigation" class="navigation--menu-left col-sm-4" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu',                 // class of container (should you choose to use it)
    					         'menu' => __( 'Left Menu', 'treystheme' ),  // nav name
    					         'menu_class' => 'nav top-nav',               // adding custom nav class
    					         'theme_location' => 'left-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>
					<nav role="navigation" class="navigation--menu-right col-sm-4" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu',                 // class of container (should you choose to use it)
    					         'menu' => __( 'Right Menu', 'treystheme' ),  // nav name
    					         'menu_class' => 'nav top-nav',               // adding custom nav class
    					         'theme_location' => 'right-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>

					<div id="mobile-nav">
						Menu
					</div>
				</div>

			</header>
