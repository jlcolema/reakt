
<!doctype html>

<html <?php language_attributes(); ?> class="mod-no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--[if IE]>

		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<![endif]-->

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/favicon.png" />

	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/touch-icon.png" />

	<?php wp_head(); ?>

</head>

<body <?php body_class('loading'); ?>>

	<header id="header" role="banner">

		<div class="wrap">

			<div id="logo">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					<span class="reakt">

						<span><?php bloginfo( 'name' ); ?></span>

					</span>

				</a>

			</div>

			<nav id="nav" role="navigation">

				<div class="toggle">

					<div class="hamburger">

						<span></span>
						<span></span>
						<span></span>
						<span></span>

					</div>

					<div class="label">Menu</div>

				</div>

				<div class="overlay">

					<div class="inner-overlay">

						<?php

							wp_nav_menu( array(

								'theme_location'	=> 'primary',
								'menu_class'		=> 'primary-menu'

							));

						?>

					</div>

				</div>

			</nav>

		</div>

	</header>

	<?php if ( is_front_page() ) { ?>

		<div id="slideshow">

			<div class="wrap">

				<div class="flexslider">

					<ul class="slides">

						<li class="slide slide-01">

							<div class="overlay">

								<div class="inner-overlay">

									<div class="slide-content">

										<div class="slide-inner-content">

											<h1><span class="word">Ideas</span> <span class="word">that</span> <span class="word">Inspire</span> <span class="word">Action</span></h1>

										</div>

									</div>

								</div>

							</div>

						</li>

						<li class="slide slide-02">

							<div class="overlay">

								<div class="inner-overlay">

									<div class="slide-content">

										<div class="slide-inner-content">

											<h1><span class="word">We</span> <span class="word">help</span> <span class="word">the</span> <span class="word">daring</span> <span class="word">realize</span> <span class="word">their</span> <span class="word">true</span> <span class="word">potential.</span></h1>

										</div>

									</div>

								</div>

							</div>

						</li>

						<li class="slide slide-03">

							<div class="overlay">

								<div class="inner-overlay">

									<div class="slide-content">

										<div class="slide-inner-content">

											<h1><span class="word">Creativity</span> <span class="word">Takes</span> <span class="word"><span class="strikethrough">Cou</span>rage</span></h1>

										</div>

									</div>

								</div>

							</div>

						</li>

					</ul>

					<div class="slide-count">

						<div class="slide-count-inner-wrap">

							<div class="slide-count-inner-inner-wrap">

								<span class="current-slide"></span>

								<span class="total-slides"></span>

							</div>

						</div>

					</div>

				</div>

				<div class="more">

					<a href="#content">Learn More</a>

				</div>

			</div>

		</div>

	<?php } ?>

	<?php if ( is_singular( 'project' ) ) : ?>

		<?php if ( get_field( 'project_image' ) ) : ?>

			<div class="hero">

				<div class="wrap">

					<div class="image" style="background-image: url(<?php the_field( 'project_image' ); ?>);">

						<?php /*

							<picture>

								<source srcset="<?php the_field( 'project_image' ); ?>" media="(min-width: 1000px)">

								<source srcset="<?php the_field( 'project_image' ); ?>" media="(min-width: 800px)">

								<source srcset="<?php the_field( 'project_image' ); ?>">

								<img srcset="<?php the_field( 'project_image' ); ?>" alt="<?php the_field( 'project_image_description' ); ?>" />

							</picture>

						*/ ?>

						<?php if ( get_field( 'project_logo' ) OR get_field( 'project_headline' ) ) : ?>

							<div class="overlay">

								<div class="inner-overlay">

									<?php if ( get_field( 'project_logo' ) ) : ?>

										<h1>

											<img src="<?php the_field( 'project_logo' ); ?>" alt="" />

										</h1>

									<?php endif; ?>

									<?php if ( get_field( 'project_headline' ) ) : ?>

										<h2><?php the_field( 'project_headline' ); ?></h2>

									<?php endif; ?>

								</div>

							</div>

						<?php endif; ?>

					</div>

					<div class="more-details">

						<a href="#main-content">More Details</a>

					</div>

				</div>

			</div>

		<?php endif; ?>

	<?php endif; ?>

	<div id="content" role="main">

		<?php if ( is_page( 'profile' ) ) { ?>

			<div class="new-hero" style="background-image: url(<?php the_field( 'profile_hero_image' ); ?>);">

				<div class="wrap">

					<div class="image">

						<div class="overlay">

							<div class="inner-overlay">

								<h1><?php the_field( 'profile_hero_headline' ); ?></h1>

							</div>

						</div>

					</div>

					<div class="more-details">

						<a href="#main-content">More Details</a>

					</div>

				</div>

			</div>

		<?php } ?>

		<div id="main-content" class="main">

			<div class="wrap">