<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# fields
$projects = get_field( 'projects', 'options' ); ?>

<div class="project-slider swiper-container">
  <div class="swiper-wrapper">

  <?php
  if ( $projects ) :
    foreach ( $projects as $project ) :
      $title       = $project['title'];
      $img         = $project['sizes']['large'];
      $url         = $project['alt'];
      $description = $project['description']; ?>

    <div class="swiper-slide">
      <h4><?php echo $title; ?></h4>

      <?php ( !empty( $url ) ? $href = ' href="' . esc_url( $url ) . '"' : $href = '' ); ?>

      <a class="card card-image btn"<?php echo $href; ?> target="_BLANK" style="background-image: url('<?php echo $img; ?>');">
        <div class="text-white text-center d-flex rgba-white-slight">
          <div class="card-text"></div>

          <?php if ( !empty( $url ) ) : ?>
          <div>

            <?php if ( !empty( $description ) ) : ?>
              <p style="text-decoration: none;" class="text-white text-lowercase font-weight-normal mb-2"><?php echo $description; ?></p>
            <?php endif; ?>

            <div class="border-red">
              <i class="fa fa-clone left"></i>
              <?php echo pll__( 'ver projecto' ); ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </a>
    </div>
              
    <?php
    endforeach;
  endif; ?>

  </div>


</div>

<div class="project-pagination swiper-pagination"></div>

<div class="swiper-btn button-next">
  <i class="fa fa-angle-right fa-3x"></i>
</div>

<div class="swiper-btn button-prev">
  <i class="fa fa-angle-left fa-3x"></i>
</div>