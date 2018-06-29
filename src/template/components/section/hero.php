<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# set hero fields
$site_name 				= get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description' );
$hero_shot 				= get_field( 'hero_shot', 'options' ); ?>

<?php if ( !empty( $hero_shot ) ) : ?>
	<div class="bg" style="background-image: url( <?php echo $hero_shot['sizes']['large']; ?> );">
	</div>
<?php endif; ?>

<div class="container text-center d-flex flex-column justify-content-around">
	<div>
		<h1><?php echo $site_name; ?></h1>
		<h2><?php echo pll__( 'área de trabalho' ); ?></h2>

		<p class="pt-4"><?php echo $site_description; ?> <span class="heart">&hearts;</span></p>
	</div>

	<div>
		<a class="btn border-white rgba-grey-strong" href="#services"><?php echo pll__( 'cta header-1' ); ?></a>
		<a class="btn border-red" href="#contact"><?php echo pll__( 'cta header-2' ); ?></a>
	</div>

</div>