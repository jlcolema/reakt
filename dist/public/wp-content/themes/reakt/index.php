
<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<div class="news">

			<h1>The Latest News</h1>

			<div class="articles">

				<?php while ( have_posts() ) : the_post(); ?>

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

						<h1>

							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

						</h1>

						<time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time>

					</article>

				<?php endwhile; ?>

			</div>

		</div>

		<?php

			the_posts_pagination( array(

				'prev_text'			=> __( 'Previous', 'reakt' ),
				'next_text'			=> __( 'Next', 'reakt' )

			) );

		?>

		<?php /*

		<!-- News Nav -->

		<div class="news-nav">

			<ul>

				<li class="prev">

					<a href="#">

						<span class="arrow">&larr;</span> Previous

					</a>

				</li>

				<li class="prev">

					<a href="#">

						Next <span class="arrow">&rarr;</span>

					</a>

				</li>

			</ul>

		</div>

		*/ ?>

	<?php else : ?>

		<p>Hello. No content here.</p>

	<?php endif; ?>

<?php get_footer(); ?>
