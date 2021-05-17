<?php
function north_footer_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) :


  endif;
}
add_action('wp_footer', 'north_footer_scripts');
