<?php get_header(); ?>

  <main class="site-main" role="main">
    <div class="padding-wrapper">

      <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="text-wrapper">

              <header class="entry-header">

                <?php if( !is_front_page() ): ?>

                  <h1><?php the_title(); ?></h1>

                <?php endif; ?>

              </header>

              <div class="entry-content">

                <?php the_content(); ?>

                <div class="page-links">

                  <?php if( function_exists( 'wp_pagenavi') ): ?>

                    <div class="navigation">

                      <?php wp_pagenavi(); ?>

                    </div>

                  <?php else: ?>

                    <?php the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'hedgeknight' ),
                      'next_text'          => __( 'Next page', 'hedgeknight' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'hedgeknight' ) . ' </span>',
                    ) ); ?>

                  <?php endif; ?>

                </div>
                
              </div>

            </div>

          </article>

        <?php endwhile; ?>

      <?php endif; ?>

    </div>
  </main>

<?php get_footer(); ?>
