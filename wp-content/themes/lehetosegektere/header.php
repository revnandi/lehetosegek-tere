<?php status_header(200); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

  <head>
    <title><?php bloginfo('name'); ?></title>
    <meta
      charset="<?php bloginfo('charset'); ?>"
      title="<?php bloginfo('name'); ?>"
      >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo get_site_icon_url(32); ?>" sizes="32x32" />
    <link rel="icon" href="<?php echo get_site_icon_url(192); ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo get_site_icon_url(180); ?>" />
    <meta name="msapplication-TileImage" content="<?php echo get_site_icon_url(270); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body id="body" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
