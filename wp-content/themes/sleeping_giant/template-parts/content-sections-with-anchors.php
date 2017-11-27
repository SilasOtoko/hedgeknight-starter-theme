<section class="list-section">

  <?php while( have_rows( 'sections' ) ): the_row(); ?>

    <?php $id = dashitAll( get_sub_field( 'section_heading' )); ?>

    <div class="list-item" id="<?php echo $id; ?>">

      <?php if( get_sub_field( 'section_heading' ) ): ?>

        <h2><?php the_sub_field( 'section_heading' ); ?></h2>

      <?php endif; ?>

      <?php if( get_sub_field( 'section_content' ) ): ?>

        <?php the_sub_field( 'section_content' ); ?>

      <?php endif; ?>

    </div>

  <?php endwhile; ?>

</section>
