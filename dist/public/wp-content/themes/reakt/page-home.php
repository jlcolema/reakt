
<?php get_header(); ?>

	<div class="mission-statement">

		<h1><?php the_field( 'home_mission_statement' ); ?></h1>

	</div>

	<?php get_template_part( 'inc/work' ); ?>

<?php get_footer(); ?>
