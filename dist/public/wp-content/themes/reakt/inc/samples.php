<?php if ( get_row_layout() == 'project_samples_image' ) : ?>

	<!-- Image -->

	<div class="matrix-block matrix-image">

		<figure>

			<?php if ( get_sub_field( 'project_sample_image_description_location' ) ) : ?>

				<figcaption class="above"><?php the_sub_field( 'project_sample_image_description' ); ?></figcaption>

			<?php endif; ?>

			<img src="<?php the_sub_field( 'project_sample_image_image' ); ?>" alt="<?php the_sub_field( 'project_sample_image_description' ); ?>" />

			<?php if ( ! get_sub_field( 'project_sample_image_description_location' ) ) : ?>

				<figcaption><?php the_sub_field( 'project_sample_image_description' ); ?></figcaption>

			<?php endif; ?>

		</figure>

	</div>

<?php elseif ( get_row_layout() == 'project_sample_video' ) : ?>

	<!-- Video -->

	<div class="matrix-block matrix-video">

		<figure>

			<?php if ( get_sub_field( 'project_sample_video_description_location' ) ) : ?>

				<figcaption class="above"><?php the_sub_field( 'project_sample_video_description' ); ?></figcaption>

			<?php endif; ?>

			<div class="video">

				<iframe id="video-999" src="<?php the_sub_field( 'project_sample_video_url' ); ?>/?api=1&amp;player_id=video-999&amp;title=0&amp;byline=0&amp;portrait=0&amp;loop=1" width="1296" height="728" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

			</div>

			<?php if ( ! get_sub_field( 'project_sample_video_description_location' ) ) : ?>

				<figcaption><?php the_sub_field( 'project_sample_video_description' ); ?></figcaption>

			<?php endif; ?>

		</figure>

	</div>

<?php elseif ( get_row_layout() == 'project_sample_video_auto_play' ) : ?>

	<!-- Video (Auto Play) -->

	<div class="matrix-block matrix-video-auto-play">

		<figure>

			<?php if ( get_sub_field( 'project_sample_video_auto_play_description_location' ) ) : ?>

				<figcaption class="above"><?php the_sub_field( 'project_sample_video_auto_play_description' ); ?></figcaption>

			<?php endif; ?>

			<div class="video video-container smart-video not-autoplay">

				<video width="1296" height="728" loop poster="http://placehold.it/1296x728">

					<source src="<?php bloginfo( 'template_directory' ); ?>/a/img/placeholders/fuel.mp4" type="video/mp4">

					<source src="<?php bloginfo( 'template_directory' ); ?>/a/img/placeholders/fuel.webm" type="video/webm">

					<source src="<?php bloginfo( 'template_directory' ); ?>/a/img/placeholders/fuel.ogv" type="video/ogg">

					<img src="http://placehold.it/1296x728" alt="<?php the_sub_field( 'project_sample_video_auto_play_description' ); ?>" />

				</video>

				<div class="controls">

					<button class="mute-button muted">

						<span class="sr-only">Mute</span>

					</button>

					<button class="play-button">

						<span class="sr-only">Play / Pause Video</span>

					</button>

				</div>

			</div>

			<?php if ( ! get_sub_field( 'project_sample_video_auto_play_description_location' ) ) : ?>

				<figcaption><?php the_sub_field( 'project_sample_video_auto_play_description' ); ?></figcaption>

			<?php endif; ?>

		</figure>

	</div>

<?php elseif ( get_row_layout() == 'project_sample_carousel' ) : ?>

	<!-- Carousel -->

	<?php if( have_rows('project_sample_carousel_slides') ) : ?>

		<div class="matrix-block matrix-carousel">

			<?php if ( get_sub_field( 'project_sample_carousel_description_location' ) ) : ?>

				<div class="description above"><?php the_sub_field( 'project_sample_carousel_description' ); ?></div>

			<?php endif; ?>

			<div class="flexslider">

				<ul class="slides">

					<?php while ( have_rows( 'project_sample_carousel_slides' ) ) : the_row(); ?>

						<li>

							<img src="<?php the_sub_field( 'project_sample_carousel_slide_image' ); ?>" alt="<?php the_sub_field( 'project_sample_carousel_slide_description' ); ?>" />

						</li>

					<?php endwhile; ?>

				</ul>

			</div>

			<?php if ( ! get_sub_field( 'project_sample_carousel_description_location' ) ) : ?>

				<div class="description"><?php the_sub_field( 'project_sample_carousel_description' ); ?></div>

			<?php endif; ?>

		</div>

	<?php endif; ?>

<?php endif; ?>