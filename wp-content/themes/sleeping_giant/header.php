<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo('description'); ?>">
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->

   <?php wp_head(); ?>

	<?php if( function_exists( 'get_field' ) ): ?>

		<?php if( get_field( 'google_analytics', 'options' ) ): ?>

			<?php the_field( 'google_analytics', 'options' ); ?>

		<?php endif; ?>

	<?php endif; ?>
</head>

<body <?php body_class(); ?> id="page-top">
	<a class="skip-main screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sleeping_giant' ); ?></a>

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

		<div class="header-main">
			<div class="padding-wrapper flex-wrapper">
				<div class="header-logo">
					
					<?php if( function_exists( 'get_field' ) ): ?>

						<?php

		          $image = get_field( 'header_logo', 'options' );
		          $size = 'logo';
		          $src = $image['url'];
		          $alt = $image['alt'];
		          $title = $image['title'];
		          $thumb = $image['sizes'][ $size ];
		          $caption = $image['caption'];

		        if( $image ): ?>

		          <a href="<?php echo esc_url( home_url() ); ?>">

		            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>">

		          </a>

		        <?php endif; ?>

		      <?php endif; ?>

		    </div>

				<nav role="navigation" class="desktop-menu">

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

					<button tabindex="0" onclick="openNav()" class="toggle-sidebar">
						<div class="hamburger-label">Menu</div>
						<div class="hamburger" style="max-width: 40px;">

							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
								<g>
									<g>
										<path class="st0" d="M491.3,235.3H20.7C9.3,235.3,0,244.6,0,256s9.3,20.7,20.7,20.7h470.6c11.4,0,20.7-9.3,20.7-20.7
											C512,244.6,502.7,235.3,491.3,235.3z"/>
									</g>
								</g>
								<g>
									<g>
										<path class="st0" d="M491.3,78.4H20.7C9.3,78.4,0,87.7,0,99.1s9.3,20.7,20.7,20.7h470.6c11.4,0,20.7-9.3,20.7-20.7
											S502.7,78.4,491.3,78.4z"/>
									</g>
								</g>
								<g>
									<g>
										<path class="st0" d="M491.3,392.2H20.7C9.3,392.2,0,401.5,0,412.9s9.3,20.7,20.7,20.7h470.6c11.4,0,20.7-9.3,20.7-20.7
											S502.7,392.2,491.3,392.2z"/>
									</g>
								</g>
							</svg>

						</div>
					</button>

					<div id="mySidenav" class="sidenav">
						<div class="sidenav-wrapper">

							<div id="sidebar">
								<div class="mobile-nav-header clearfix">
									<div class="close-sidenav clearfix">
										<button tabindex="0" class="closebtn" onclick="closeNav()">

											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/close.svg" />

										</button>

									</div>
								</div>

								<div class="mobile-navigation">

									<nav class="mobile-menu" role="navigation">

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
						}

						/* Set the width of the side navigation to 0 */
						function closeNav() {
							jQuery('.sidenav').toggleClass('sidenav-open');
						}
					</script>

				</div>

			</div>
		</div>

  </header>

  <div id="content" class="site-content">
