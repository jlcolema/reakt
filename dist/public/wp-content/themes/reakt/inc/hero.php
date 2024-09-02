
<?php if ( get_field( 'hero_image' ) ) { ?>

	<div class="hero">

		<div class="wrap">

			<div class="image">

				<picture>

					<!--[ if IE 9 ]>

						<video style="display: none;">

					<![ endif ]-->

						<source srcset="<?php the_field( 'hero_image' ); ?>" media="(min-width: 1000px)">

						<source srcset="<?php the_field( 'hero_image' ); ?>" media="(min-width: 800px)">

						<source srcset="<?php the_field( 'hero_image' ); ?>">

					<!--[ if IE 9 ]>

						</video>

					<![ endif ]-->

					<img srcset="<?php the_field( 'hero_image' ); ?>" alt="<?php the_field( 'hero_description' ); ?>" />

				</picture>

			</div>

		</div>

	</div>

<?php } ?>
