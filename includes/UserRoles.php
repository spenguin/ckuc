<?php
/**
 * Create new User Roles
 */

add_action( 'init', 'custom_user_roles' );

function custom_user_roles()
{
    // Publisher role
    if ( ! get_role( 'publisher' ) ) {
        add_role(
            'publisher',          // 1. Role ID/Slug (lowercase, no spaces)
            __( 'Publisher' ),    // 2. Display Name visible in dashboard
            array(
                'read'         => true,  // Minimum required capability to access dashboard
                'edit_posts'   => true,  // Allows editing their own posts
                'upload_files' => true,  // Allows uploading media
                'publish_posts'=> false, // Denies publishing power explicitly
            )
        );
    }  
    
    // Retailer role
    if ( ! get_role( 'retailer' ) ) {
        add_role(
            'retailer',          // 1. Role ID/Slug (lowercase, no spaces)
            __( 'Retailer' ),    // 2. Display Name visible in dashboard
            array(
                'read'         => true,  // Minimum required capability to access dashboard
                'edit_posts'   => true,  // Allows editing their own posts
                'upload_files' => true,  // Allows uploading media
                'publish_posts'=> false, // Denies publishing power explicitly
            )
        );
    }    
}