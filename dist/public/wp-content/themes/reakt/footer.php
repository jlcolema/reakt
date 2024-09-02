
			</div>

		</div>

	</div>

	<?php if ( is_front_page() ) { ?>

		<?php

			/* The Latest News */

		?>

		<?php

			$the_latest_news_options = array(

				'post_type'		=> 'post',
				'post_status'	=> 'publish',
				'numberposts'	=> '3',
				// 'order'			=> 'DESC',
				'orderby'		=> 'date'

			);

			$posts = get_posts( $the_latest_news_options );

		?>

		<div id="recent-news">

			<div class="wrap">

				<h2>The Latest News</h2>

				<div class="articles">

					<?php foreach( $posts as $post ) : ?>

						<?php

							/* Thumbnail */

							// Attachment

							$article_thumbnail_id = get_field( 'article_thumbnail', $project->ID );

							// Sizes Available

							$article_thumbnail_size_full = 'full';

							// $article_thumbnail_size_large = 'article_thumbnail_size_large';

							// $article_thumbnail_size_medium = 'article_thumbnail_size_medium';

							// $article_thumbnail_size_small = 'article_thumbnail_size_small';

							// Image

							$article_thumbnail_full = wp_get_attachment_image_src( $article_thumbnail_id, $article_thumbnail_size_full );

							// $article_thumbnail_large = wp_get_attachment_image_src( $article_thumbnail_id, $article_thumbnail_size_large );

							// $article_thumbnail_medium = wp_get_attachment_image_src( $article_thumbnail_id, $article_thumbnail_size_medium );

							// $article_thumbnail_small = wp_get_attachment_image_src( $article_thumbnail_id, $article_thumbnail_size_small );

						?>

						<article class="summary">

							<div class="thumbnail">

								<a href="<?php the_permalink(); ?>">

									<?php if ( $article_thumbnail_full ) { ?>

										<img src="<?php echo $article_thumbnail_full[0]; ?>" alt="<?php the_title(); ?>" />

									<?php } else { ?>

										<img src="http://placehold.it/400x400" alt="<?php the_title(); ?>" />

									<?php } ?>

								</a>

							</div>

							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<time datetime="<?php echo date( DATE_W3C ); ?>"><?php the_time( 'F j, Y' ); ?></time>

						</article>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	<?php } ?>

	<footer id="footer" role="contentinfo">

		<div class="wrap">

			<div class="h-card">

				<div class="p-name">

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

						<?php bloginfo( 'name' ); ?>

					</a>

				</div>

				<div class="p-adr">

					<span class="p-street-address"><?php the_field( 'contact_information_street_address', 'option' ); ?></span>,

					<span class="p-locality"><?php the_field( 'contact_information_locality', 'option' ); ?></span>,

					<span class="p-region"><?php the_field( 'contact_information_region', 'option' ); ?></span>

					<span class="p-postal-code"><?php the_field( 'contact_information_postal_code', 'option' ); ?></span>

				</div>

				<div class="p-tel">

					<span class="p-label">T</span> <?php the_field( 'contact_information_telephone', 'option' ); ?>

				</div>

				<div class="u-email">

					<a href="mailto:<?php the_field( 'contact_information_connect', 'option' ); ?>"><?php the_field( 'contact_information_connect', 'option' ); ?></a>

				</div>

				<div class="u-email">

					<a href="mailto:<?php the_field( 'contact_information_jobs', 'option' ); ?>"><?php the_field( 'contact_information_jobs', 'option' ); ?></a>

				</div>

			</div>

			<div class="connect">

				<ul>

					<li class="facebook">

						<a href="<?php the_field( 'social_media_facebook', 'option' ); ?>" rel="external">Facebook</a>

					</li>

					<li class="vimeo">

						<a href="<?php the_field( 'social_media_vimeo', 'option' ); ?>" rel="external">Vimeo</a>

					</li>

					<li class="behance">

						<a href="<?php the_field( 'social_media_behance', 'option' ); ?>" rel="external">Behance</a>

					</li>

					<li class="linkedin">

						<a href="<?php the_field( 'social_media_linkedin', 'option' ); ?>" rel="external">LinkedIn</a>

					</li>

					<li class="instagram">

						<a href="<?php the_field( 'social_media_instagram', 'option' ); ?>" rel="external">Instagram</a>

					</li>

				</ul>

			</div>

			<p id="copyright">

				<small>&copy; <?php echo date( 'Y' ); ?> Pylit Corp <span><?php bloginfo( 'name' ); ?></span></small>

			</p>

		</div>

	</footer>

	<?php wp_footer(); ?>

</body>

</html>