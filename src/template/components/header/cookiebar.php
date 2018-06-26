<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php

# set cookiebar fields
$message = 'message: "' . pll__( 'mensagem de cookies' ) . '",';
$text    = 'dismiss: "' . pll__( 'botão de cookies' ) . '",';
$page    = get_field( 'cookiebar_page', 'options', false );

if ( $page ) {
  # set $page language
  $page      = pll_get_post( $page );
  $page_name = 'link: "' . get_the_title( $page ) . '",';
  $page_url  = 'href: "' . esc_url( get_the_permalink( $page ) ) . '",';
}

# cookiebar script
?>
<script type="text/javascript">
	
function cookiebar() {
  window.addEventListener( 'load', function() {
  window.cookieconsent.initialise({
    type: 'info',

    elements: {
      header: '<span class="cc-header">{{header}}</span>&nbsp;',
      message: '<span id="cookieconsent:desc" class="cc-message">{{message}}</span>',
      messagelink: '<span id="cookieconsent:desc" class="cc-message">{{message}} <a aria-label="learn more about cookies" tabindex="0" class="cc-link" href="{{href}}" target="_blank"><span class="btn btn-null waves-effect">{{link}}</span></a></span>',
      dismiss: '<a aria-label="dismiss cookie message" tabindex="0" class="btn waves-effect cc-btn cc-dismiss">{{dismiss}}</a>',
      allow: '<a aria-label="allow cookies" tabindex="0" class="cc-btn cc-allow">{{allow}}</a>',
      deny: '<a aria-label="deny cookies" tabindex="0" class="cc-btn cc-deny">{{deny}}</a>',
      link: '<a aria-label="learn more about cookies" tabindex="0" class="cc-link" href="{{href}}" target="_blank">{{link}}</a>',
      close: '<span aria-label="dismiss cookie message" tabindex="0" class="cc-close">{{close}}</span>',
    },

    content: {
      <?php
        echo $message;
        echo $text;
        echo $page_name;
        echo $page_url;
      ?>
    },

  })});

} cookiebar();

</script>