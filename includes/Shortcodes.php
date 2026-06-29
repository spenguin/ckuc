<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'products_listing.php';



\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'products_listing', '\products_listing' );
}