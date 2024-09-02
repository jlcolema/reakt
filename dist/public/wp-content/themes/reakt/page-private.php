
<?php get_header(); ?>

	<?php if ( ! post_password_required() ) : ?>

		<?php get_template_part( 'inc/work' ); ?>

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
