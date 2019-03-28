<?php
/**
 * @package WordPress
 * @subpackage Íonz
 */
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml"  <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" src="style.css">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <script src="https://unpkg.com/scrollreveal"></script>

<?php wp_head(); ?>
</head>
<body>
  <nav id="main-nav">
    <div class="hamburger hamburger--slider js-hamburger">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>

    <div class="nav-content">
      <a href="<?php echo get_home_url() ?>"><img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/logo-ionz-menor.png" alt="Íonz" class="img-responsive logo-nav" /></a>
      <?php mainMenu(); ?>
    </div>
  </nav>
  