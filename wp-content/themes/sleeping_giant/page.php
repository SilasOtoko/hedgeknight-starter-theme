<?php get_header(); ?>

  <main class="site-main" role="main">
    <div class="padding-wrapper">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="text-wrapper">

          <header class="entry-header">

            <?php if( !is_front_page() ): ?>

              <h1><?php the_title(); ?></h1>

            <?php endif; ?>

          </header>

          <div class="entry-content">

            <?php the_content(); ?>
            
          </div>

        </div>

      </article>

    </div>
  </main>

<?php get_footer(); ?>
