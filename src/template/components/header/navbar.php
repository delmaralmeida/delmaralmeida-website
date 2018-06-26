<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
$lang 	   = get_locale();
$lang_list = pll_the_languages( array('raw' => 1 ) ); #['pt']['url']

$header_menu = wp_nav_menu( array(
	'theme_location' => 'header-menu',
	'container' 		 => false,
	'items_wrap' 		 => '%3$s',
	'echo' 					 => false,
	'depth' 				 => 0,
) ); ?>

<nav id="header_nav" class="header-menu z-depth-1">
	<ul class="nav container">

		<div class="nav language-nav">
			<?php
			foreach( $lang_list as $item ) :
				$lang_name 	 = $item['name'];
				$lang_url 	 = $item['url'];
				$lang_locale = str_replace( '-', '_', $item['locale'] ); ?>

				<li class="nav-item">
					<a class="waves-effect nav-link<?php echo ( $lang == $lang_locale ? ' is_active' : false ); ?>" href="<?php echo $lang_url; ?>">
						<?php echo $lang_name; ?></a>
				</li>

			<?php
			endforeach; ?>
		</div>
		<?php	echo $header_menu; ?>

		<li class="li-toggler grow-1">
			<button class="navbar-toggler z-depth-2 text-left" type="button" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="menu-open-btn">
					<i class="fa fa-bars fa-1x"></i>
				</span>
				<span class="menu-close-btn">
					<i class="fa fa-close fa-1x"></i>
				</span>
			</button>
		</li>

	</ul>
</nav>