<?php
/**
 * Redirect different Roles to appropriate landing pages
 * Requires appropriate Pages
 */

add_filter( 'login_redirect', 'custom_role_login_redirect', 10, 3 );

function custom_role_login_redirect( $redirect_to, $request, $user ) 
{
    // Check if the user object exists and is valid
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        
        // 1. Redirect Administrators to the back-end dashboard
        if ( in_array( 'administrator', $user->roles ) ) {
            return admin_url();
        } 
        
        // 2. Redirect Editors to a specific management page
        elseif ( in_array( 'editor', $user->roles ) ) {
            return home_url( '/editor-dashboard/' );
        } 
        
        // 3. Redirect Subscribers or Customers to their profile/portal
        elseif ( in_array( 'subscriber', $user->roles ) ) {
            return home_url( '/client-portal/' );
        }
    }

    // Fallback for any other user roles
    return $redirect_to;
}
