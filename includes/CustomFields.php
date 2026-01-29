<?php

namespace CustomFields;

use WP_Query;

require_once CORE_CUSTOMFIELDS . 'Products.php';

\CustomFields\initialize();

function initialize()
{
    add_action('admin_init', '\CustomFields\adminInit');  
    
    add_action('save_post_product', '\CustomFields\saveProductSubtitle');
    add_action('save_post_product', '\CustomFields\saveProductSpecifications');
}


/**
 * Custom Fields in Posts
 */
function adminInit()
{
    add_meta_box( 'product_subtitle_meta', 'Subtitle:', '\CustomFields\productSubtitle', 'product', 'normal', 'high' );
    add_meta_box( 'product_specifications_meta', 'Specifications:', '\CustomFields\productSpecifications', 'product', 'normal' );
}