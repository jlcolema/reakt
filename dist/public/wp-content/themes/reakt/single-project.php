
<?php get_header(); ?>

	<?php if ( ! post_password_required() ) : ?>

		<div class="project">

			<?php if ( ! get_field( 'project_image' ) ) : ?>

				<?php if ( have_rows( 'project_samples' ) ) : ?>

					<div class="sample">

						<?php $counter = 0; ?>

						<?php while ( have_rows( 'project_samples' ) ) : the_row(); ?>

							<?php

								$counter++;

							?>

							<?php if ( $counter == 1 ) : ?>

								<?php get_template_part( 'inc/samples' ); ?>

							<?php endif; ?>

						<?php endwhile; ?>

					</div>

				<?php else : ?>

					    <!-- no layouts found -->

				<?php endif; ?>

			<?php endif; ?>

			<div class="project-summary">

				<div class="project-summary-brief">

					<h1><?php the_title(); ?></h1>

					<?php if ( have_rows( 'project_services' ) ) : ?>

						<ul class="responsibilities">

							<?php while( have_rows( 'project_services' ) ) : the_row();

								$project_service_title = get_sub_field( 'project_service_title' );

							?>

								<li><?php echo $project_service_title; ?></li>

							<?php endwhile; ?>

						</ul>

					<?php endif; ?>

				</div>

				<div class="project-summary-detail">

					<?php if ( get_field( 'project_overview' ) ) : ?>

						<div class="overview">

							<?php the_field( 'project_overview' ); ?>

						</div>

					<?php endif; ?>

					<?php if ( get_field( 'project_call_to_action_url' ) ) : ?>

						<div class="cta live-demo">

							<a href="<?php the_field( 'project_call_to_action_url' ); ?>" rel="external"><?php the_field( 'project_call_to_action' ); ?></a>

						</div>

					<?php endif; ?>

				</div>

			</div>

			<div class="samples">

				<?php if ( get_field( 'project_image' ) ) : ?>

					<!-- Show full list of samples -->

					<?php if ( have_rows( 'project_samples' ) ) : ?>

						<?php while ( have_rows( 'project_samples' ) ) : the_row(); ?>

							<?php get_template_part( 'inc/samples' ); ?>

						<?php endwhile; ?>

					<?php else : ?>

						<!-- no layouts found -->

					<?php endif; ?>

				<?php else : ?>

					<!-- Show list of samples, offset by one -->

					<?php if ( have_rows( 'project_samples' ) ) : ?>

						<?php $counter = 0; ?>

						<?php while ( have_rows( 'project_samples' ) ) : the_row(); ?>

							<?php

								$counter++;

							?>

							<?php if ( $counter >= 2 ) : ?>

								<?php get_template_part( 'inc/samples' ); ?>

							<?php endif; ?>

						<?php endwhile; ?>

					<?php else : ?>

						<!-- no layouts found -->

					<?php endif; ?>

				<?php endif; ?>

			</div>

		</div>

		<?php

			$previous_project = get_next_post( true, 4, 'project-category' );

			$next_project = get_previous_post( true, 4, 'project-category' );

			$previous_private_project = get_next_post( true, 2, 'project-category' );

			$next_private_project = get_previous_post( true, 2, 'project-category' );

		?>

		<div class="project-nav">

			<ul>

				<?php if ( has_term( 'private', 'project-category', $post->ID ) ) : ?>

					<?php if ( $previous_private_project ) : ?>

						<li class="prev">

							<a href="<?php echo get_the_permalink( $previous_private_project->ID ); ?>">

								<span class="arrow">&larr;</span> Previous

							</a>

						</li>

					<?php endif; ?>

					<?php if ( $next_private_project ) : ?>

						<li class="next">

							<a href="<?php echo get_the_permalink( $next_private_project->ID ); ?>">

								Next <span class="arrow">&rarr;</span>

							</a>

						</li>

					<?php endif; ?>

				<?php else : ?>

					<?php if ( $previous_project ) : ?>

						<li class="prev">

							<a href="<?php echo get_the_permalink( $previous_project->ID ); ?>">

								<span class="arrow">&larr;</span> Previous

							</a>

						</li>

					<?php endif; ?>

					<?php if ( $next_project ) : ?>

						<li class="next">

							<a href="<?php echo get_the_permalink( $next_project->ID ); ?>">

								Next <span class="arrow">&rarr;</span>

							</a>

						</li>

					<?php endif; ?>

				<?php endif; ?>

			</ul>

			<div class="back-to">

				<?php if ( has_term( 'private', 'project-category', $post->ID ) ) : ?>

					<a href="<?php echo esc_url( home_url( '/private/' ) ); ?>">Back to All Projects</a>

				<?php else : ?>

					<a href="<?php echo esc_url( home_url( '/work/' ) ); ?>">Back to All Projects</a>

				<?php endif; ?>

			</div>

		</div>

	<?php else : ?>

		<div class="login-form">

			<h1 class="page-title">Login</h1>

			<div class="content-area">

				<p>Enter password to access content.</p>

			</div>

			<?php echo get_the_password_form(); ?>

		</div>

	<?php endif; ?>

<?php get_footer(); ?>
