<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">
    <div class="text-wrapper">

      <?php
        global $post;
        $category = get_the_category($post->ID);
        $categoryId = $category[0]->cat_ID;
        $queriedObject = get_queried_object();
      ?>

      <div class="main-wordpress-content">

        <h1>Currently Browsing: <?php single_cat_title(); ?></h1>

        <p><?php echo category_description($categoryId); ?></p>

      </div>

      <?php 
        $args = array(
          'post_type' => 'post',
          'category__in' => array($categoryId)
        );

        $the_query = new WP_Query( $args );

      ?>

      <?php if( $the_query->have_posts() ): ?>

        <div class="blog-posts">

          <?php while ( have_posts() ) : the_post(); ?>

            <article class="blog-post">

              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <div class="blog-snippet"><?php the_excerpt(); ?></div>
              <a class="button button-primary" href="<?php the_permalink(); ?>">Read More</a>

            </article>

          <?php endwhile; ?>

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

      <?php else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> 

      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>

