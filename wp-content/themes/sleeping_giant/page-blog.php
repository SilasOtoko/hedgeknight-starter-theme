<?php /* Template Name: Listed Content */ ?>

<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">
    <div class="text-wrapper">

      <div class="main-wordpress-content">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>

          <?php the_content(); ?>

        <?php endwhile; endif; wp_reset_query(); ?>

      </div>

      <div class="blog-posts">

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=3&paged='. get_query_var('paged')); ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="blog-post">

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="blog-snippet"><?php the_excerpt(); ?></div>
            <span class="button-wrapper"><a class="button" href="<?php the_permalink(); ?>">Read More</a></span>

          </div>

        <?php endwhile; ?>

          <div class="navigation">
            <?php wp_pagenavi(); ?>
          </div><!-- /.navigation -->

        <?php else : ?>

          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

        <?php endif; wp_reset_query(); ?>

      </div>

    </div>
  </div>
</main>

<?php get_footer(); ?>
