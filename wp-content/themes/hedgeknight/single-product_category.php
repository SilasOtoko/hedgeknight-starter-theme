<?php get_header(); ?>

  <?php get_template_part( 'template-parts/content', 'page-banner' ); ?>

  <main id="content" class="site__content" role="main">
    <div class="padding-wrapper">

      <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="small-wrapper">

              <header class="entry-header">

                <?php if( !is_front_page() ): ?>

                  <h1 class="slideInLeft"><?php the_title(); ?></h1>

                <?php endif; ?>

              </header>

              <div class="entry-content">

                <?php the_content(); ?>
                
              </div>

            </div>

            <div class="small-wrapper">

              <?php if( have_rows( 'products' ) ): ?>

                <h2><?php the_field( 'section_heading' ); ?></h2>

                <div class="product-list">

                  <?php while( have_rows( 'products' ) ): the_row(); ?>


                    <?php

                      $image = get_sub_field( 'image' );
                      $size = 'logo';
                      $src = $image['url'];
                      $alt = $image['alt'];
                      $thumb = $image['sizes'][ $size ];

                    if( $image ): ?>

                      <div class="product-list__item">
                        <a class="lightbox-link" href="<?php echo $src; ?>">

                          <img class="lightbox-target" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>">

                          <h3><?php the_sub_field( 'product_name' ); ?></h3>

                        </a>

                      </div>

                    <?php endif; ?>

                  <?php endwhile; ?>

                  <script>
                    initLightbox();

                    document.querySelectorAll('.lightbox-target').forEach(function(item) {
                      var image = new Image();
                      image.src = item.src;
                      image.onload = function() {
                        if(image.naturalHeight >= image.naturalWidth) {
                          item.classList.add('portrait');
                        }
                      }
                    });

                    checkOrientation();
                    populateLightbox();

                    function checkOrientation() {
                      var images = document.querySelectorAll('.lightbox-target');
                      for (var i = 0; i < images.length; i++) {
                        var item = images[i];
                        if(item.naturalHeight >= item.naturalWidth) {
                          item.classList.add('portrait');
                        }
                      }
                    }

                    function initLightbox() {
                      var $overlay = jQuery('<div id="overlay"></div>');
                      var $container = jQuery('<div class="lightbox"><a href="javascript:void(0)" class="close">&times;</a></div>');
                      var $image;
                      var $imageClone;

                      jQuery('body').append($overlay);

                      $overlay.click(function(){
                        $overlay.hide();
                      });

                      $overlay.append($container);
                    }

                    function populateLightbox() {
                      jQuery('.lightbox-link').on('click', function(event) {
                        event.preventDefault();
                        jQuery('.lightbox-image').remove();

                        $image = jQuery(this).find('.lightbox-target');

                        $imageClone = $image.clone();

                        if($imageClone.hasClass('portrait')) {
                          $imageClone.addClass('resize-lightbox');
                        }

                        jQuery('#overlay').show();
                        //add image to overlay
                        $imageClone.addClass('lightbox-image').appendTo('#overlay .lightbox');
                      });
                    }
                  </script>

                </div>

              <?php endif; ?>

            </div>

          </article>

        <?php endwhile; ?>

      <?php endif; ?>

    </div>
  </main>

<?php get_footer(); ?>
