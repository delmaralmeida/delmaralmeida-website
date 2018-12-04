<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
$site_name        = get_bloginfo( 'name' );
$page_description = get_bloginfo( 'description' ) . ' &hearts;';
$page_img         = get_template_directory_uri().'/screenshot.png';
$page_url         = pll_home_url();

if ( is_home() ) {
  $page_title = $site_name . ' - ' . pll__( 'subtítulo' );
}
else {
  $page_title = get_the_title();
} ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
# normal ?>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width"/>
<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.jpg" rel="apple-touch-icon-precomposed">
<?php
# facebook ?>
<meta property="og:site_name" content="<?php echo $site_name; ?>"/>
<meta property="og:title" content="<?php echo $page_title; ?>"/>
<meta property="og:description" content="<?php echo $page_description; ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo $page_url; ?>"/>
<meta property="og:image" content="<?php echo $page_img; ?>"/>
<meta property="og:locale" content="<?php echo get_locale(); ?>"/>
<?php
# twitter ?>
<meta name="twitter:card" content="summary<?php #summary_large_image ?>"/>
<meta name="twitter:site" content="@delmar_almeida"/>
<meta name="twitter:creator" content="@delmar_almeida"/>
<meta name="twitter:title" content="<?php echo $page_title; ?>"/>
<meta name="twitter:description" content="<?php echo $page_description; ?>"/>
<meta name="twitter:image" content="<?php echo $site_img ?>"/>
<?php
# google ?>
<meta name="google-site-verification" content="RK_StdOdagrE0GYyIT0lyhXKIyjlAcFRlomT3awt7rI"/>
<meta name="description" content="<?php echo $page_description; ?>"/>
<title><?php echo $page_title; ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>