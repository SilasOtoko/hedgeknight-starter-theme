<?php get_header(); ?>

  <main class="site-main subpage" role="main">
    <div class="padding-wrapper">

      <div class="text-wrapper">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>

          <div class="page-content">

            <?php if( get_post_type() == 'post' ): ?>

              <p class="published-date">Published <?php the_date(); ?></p>

            <?php endif; ?>


            <?php the_content(); ?>
          </div>

        <?php endwhile; endif; ?>

        <?php if( get_post_type() == 'post' ): ?>

          <a href="/blog" class="button">< Back to all posts</a>

        <?php endif; ?>

      </div>

    </div>
  </main>

<?php get_footer(); ?>
