<?php
/**
 * Plugin Name: Polylang – No Language Cookie
 * Description: Η γλώσσα καθορίζεται από το URL, οπότε το cookie pll_language δεν χρειάζεται (GDPR).
 */
if ( ! defined( 'PLL_COOKIE' ) ) {
    define( 'PLL_COOKIE', false );
}
