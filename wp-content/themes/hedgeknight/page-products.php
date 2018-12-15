<?php get_header(); ?>

  <?php get_template_part( 'template-parts/content', 'page-banner' ); ?>

  <main id="content" class="site__content" role="main">
    <div class="padding-wrapper">

      <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="medium-wrapper">

              <header class="entry-header">

                <?php if( !is_front_page() ): ?>

                  <h1 class="slideInLeft"><?php the_title(); ?></h1>

                <?php endif; ?>

              </header>

              <div class="entry-content">

                <?php the_content(); ?>
                
              </div>

            </div>

          </article>

        <?php endwhile; ?>

      <?php endif; ?>

      <?php
        $args = array(
          'post_type' => 'product_category',
          'orderby' => 'date',
          'order' => 'ASC'
        );
        $query = new WP_Query( $args );
      ?>

      <?php if( $query->have_posts() ) : ?>

        <div class="medium-wrapper">

          <div class="card-links">

            <?php while( $query->have_posts() ) : $query->the_post(); ?>

              <div class="card-link">
                <a href="<?php the_permalink(); ?>">

                  <?php

                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium');

                  if( $url ): ?>

                    <img src="<?php echo $url; ?>" alt=" ">

                  <?php endif; ?>

                  <h2><?php the_title(); ?></h2>

                </a>
              </div>

            <?php endwhile; ?>

          </div>

        </div>

      <?php endif; ?>

    </div>
  </main>

<?php get_footer(); ?>
