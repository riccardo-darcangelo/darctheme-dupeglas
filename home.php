<?php
/**
 *	The template for dispalying the homepage.
 *
 *	@package WordPress
 *	@subpackage DarcTheme
 */
?>
<?php get_header(); ?>
<div class="home">
    <section class="hero section" style="background-image: url('<?php echo get_theme_mod('homepage_hero_bg_img'); ?>;')">
		<div class="hero-img">
            <img src="<?php echo get_theme_mod('homepage_hero_feature_img'); ?>" alt="...">
        </div>
        <div class="hero-title">
            <h1><?php echo get_theme_mod('homepage_hero_title'); ?></h1>
        </div>
    </section>

    <!-- Populer collection -->
    <!-- <section class="collection section mt">
        <div class="collection-title">
            <h3><b>Beliebte</b> Kollektion</h3>
            <div class="more-btn">
                <a href="<?php echo home_url() . '/shop/?orderby=popularity/'; ?>">Entdecke mehr</a>
            </div>
        </div>
        <div class="collection-products">
            <?php echo do_shortcode('[products limit="6" best_selling]') ?>
        </div>
    </section>-->

    <!-- Categories -->
    <section class="collection section mt">
        <div class="collection-title">
            <h3><b>Unsere</b> Düfte</h3>
        </div>
        <div>
            <div class="dg-category">
                <div class="wrapper-card" id="woman">
                    <a href="<?php echo home_url() . '/produkt-kategorie/damenparfuem/'; ?>">
                        <img src="<?php echo get_theme_mod('homepage_category_woman_img'); ?>" alt="damenduft">
                    </a>
                    <div class="card-subtext">
                        <h4><b>Für</b> Damen</h4>
                    </div>
                </div>
                <div class="wrapper-card" id="men">
                    <a href="<?php echo home_url() . '/produkt-kategorie/herrenparfum/'; ?>">
                        <img src="<?php echo get_theme_mod('homepage_category_men_img'); ?>" alt="herrenduft">
                    </a>
                    <div class="card-subtext">
                        <h4><b>Für</b> Herren</h4>
                    </div>
                </div>
            </div>
            <div class="dg-category">
                <div class="wrapper-card" id="luxury">
                    <a href="<?php echo home_url() . '/produkt-kategorie/luxury-line/'; ?>">
                        <img src="<?php echo get_theme_mod('homepage_category_luxury_img'); ?>" alt="luxury line">
                    </a>
                    <div class="card-subtext">
                        <h4><b>Luxury</b> Line</h4>
                    </div>
                </div>
                <div class="wrapper-card" id="unisex">
                    <a href="<?php echo home_url() . '/produkt-kategorie/unisex-line/'; ?>">
                        <img src="<?php echo get_theme_mod('homepage_category_unisex_img'); ?>" alt="unisex line">
                    </a>
                    <div class="card-subtext">
                        <h4><b>Unisex</b> Line</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Populer collection -->
    <section class="section mt populer">
        <div class="collection-title">
            <h3><b>Neuste</b> Produkte</h3>
            <div class="more-btn">
                <a href="<?php echo home_url() . '/shop/?orderby=date/'; ?>">Entdecke mehr</a>
            </div>
        </div>
        <div class="dg-new-products">
            <?php echo do_shortcode('[products limit = "4" orderby = "id" order = "DESC" visible = "visible"]') ?>
        </div>
    </section>
	
	<!-- Feature -->
    <section class="collection section mt">

        <div>
            <div class="dg-feature-card-wrapper">
                <div class="feature-card">
                    <img src="<?php echo bloginfo('template_url'); ?>/assets/icons/versand.webp" alt="...">
					<h4>Kostenfreier Versand ab 100€</h4>
                </div>
				<div class="feature-card">
                    <img src="<?php echo bloginfo('template_url'); ?>/assets/icons/ssl.webp" alt="...">
					<h4>Bezahle Sicher & Schnell</h4>
                </div>
				<div class="feature-card">
                    <img src="<?php echo bloginfo('template_url'); ?>/assets/icons/checked.webp" alt="...">
					<h4>100% Authentischer Duft</h4>
                </div>

            </div>
        </div>
    </section>

    <!-- About us -->
    <section class="collection section mt">
        <div class="collection-title">
            <h3><b>Über</b> Uns</h3>
        </div>
        <div class="about-wrapper">
            <div class="dg-about-img" id="about-theme">
                <img src="<?php echo get_theme_mod('homepage_about_img'); ?> " alt="...">
            </div>
            <div class="dg-about-text">
                <div>
                    <h3><?php echo get_theme_mod('homepage_about_title'); ?></h3>
                    <p><?php echo get_theme_mod('homepage_about_text'); ?></p>
                    <div class="more-btn dg-about-btn">
                        <a href="<?php echo get_theme_mod('homepage_about_link'); ?>" target="__blank"><?php echo get_theme_mod('homepage_about_link_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>