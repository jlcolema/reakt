
<?php get_header(); ?>

	<h1 class="page-title"><?php the_field( 'contact_headline' ); ?></h1>

	<div class="content-area">

		<?php the_field( 'contact_content' ); ?>

	</div>

	<div class="form">

		<?php echo do_shortcode( '[contact-form-7 title="Contact"]' ); ?>

	</div>

	<?php

		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {

			wpcf7_enqueue_scripts();

		}

	?>

<?php get_footer(); ?>
