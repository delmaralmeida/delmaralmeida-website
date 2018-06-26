<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
$lang 							= get_locale();
$site_name 					= get_bloginfo( 'name' );
$site_description 	= get_bloginfo( 'description' );

if ( is_home() ) {
  $page_title       = $site_name . ' - Web developer';
  $page_description = $site_description . ' &hearts;';
  $page_img         = get_template_directory_uri().'/screenshot.png';
  $page_url         = pll_home_url( $lang );
  $work_area        = get_field( 'work_area', 'options', false );
}
else {
  $page_title       = $site_name . ' - ' . pll__( 'nome da página' );
  $page_description;
  $page_img;
  $page_url;
} ?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
<?php
# normal ?>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width"/>
<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
<?php
# facebook ?>
<meta property="og:site_name" content="<?php echo $site_name; ?>"/>
<meta property="og:title" content="<?php echo $page_title; ?>"/>
<meta property="og:description" content="<?php echo $page_description; ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo $page_url; ?>"/>
<meta property="og:image" content="<?php echo $page_img; ?>"/>
<meta property="og:locale" content="<?php echo $lang; ?>"/>
<?php
# twitter ?>
<meta name="twitter:card" content="summary<?php #summary_large_image ?>"/>
<meta name="twitter:site" content=""/>
<meta name="twitter:creator" content=""/>
<meta name="twitter:title" content="<?php echo $page_title; ?>"/>
<meta name="twitter:description" content="<?php echo $page_description; ?>"/>
<meta name="twitter:image" content="<?php echo $site_img ?>"/>
<?php
# google search ?>
<meta name="description" content="<?php echo $page_description; ?>"/>
<title><?php echo $page_title; ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>