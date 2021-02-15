<?php 
/**
 * Plugin Name: FREIZEIT Remove ellipsis
 * Description: Replace generated ellipsis with three dots.
 * Author:      Studio Freizeit
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */

function title_remove_ellipsis( $title ){
    return str_replace( '&#8230;', '...', $title );
}
add_filter( 'the_title', 'title_remove_ellipsis', 20 );

?>