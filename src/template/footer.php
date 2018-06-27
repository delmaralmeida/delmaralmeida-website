<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# set footer fields
$site_name = get_bloginfo( 'name' ); ?>

<footer>
	<div class="container">
		<p><?php echo $site_name; ?></p>
		<p>web developer</p>
		<p>&copy; <?php echo date( 'Y' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>