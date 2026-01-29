<?php
/**
 * Header Main Navigation 
 */
?>
<div class="header__main-navigation max-wrapper">
    <div class="header__main-navigation--menu">
        <?php get_template_part( 'template-parts/main-menu' ); ?>
    </div>
    <div class="header__main-navigation--logo">
        <img src="<?php echo CORE_TEMPLATE_URL; ?>/assets/furniture/ckulogo.png" alt="Cool Kids Upstairs Collective" />
    </div>
    <div class="header__main-navigation--search">
        <input type="text" name="search" />
    </div>
    <div class="header__main-navigation--cart">
        Cart
    </div>    
</div>