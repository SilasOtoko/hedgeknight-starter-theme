<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->

	<?php if( function_exists( 'get_field' ) ): ?>

		<?php if( get_field( 'google_analytics', 'options' ) ): ?>

			<?php the_field( 'google_analytics', 'options' ); ?>

		<?php endif; ?>

	<?php endif; ?>
</head>
<body <?php body_class(); ?> id="page-top">

	<?php

		function dashItAll($string) {
			//Lower case everything
			$string = strtolower($string);
			//Make alphanumeric (removes all other characters)
			$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
			//Clean up multiple dashes or whitespaces
			$string = preg_replace("/[\s-]+/", " ", $string);
			//Convert whitespaces and underscore to dash
			$string = preg_replace("/[\s_]/", "-", $string);
			return $string;
		}

	?>

  <header>

		<div class="header-main clearfix">
			<div class="padding-wrapper clearfix">
				<div class="header-logo">
					<a href="<?php bloginfo( 'url' ); ?>">
		      	<img style="max-width: 400px" src="<?php bloginfo( 'template_directory' ); ?>/img/main-logo.svg" />
					</a>
		    </div>

				<nav role="navigation" class="main-navigation">

		      <?php
					 	$defaults = array(
						 	'container' => false,
						 	'div' => false,
						 	'theme_location' => 'main-menu'
					 	);
					 wp_nav_menu( $defaults );
				 	?>

				</nav>

				<div class="mobile-menu clearfix">

					<div onclick="openNav()" class="toggle-sidebar">
						<div class="hamburger-label">Menu</div>
						<div class="hamburger">
			        <span></span>
			        <span></span>
			        <span></span>
			      </div>
					</div>

					<div id="mySidenav" class="sidenav">
						<div class="sidenav-wrapper">

							<div id="sidebar">
								<div class="mobile-nav-header clearfix">
									<div class="close-sidenav clearfix">
										<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">

											<img src="<?php bloginfo( 'template_directory' ); ?>/img/close.svg" />

										</a>

									</div>
								</div>

								<div class="mobile-navigation">

									<nav class="mobile-menu">

										<?php
										 	$defaults = array(
											 	'container' => false,
											 	'div' => false,
											 	'theme_location' => 'hamburger-menu'
										 	);
										 wp_nav_menu( $defaults );
									 	?>

									</nav>

								</div>
							</div>
						</div>
					</div>

					<script>
						/* Set the width of the side navigation to 250px */
						function openNav() {
							jQuery('.sidenav').toggleClass('sidenav-open');
							jQuery('html, body').toggleClass('nav-open');
						}

						/* Set the width of the side navigation to 0 */
						function closeNav() {
							jQuery('.sidenav').toggleClass('sidenav-open');
							jQuery('html, body').toggleClass('nav-open');
						}
					</script>

				</div>

			</div>
		</div>

  </header>
