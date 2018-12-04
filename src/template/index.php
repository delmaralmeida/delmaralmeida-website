<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
get_header();

if ( have_posts() ) :
  while ( have_posts() ) : the_post();

    the_title();

  endwhile;
endif;

get_footer(); ?>