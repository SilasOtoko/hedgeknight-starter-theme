<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">
    <div class="text-wrapper">

      <?php if ( have_posts() ) : ?>

        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'hedgeknight' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

        <?php while ( have_posts() ) : the_post(); ?>

          <article class="blog-post">

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="blog-snippet"><?php the_excerpt(); ?></div>
            <a class="button button-primary" href="<?php the_permalink(); ?>">Read More</a>

          </article>

        <?php endwhile; ?>

      <?php endif; ?>

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
</main>

<?php get_footer(); ?>

