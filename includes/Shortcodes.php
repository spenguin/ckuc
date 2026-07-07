<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'products_listing.php';
require_once CORE_SHORTCODE . 'publisherApplication.php';



\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'products_listing', '\products_listing' );
}