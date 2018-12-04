<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="testimonials-slider swiper-container">
  <div class="swiper-wrapper">

  <?php
  if ( have_rows( 'testimonials', 'options' ) ) :
    while ( have_rows( 'testimonials', 'options' ) ) : the_row();
      $testimonial_name = get_sub_field( 'testimonial_name' );
      $testimonial_company = get_sub_field( 'testimonial_company' );
      $testimonial_pic = get_sub_field( 'testimonial_pic' ); ?>

      <div class="swiper-slide text-center">
        <div class="avatar mx-auto mb-4">
          <img src="<?php echo $testimonial_pic['sizes']['large']; ?>" class="rounded-circle img-fluid" alt="First sample avatar image">
        </div>
        <h4 class="testimonial_name"><?php echo $testimonial_name; ?></h4>
        <p class="quote pb-4"><?php echo $testimonial_company; ?></p>
        <p class="quote col-lg-8 m-auto">
          <i class="fa fa-quote-left"></i>

          <?php
          $lang = get_locale();
          if ( have_rows( 'testimonial' ) ) :
            while ( have_rows( 'testimonial' ) ) : the_row();
              $language_code = get_sub_field( 'language_code' );
              $testimonial_text = get_sub_field( 'testimonial_text', false );

              if ( $lang == $language_code ) :
                echo $testimonial_text;
              endif;

            endwhile;
          endif; ?>

          <i class="fa fa-quote-right"></i>
        </p>
      </div>

    <?php
    endwhile;
  endif; ?>

  </div>
</div>

<div class="testimonials-pagination swiper-pagination"></div>

<div class="swiper-btn button-next">
  <i class="fa fa-angle-right fa-3x"></i>
</div>

<div class="swiper-btn button-prev">
  <i class="fa fa-angle-left fa-3x"></i>
</div>