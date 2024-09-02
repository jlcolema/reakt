
<?php get_header(); ?>

	<article class="h-entry">

		<?php if ( get_field( 'article_image' ) ) { ?>

			<div class="featured-image">

				<img src="<?php the_field( 'article_image' ); ?>" alt="<?php the_title(); ?>" />

			</div>

		<?php } ?>

		<h1><?php the_title(); ?></h1>

		<time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time>

		<div class="body">

			<?php the_field( 'article_body' ); ?>

		</div>

	</article>

<?php get_footer(); ?>
