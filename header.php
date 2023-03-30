<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Dupeglas. Find yout Fragrance.">
    <title>Dupeglas</title>
	
	<style>
		.hero {
			background-color: var(--dg-black) !important;
		}
		
		.burger-menu {
		  z-index: 1000;
		  display: none;
		}

		@media screen and (max-width: 920px) {
		  .burger-menu {
			display: block;
		  }
		}

		svg {
		  height: 80px;
		  position: absolute;
		  width: 80px;
		  left: 0;
		}
		.plates {
		  display: flex;
		  flex-wrap: wrap;
		  max-height: 160px;
		  width: 640px;
		}
		@media (max-width: 920px) {
		  .plates {
			width: auto;
		  }
		}
		.plate {
		  height: 80px;
		  width: 80px;
		}
		.burger {
		  filter: url(#gooeyness);
		}
		.x {
		  transform: scale(0);
		  transition: transform 400ms;
		}
		.line {
		  fill: none;
		  stroke: var(--dg-black);
		  stroke-width: 6px;
		  stroke-linecap: round;
		  stroke-linejoin: round;
		  transform-origin: 50%;
		  transition: stroke-dasharray 500ms 200ms, stroke-dashoffset 500ms 200ms, transform 500ms 200ms;
		}
		.line.active {
		  stroke: var(--dg-white) !important;
		}
		.x .line {
		  stroke-width: 5.5px;
		}

		/* Plate */
		.plate2 .line1 {
		  stroke-dasharray: 21 185.62753295898438;
		  transition-delay: 0;
		}
		.plate2 .line2 {
		  stroke-dasharray: 21 178.6514129638672;
		  transition-delay: 30ms;
		}
		.plate2 .line3 {
		  stroke-dasharray: 21 197.92425537109375;
		  transition-delay: 60ms;
		}
		.plate2 .line4 {
		  stroke-dasharray: 21 190.6597137451172;
		  transition-delay: 90ms;
		}
		.plate2 .line5 {
		  stroke-dasharray: 21 208.52874755859375;
		  transition-delay: 120ms;
		}
		.plate2 .line6 {
		  stroke-dasharray: 21 186.59703063964844;
		  transition-delay: 150ms;
		}
		.active.plate2 .line1 {
		  stroke-dasharray: 5 185.62753295898438;
		  stroke-dashoffset: -141px;
		}
		.active.plate2 .line2 {
		  stroke-dasharray: 5 178.6514129638672;
		  stroke-dashoffset: -137px;
		}
		.active.plate2 .line3 {
		  stroke-dasharray: 5 197.92425537109375;
		  stroke-dashoffset: -176px;
		}
		.active.plate2 .line4 {
		  stroke-dasharray: 5 190.6597137451172;
		  stroke-dashoffset: -159px;
		}
		.active.plate2 .line5 {
		  stroke-dasharray: 5 208.52874755859375;
		  stroke-dashoffset: -139px;
		}
		.active.plate2 .line6 {
		  stroke-dasharray: 5 186.59703063964844;
		  stroke-dashoffset: -176px;
		}
		.active.plate2 .x {
		  transform: scale(1);
		  transition: transform 400ms 250ms;
		}

		.plate.plate2.active {
		  position: fixed;
		  left: 0;
		  top: 0;
		}
	</style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="section <?php if(is_home()) { ?> home-header <?php } ?>" <?php if(is_home()) { ?> id="home-header" <?php } ?>>
        <div class="header-wrapper container">
            <div id="hamburger" class="burger-menu">
               <svg>
                    <defs>
                        <filter id="gooeyness">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="2.2" result="blur" />
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="gooeyness" />
                            <feComposite in="SourceGraphic" in2="gooeyness" operator="atop" />
                        </filter>
                    </defs>
                </svg>
                <div class="plates">
                    <div class="plate plate2" onclick="this.classList.toggle('active')">
                        <svg class="burger" version="1.1" height="100" width="100" viewBox="0 0 100 100">
                            <path class="line line1" className="line" id="line" d="M 50,65 H 70 C 70,65 75,65.198488 75,70.762712 C 75,73.779026 74.368822,78.389831 66.525424,78.389831 C 22.092231,78.389831 -18.644068,-30.508475 -18.644068,-30.508475" />
                            <path class="line line2" className="line" id="line2" d="M 50,35 H 70 C 70,35 81.355932,35.300135 81.355932,25.635593 C 81.355932,20.906215 78.841706,14.830508 72.881356,14.830508 C 35.648232,14.830508 -30.508475,84.322034 -30.508475,84.322034" />
                            <path class="line line3" className="line" id="line3" d="M 50,50 H 30 C 30,50 12.288136,47.749959 12.288136,60.169492 C 12.288136,67.738339 16.712974,73.305085 40.677966,73.305085 C 73.791674,73.305085 108.47458,-19.915254 108.47458,-19.915254" />
                            <path class="line line4" className="line" id="line4" d="M 50,50 H 70 C 70,50 81.779661,50.277128 81.779661,36.607372 C 81.779661,28.952694 77.941689,25 69.067797,25 C 39.95532,25 -16.949153,119.91525 -16.949153,119.91525" />
                            <path class="line line5" className="line" id="line5" d="M 50,65 H 30 C 30,65 17.79661,64.618439 17.79661,74.152543 C 17.79661,80.667556 25.093813,81.355932 38.559322,81.355932 C 89.504001,81.355932 135.59322,-21.186441 135.59322,-21.186441" />
                            <path class="line line6" className="line" id="line6" d="M 50,35 H 30 C 30,35 16.525424,35.528154 16.525424,24.152542 C 16.525424,17.535987 22.597755,13.559322 39.40678,13.559322 C 80.617882,13.559322 94.067797,111.01695 94.067797,111.01695" />
                        </svg>
                        <svg class="x" version="1.1" height="100" width="100" viewBox="0 0 100 100">
                            <path class="line" className="line" id="line7" d="M 34,32 L 66,68" />
                            <path class="line" className="line" id="line8" d="M 66,32 L 34,68" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="header-logo" id="header-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php  echo bloginfo('template_directory') . "/assets/img/logo.webp"; ?>" class="img-fluid dg-logo" alt="...">
                </a>
            </div>
            <div class="wp-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </div>
            <div class="dg-menu">
                <a  id="show_searchbar2"><img src="<?php bloginfo('template_url'); ?>/assets/icons/search.webp" alt="search"></a>
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                    <img src="<?php echo bloginfo('template_directory') . "/assets/icons/account.webp"; ?>" alt="my account">
                </a>
                <a  >
                    <img id="show_cart" src="<?php echo bloginfo('template_directory') . "/assets/icons/cart.webp"; ?>" alt="cart">
                </a>
            </div>
        </div>
        <!-- Mobile Menu Bar -->
        <div class="dg-mobile-bar" id="dg-mobile-bar">
            <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/icons/home.webp" alt="home"></a>
            <a id="show_searchbar"><img src="<?php bloginfo('template_url'); ?>/assets/icons/search.webp" alt="search"></a>
            <a  id="show_cart2" class="cart-icon"><img src="<?php bloginfo('template_url'); ?>/assets/icons/cart.webp" alt="cart"><?php if(WC()->cart->get_cart_contents_count() > 0) { ?> <label> <?php echo WC()->cart->get_cart_contents_count(); ?> </label> <?php } ?></a>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/icons/account.webp" alt="profile"></a>
        </div>

        <!-- Mobile Menu -->
        <div class="dg-mobile-menu" id="mobile-menu-nav">
            <div class="logo-mobile-menu ">
				<a href="<?php echo home_url(); ?>">
                	<img src="<?php  echo bloginfo('template_directory') . "/assets/img/logo.webp"; ?>" class="img-fluid dg-logo" alt="...">
				</a>
            </div>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            <div class="dg-social-links mobile-menu-social">
				<div><a href="https://instagram.com/dupeglas.de?igshid=YmMyMTA2M2Y="><img src="<?php bloginfo('template_url'); ?>/assets/icons/instagram_light.webp" alt="instagram"></a></div>
            </div>
        </div>

        <!-- Cart Sidebar -->
        <div class="dg-cart" id="dg-cart">
            <div class="cart-close-btn" id="close_cart">X</div>
			<h3 style="text-align: left !important; margin-left: 2rem;">
				Warenkorb
			</h3>
            <div class="cart-wrapper">
                <?php echo do_shortcode('[woocommerce_cart]'); ?>
                <img src="<?php bloginfo('template_directory');?>/assets/img/dg_w_logo.png" class="img-fluid dg-logo" alt="...">
            </div>
        </div>

        <!-- Search Bar -->
        <div class="searchbar" id="dg-searchbar">
            <div class="searchbar-wrapper">
                <div class="searchbar-close-btn" id="close-searchbar"><a href='#'>X</a></div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>