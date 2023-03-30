<footer>
    <!-- Logo -->
    <section class="dg-footer-logo">
        <a href="#"><img src="<?php echo get_theme_mod('footer_one_logo'); ?> " alt="..."></a>
    </section>

    <!-- Social Media Links -->
    <section class="dg-social">
        <h2>Follow us on</h2>
        <div class="dg-social-links">
            <a href="<?php echo get_theme_mod('footer_two_social_two_link'); ?>" target="__blank"><img src="<?php echo get_theme_mod('footer_two_social_two_img'); ?>" alt="instagram"></a>
        </div>
    </section>

    <!-- Help Links -->
    <section class="dg-footer-nav" id="footer-nav">
        <h3>Hilfe</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-help' ) ); ?>
    </section>

    <!-- Law Links -->
    <section class="dg-footer-nav">
        <h3>Rechtliches</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-law' ) ); ?>
    </section>

    <div class="copyright" id="copyright">
        <label>Copyright &copy; <?php echo date("Y"); ?> Dupeglas | Design by <a href="https://darcdesign.de">DARCDESIGN</a></label>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>