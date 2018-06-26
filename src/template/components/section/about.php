<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# set about fields
$site_name 	 = get_bloginfo( 'name' );
$profile_pic = get_field( 'profile_pic', 'options' ); ?>

<div class="container">
	<div class="text-center pb-5">
		<h3 class="h1"><?php echo pll__( 'sobre' ); ?></h3>
		<p><?php echo pll__( 'mensagem sobre' ); ?></p>
	</div>

	<div class="row grow-1">
		<div class="col-md-6">
			<div class="img-wrapper rounded-circle">
				<img src="<?php echo $profile_pic['sizes']['large']; ?>">
			</div>
		
			<ul class="nav">
			<?php

			if ( have_rows( 'social_network', 'options' ) ) :
				while ( have_rows( 'social_network', 'options' ) ) : the_row();
					$social_icon = get_sub_field( 'social_icon' );
					$social_url = get_sub_field( 'social_url' ); ?>

					<li>
						<a class="btn social-link border-red" href="<?php echo esc_url( $social_url ); ?>" target="_blank">
							<i class="fa <?php echo $social_icon; ?> fa-lg"></i></a></li>

				<?php
				endwhile;
			endif; ?>
			</ul>

		</div>

		<div class="col-md-6 content">
			<h4><?php echo $site_name; ?></h4>

			<?php
			# set current language
			$lang = get_locale();

			if ( have_rows( 'about', 'options' ) ) :
				while ( have_rows( 'about', 'options' ) ) : the_row();
					$language_code = get_sub_field( 'language_code' );
					$about_me 		 = get_sub_field( 'about_me' );

					if ( $language_code == $lang ) :

						echo $about_me;

					endif;
				endwhile;
			endif; ?>

		</div>
	</div>

</div>