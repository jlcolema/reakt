
<div class="work">

	<article id="article" class="clearfix group wrapper">

		<div id="portfolio-holder" class="clearfix group">

			<ul id="portfolio" class="folio-grid cols-three style-three light show-category layout-masonry-advanced group clearfix">

				<?php if ( is_front_page() ) { ?>

					<?php

						$featured_work = get_field( 'home_featured_work' );

					?>

				<?php } elseif ( is_page( 'work' ) ) { ?>

					<?php

						$featured_work = get_field( 'work_featured_work' );

					?>

				<?php } else { ?>

					<?php

						$featured_work = get_field( 'private_featured_work' );

					?>

				<?php } ?>

				<?php if ( $featured_work ) : ?>

					<?php foreach ( $featured_work as $post ) : ?>

						<?php

							$project_thumbnail_id = get_field( 'project_thumbnail', $post->ID );

							// Sizes Available

							$project_thumbnail_size = 'full';

							// Image

							$project_thumbnail = wp_get_attachment_image_src( $project_thumbnail_id, $project_thumbnail_size );

							$project_thumbnail_width = $project_thumbnail[1]

						?>

						<li class="item<?php if ( $project_thumbnail_width > 432 ) { ?> large<?php } ?>" data-factor="<?php if ( $project_thumbnail_width > 432 ) { ?>2<?php } else { ?>1<?php } ?>">

							<a href="<?php the_permalink(); ?>">

								<picture>

									<!--[ if IE 9 ]>

										<video style="display: none;">

									<![ endif ]-->

										<source srcset="<?php echo $project_thumbnail[0]; ?>" media="(min-width: 1000px)">

										<source srcset="<?php echo $project_thumbnail[0]; ?>" media="(min-width: 800px)">

										<source srcset="<?php echo $project_thumbnail[0]; ?>">

									<!--[ if IE 9 ]>

										</video>

									<![ endif ]-->

									<img srcset="<?php echo $project_thumbnail[0]; ?>" alt="<?php the_title(); ?>" />

								</picture>

								<div class="overlay">

									<div class="inner-overlay">

										<div class="inner-inner-overlay">

											<div class="project-meta">

												<div class="project-title"><?php the_title(); ?></div>

												<?php

													$project_short_description = get_field( 'project_short_description' );

												?>

												<?php if ( have_rows( 'project_services' ) ) : ?>

													<ul class="services">

														<?php while ( have_rows( 'project_services' ) ) : the_row();

															$project_service_title = get_sub_field( 'project_service_title' );

															$project_service_display_with_thumbnail = get_sub_field( 'project_service_display_with_thumbnail' );

														?>

															<?php if ( $project_service_display_with_thumbnail ) : ?>

																<li><?php echo $project_service_title; ?></li>

															<?php endif; ?>

														<?php endwhile; ?>

													</ul>

												<?php endif; ?>

											</div>

										</div>

									</div>

								</div>

							</a>

						</li>

					<?php endforeach; ?>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

			</ul>

		</div>

	</article>

</div>