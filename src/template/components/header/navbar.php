<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
function make_nav( $slug ){
  $array = array(
    'theme_location' => $slug,
    'container'      => false,
    'items_wrap'     => '%3$s',
    'echo'           => false,
    'depth'          => 0,
  );
  return $array;
};

$header_menu   = wp_nav_menu( make_nav( 'header-menu' ) );
$language_menu = wp_nav_menu( make_nav( 'language-menu' ) );

?>

<nav id="header_nav" class="header-menu z-depth-1">
  <ul class="nav container">

    <div class="nav language-nav">
      <?php echo $language_menu; ?>
    </div>

    <?php
    if ( is_home() ) :
      echo $header_menu;

    else : ?>
    <li class="nav-item">
      <a class="waves-effect nav-link" href="<?php echo pll_home_url() ?>">
        <i class="fa fa-chevron-left fa-fh pr-2"></i><?php echo pll__( 'voltar' ); ?></a></li>

    <?php
    endif; ?>

    <li class="li-toggler grow-1">
      <button class="navbar-toggler waves-effect z-depth-2 text-left" type="button" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
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