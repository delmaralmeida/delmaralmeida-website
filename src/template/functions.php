<?php if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly

#---------------#
# GET CSS FILES #
#---------------#

function get_css_files() {

  # material design for bootstrap
  wp_enqueue_style( 'fontawesome',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'bootstrap',
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css' );
  wp_enqueue_style( 'MDB',
    'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css' );

  # fonts
  // wp_enqueue_style( 'roboto-font',
  //   'https://fonts.googleapis.com/css?family=Roboto:100,400,700', false );
  wp_enqueue_style( 'raleway-font',
    'https://fonts.googleapis.com/css?family=Raleway:100,400,700', false );

  # styles
  wp_enqueue_style( 'cookieconsent', 
    'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css' );
  wp_enqueue_style( 'swiper', 
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.6/css/swiper.min.css' );
  wp_enqueue_style( 'devicons', 
    'https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css' );
  wp_enqueue_style( 'styles',
    get_template_directory_uri() . '/css/styles.css' );

}
add_action( 'wp_enqueue_scripts', 'get_css_files' );

#--------------#
# GET JS FILES #
#--------------#

function get_js_files() {

  # keep wordpress jquery version for other plugins 
  wp_enqueue_script( 'jquery', array(), null, true );

  # material design bootstrap
  wp_enqueue_script( 'jQuery',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js', array(), '1.0.0', true );
  wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js', array( 'jQuery' ), '1.0.0', true );
  wp_enqueue_script( 'MDB-js','https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js', array( 'jQuery' ), '1.0.0', true );

  # GreenSock - lightweight
  // wp_enqueue_script( 'GSAP-CSSPlugin',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/CSSPlugin.min.js' );
  // wp_enqueue_script( 'GSAP-EasePack',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/easing/EasePack.min.js' );
  // wp_enqueue_script( 'GSAP-TweenLite',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenLite.min.js' );
  // wp_enqueue_script( 'GSAP-TimeLineLite',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineLite.min.js' );
  # GreenSock - Utils
  // wp_enqueue_script( 'GSAP-TweenMax',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js' );
  // wp_enqueue_script( 'GSAP-TimeLineMax',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineMax.min.js' );
  // wp_enqueue_script( 'GSAP-ScrollToPlugin',
  //   'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/ScrollToPlugin.min.js' );

  # scripts
  wp_enqueue_script( 'masonry',
    'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js' );
  wp_enqueue_script( 'cookieconsent-js',
    'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js' );
  wp_enqueue_script( 'swiper-js',
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.6/js/swiper.min.js' );
  wp_enqueue_script( 'scripts',
    get_template_directory_uri() . '/js/scripts.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'get_js_files' );

#-------------------------#
# CREATE NAVIGATION MENUS #
#-------------------------#

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'language-menu' => __( 'Language Menu' ),
    )
  );
}
add_action( 'init', 'register_menus' );

#----------------------------------#
# ADD CUSTOM CLASS TO NAVBAR ITEMS #
#----------------------------------#

# add class to <li>
function add_itemclass( $classes, $item ){
  $classes[] = 'nav-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'add_itemclass' , 10 , 2 );


# add class to <a>
function add_linkclass( $ulclass ) {
  return preg_replace( '/<a /', '<a class="waves-effect nav-link"', $ulclass );
}
add_filter( 'wp_nav_menu', 'add_linkclass' );

#--------------------#
# CREATE OPTION PAGE #
#--------------------#

if ( function_exists( 'acf_add_options_page' ) ) {

  acf_add_options_page();
    acf_add_options_sub_page( 'Geral' );

}

#----------------#
# REMOVE WIDGETS #
#----------------#

function remove_dashboard_widgets() {

  remove_action('welcome_panel', 'wp_welcome_panel'); # welcome panel
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); # wordpress events and news
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); # quick draft
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); # at a glance
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); # activity
  # remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  # remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  # remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  # remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); # recent drafts
  # remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); # recent comments

}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

#-----------------------------#
# POLYLANG STRING TRANSLATION #
#-----------------------------#

function polylang_string_list() {

  if ( function_exists( 'pll_register_string' ) ) {

    # cookiebar
    pll_register_string( 'mensagem de cookies', 'mensagem de cookies', 'cookiebar' );
    pll_register_string( 'botão de cookies', 'botão de cookies', 'cookiebar' );

    # metadata
    pll_register_string( 'subtítulo', 'subtítulo', 'meta-data' );

    # hero
    pll_register_string( 'área de trabalho', 'área de trabalho', 'header' );
    pll_register_string( 'cta header-1', 'cta header-1', 'header' );
    pll_register_string( 'cta header-2', 'cta header-2', 'header' );

    # services
    pll_register_string( 'serviços', 'serviços', 'serviços' );
    pll_register_string( 'mensagem de serviços', 'mensagem de serviços', 'serviços' );
    pll_register_string( 'serviço um', 'serviço um', 'serviços' );
    pll_register_string( 'serviço dois', 'serviço dois', 'serviços' );
    pll_register_string( 'serviço dois', 'serviço três', 'serviços' );
    pll_register_string( 'descrição um', 'descrição um', 'serviços' );
    pll_register_string( 'descrição dois', 'descrição dois', 'serviços' );
    pll_register_string( 'descrição dois', 'descrição três', 'serviços' );
    pll_register_string( 'cta serviços', 'cta serviços', 'serviços' );

    # protfolio
    pll_register_string( 'portfólio', 'portfólio', 'portfólio' );
    pll_register_string( 'mensagem de portfólio', 'mensagem de portfólio', 'portfólio' );
    pll_register_string( 'ver projecto', 'ver projecto', 'portfólio' );

    # skills
    pll_register_string( 'mensagem de skills', 'mensagem de skills', 'skills' );
    pll_register_string( 'cta skills', 'cta skills', 'skills' );

    # about
    pll_register_string( 'sobre', 'sobre', 'sobre' );
    pll_register_string( 'mensagem sobre', 'mensagem sobre', 'sobre' );

    # contact
    pll_register_string( 'contacto', 'contacto', 'contacto' );
    pll_register_string( 'mensagem de contacto', 'mensagem de contacto', 'contacto' );
    pll_register_string( 'mensagem de aviso', 'mensagem de aviso', 'contacto' );
    pll_register_string( 'mensagem de agradecimento', 'mensagem de agradecimento', 'contacto' );

    # pages
    pll_register_string( 'voltar', 'voltar', 'páginas' );

  }

}
add_action( 'init', 'polylang_string_list' );

?>