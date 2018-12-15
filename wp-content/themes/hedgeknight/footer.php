  </div><!-- #content -->

  <footer class="site__footer">

    <?php $currentDate = date("Y"); ?>
        
    <?php if ($currentDate == "2018") {
      $date = $currentDate;
    } else {
      $date = "2018-" . $currentDate;
    }; ?>
    
    <p class="legal">&copy; <?php echo $date; ?> <?php bloginfo( 'name' ); ?></p>

    <?php if( !is_front_page() ): ?>

      <a href="#page-top" class="scroll-button">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/arrow-up.svg" />
      </a>

    <?php endif; ?>

  </footer>

<?php wp_footer(); ?>

</body>
</html>
