<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">
    <div class="text-wrapper">

      <?php 

        $posts_page_id = get_option( 'page_for_posts' ); 
        $posts_page = get_post( $posts_page_id );

      ?>

      <?php if( $posts_page->post_content ): ?>

        <div class="main-wordpress-content">

          <?php if( !is_front_page() ): ?>

            <h1><?php single_post_title(); ?></h1>

            <?php echo $posts_page->post_content; ?>

          <?php else: ?>

            <?php echo $posts_page->post_content; ?>

          <?php endif; ?>

        </div>

      <?php endif; ?>

      <div class="blog-posts">

        <?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <div class="blog-post">

              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <div class="blog-snippet"><?php the_excerpt(); ?></div>
              <a class="button" href="<?php the_permalink(); ?>">Read More</a>

            </div>

          <?php endwhile; ?>

        <?php else : ?>

          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

        <?php endif; wp_reset_query(); ?>

      </div>

      <?php if( function_exists( 'wp_pagenavi') ): ?>

        <div class="navigation">

          <?php wp_pagenavi(); ?>

        </div>

      <?php else: ?>

        <?php the_posts_pagination( array(
          'prev_text'          => __( 'Previous page', 'sleeping_giant' ),
          'next_text'          => __( 'Next page', 'sleeping_giant' ),
          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'sleeping_giant' ) . ' </span>',
        ) ); ?>

      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>

