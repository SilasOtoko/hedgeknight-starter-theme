<?php get_header(); ?>

  <?php $banner = wp_get_attachment_image_src( get_field( 'home_hero' ), 'banner' ); ?>

  <div id="content" class="site__content" style="background-image: url(<?php echo $banner[0]; ?>);">

    <div class="hero__content">

      <p class="hero__text animate fade-in-up"><?php the_field( 'hero_text'); ?></p>

      <div class="button-wrapper animate fade-in-up delay">

        <a class="button button--accent" href="<?php the_field( 'button_1_link' ); ?>">
          <?php the_field( 'button_1_text' ); ?>
        </a>

        <a class="button button--accent" href="<?php the_field( 'button_2_link' ); ?>">
          <?php the_field( 'button_2_text' ); ?>
        </a>

      </div>

    </div>

  </div>

<?php get_footer(); ?>
