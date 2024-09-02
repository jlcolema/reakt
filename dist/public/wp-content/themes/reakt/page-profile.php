
<?php get_header(); ?>

	<h1 style="display: none;"><?php the_title(); ?></h1>

	<?php $posts = get_field( 'profile_services' ); ?>

		<?php if ( $posts ) : ?>

			<div class="services">

				<?php foreach( $posts as $post ): ?>

					<?php setup_postdata( $post ); ?>

					<?php

						$service_image = get_field( 'service_image', $post->ID );

						// Sizes Available

						$service_image_size = 'full';

						// Image

						$service_image = wp_get_attachment_image_src( $service_image, $service_image_size );

					?>

					<div class="type">

						<div class="listing">

							<h2><?php the_title(); ?></h2>

							<?php if ( have_rows( 'service_listing' ) ): ?>

								<ul>

									<?php while ( have_rows( 'service_listing' ) ) : the_row(); ?>

										<?php

											$title = get_sub_field( 'service_title' );

										?>

										<li><?php echo $title; ?></li>

									<?php endwhile; ?>

								</ul>

							<?php endif; ?>

						</div>

						<div class="photo" style="background-image: url(<?php echo $service_image[0]; ?>);">

							<img src="<?php echo $service_image[0]; ?>" alt="<?php the_title(); ?>" />

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

	<?php endif; ?>

<?php get_footer(); ?>
