<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# set skills fields

?>

<div class="container">
	<div class="text-center pb-5">
		<h3 class="h1"><?php echo pll__( 'skills' ); ?></h3>
		<p><?php echo pll__( 'mensagem de skills' ); ?></p>
	</div>

	<div class="text-center pb-4">
		<p class="h6"><?php echo pll__( 'disponibilidade' ); ?></p>
	</div>

	<div class="grid-skill grow-1">
	<?php
	if ( have_rows( 'skills', 'options' ) ) :
		while ( have_rows( 'skills', 'options' ) ) : the_row();
			$skill_icon = get_sub_field( 'skill_icon' ); ?>

			<div class="grid-item">
				<i class="<?php echo $skill_icon; ?>"></i>
			</div>

		<?php
		endwhile;
	endif; ?>

	</div>

	<div class="text-center">
		<a class="btn border-red mt-5" href="#contact">
			<?php echo pll__( 'cta skills' ); ?></a>			
	</div>
</div>