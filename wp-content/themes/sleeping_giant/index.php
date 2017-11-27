<?php get_header(); ?>

  <main class="site-main subpage" role="main">
    <div class="padding-wrapper">

      <div class="text-wrapper">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php if( !is_front_page() ): ?>

            <h1><?php the_title(); ?></h1>

          <?php endif; ?>

          <div class="page-content">

            <?php the_content(); ?>
          </div>

        <?php endwhile; endif; ?>

      </div>

    </div>
  </main>

<?php get_footer(); ?>
