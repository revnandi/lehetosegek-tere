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
    <style>
      .fz-spinner-container {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
        background: #66c79a;
      }
      .fz-spinner {
        position: relative;
        width: 5rem;
        height: 5rem;
        margin: 2rem auto;
      }

      @media only screen and (min-width: 600px) {
        .fz-spinner {
          width: 8rem;
          height: 8rem;
          margin: 2rem auto;
        }
      }

      .fz-spinner .double-bounce1, .fz-spinner .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #fa52f4;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        
        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
      }

      .fz-spinner .double-bounce2 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
      }

      @-webkit-keyframes sk-bounce {
        0%, 100% { -webkit-transform: scale(0.0) }
        50% { -webkit-transform: scale(1.0) }
      }

      @keyframes sk-bounce {
        0%, 100% { 
          transform: scale(0.0);
          -webkit-transform: scale(0.0);
        } 50% { 
          transform: scale(1.0);
          -webkit-transform: scale(1.0);
        }
      }
    </style>
  </head>

  <body id="body" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
