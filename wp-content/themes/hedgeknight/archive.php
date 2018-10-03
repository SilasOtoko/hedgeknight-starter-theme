<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">
    <div class="text-wrapper">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="archive-description">', '</div>' );
          ?>
        </header><!-- .page-header -->

        <div class="post-items">

          <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <div class="entry-header">

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              </div>
              
              <div class="entry-content">

                <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                <a class="button button-primary" href="<?php the_permalink(); ?>">Read More</a>

              </div>

            </article>

          <?php endwhile; ?>

        </div>

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

      <?php else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

      <?php endif; wp_reset_query(); ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
