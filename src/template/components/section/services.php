<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="container">
	<div class="text-center pb-5">
		<h3 class="h1"><?php echo pll__( 'serviços' ); ?></h3>
		<p><?php echo pll__( 'mensagem de serviços' ); ?></p>
	</div>

	<div class="grow-1 d-flex flex-column justify-content-center">
		<div class="row">

			<div class="col-12 col-md-4 text-center">
				<span class="fa-stack fa-4x">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
				</span>
				<h4><?php echo pll__( 'serviço um' ); ?></h4>
				<p class="text-justify"><?php echo pll__( 'descrição um' ); ?></p>
			</div>

			<div class="col-12 col-md-4 text-center">
				<span class="fa-stack fa-4x">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-code fa-stack-1x fa-inverse"></i>
				</span>
				<h4><?php echo pll__( 'serviço dois' ); ?></h4>
				<p class="text-justify"><?php echo pll__( 'descrição dois' ); ?></p>
			</div>

			<div class="col-12 col-md-4 text-center">
				<span class="fa-stack fa-4x">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-heart-o fa-stack-1x fa-inverse"></i>
				</span>
				<h4><?php echo pll__( 'serviço três' ); ?></h4>
				<p class="text-justify"><?php echo pll__( 'descrição três' ); ?></p>
			</div>

		</div>
	</div>

	<div class="text-center">
		<a class="btn border-red mt-5" href="#contact">
			<?php echo pll__( 'cta serviços' ); ?></a>			
	</div>
</div>