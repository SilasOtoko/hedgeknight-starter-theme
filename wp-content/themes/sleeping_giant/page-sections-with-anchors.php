<?php /* Template Name: Sections With Anchors */ ?>

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

      <?php if( function_exists( 'get_field' ) ): ?>

        <section class="quick-links">

          <h4>Quick Links</h4>

          <?php if( have_rows( 'sections' ) ): ?>

            <ul>

              <?php while( have_rows( 'sections' ) ): the_row(); ?>

                <?php $id = dashitAll( get_sub_field( 'section_heading' )); ?>

                <li>
                  <a class="quick-link" href="#<?php echo $id; ?>"><?php the_sub_field( 'section_heading' ); ?></a>
                </li>

              <?php endwhile; ?>

            </ul>

          <?php endif; ?>

        </section>

        <?php if( have_rows( 'sections' ) ): ?>

          <?php get_template_part( 'template-parts/content', 'sections-with-anchors'); ?>

        <?php endif; ?>

      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
