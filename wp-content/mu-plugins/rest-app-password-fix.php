<?php
/**
 * Plugin Name: REST Application Password Fix
 * Description: Αναγνωρίζει τα αιτήματα REST API ως API requests, ώστε να ελέγχονται τα Application Passwords.
 */
add_filter( 'application_password_is_api_request', function ( $is_api_request ) {
    if ( $is_api_request ) {
        return true;
    }
    $uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';
    return ( strpos( $uri, '/wp-json/' ) !== false ) || isset( $_GET['rest_route'] );
} );
