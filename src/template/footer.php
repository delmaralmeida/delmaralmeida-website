<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
# set footer fields
$user_name = get_field( 'user_name', 'options' );
$work_area = get_field( 'work_area', 'options' );

?>

<footer>
	<div class="container">
		<p><?php echo $user_name; ?></p>
		<p><?php echo $work_area; ?></p>
		<p>&copy; <?php echo date( 'Y' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>