<?php get_header(); ?>

<div class="page-container section shop-page-container <?php if(is_product()) { ?> product-page-container <?php } ?>">
    <div class="content">
        <div class="container">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>