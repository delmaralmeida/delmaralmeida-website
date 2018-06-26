<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

<?php
# cookiebar script
get_template_part( 'components/header/cookiebar' ); ?>

<?php
# header navbar
get_template_part( 'components/header/navbar' ); ?>

<section id="header" class="header">
	<?php get_template_part( 'components/section/hero' ); ?>
</section>

<section id="services" class="services">
	<?php get_template_part( 'components/section/services' ); ?>
</section>

<div class="separator">
	<div class="container">
		<div></div>
	</div>
</div>

<section id="portfolio" class="portfolio">
	<?php get_template_part( 'components/section/portfolio' ); ?>
</section>

<div class="separator">
	<div class="container">
		<div></div>
	</div>
</div>

<section id="skills" class="skills">
	<?php get_template_part( 'components/section/skills' ); ?>
</section>

<div class="separator">
	<div class="container">
		<div></div>
	</div>
</div>

<section id="about" class="about">
	<?php get_template_part( 'components/section/about' ); ?>
</section>

<div class="separator">
	<div class="container">
		<div></div>
	</div>
</div>

<section id="testimonials" class="testimonials">
	<?php get_template_part( 'components/section/testimonials' ); ?>
</section>

<div class="separator">
	<div class="container">
		<div></div>
	</div>
</div>

<section id="contact" class="contact">
	<?php get_template_part( 'components/section/contact' ); ?>
</section>

<?php get_footer(); ?>