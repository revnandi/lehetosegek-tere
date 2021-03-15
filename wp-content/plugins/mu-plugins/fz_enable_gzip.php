<?php 
/**
 * Plugin Name: FREIZEIT Enable gzip
 * Description: Enable gzip.
 * Author:      Studio Freizeit
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */

if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
  add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));

?>