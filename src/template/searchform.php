<?php if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly ?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
  <div>
    <label>
      <span class="screen-reader-text" for="s"><?php echo _x( 'Search for:', 'label' ) ?></span>

      <input type="text" class="search-field"
        placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
        value="<?php echo get_search_query() ?>" name="s"
        title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

      <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />

    </label>
  </div>
</form>