<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

<?php
# header navbar
get_template_part( 'components/header/navbar' ); ?>

<section>
	<div class="container">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>

		<div class="text-center pb-5">
			<h3 class="h1"><?php echo get_the_title(); ?></h3>
		</div>

		<div class="row">
			<div class="page-content col-12 col-md-8">
				<?php echo get_the_content(); # change this into the_content() to apply tags correctly ?>
			</div>
		</div>

		<?php
		endwhile;
	endif; ?>

	</div>	
</section>


<?php get_footer(); ?>