<footer>

  <section class="footer-info clearfix">
    <div class="padding-wrapper">

      <?php $currentDate = date("Y"); ?>
      
      <?php if ($currentDate == "2018") {
        $date = $currentDate;
      } else {
        $date = "2018-" . $currentDate;
      }; ?>

      <p class="legal">&copy; <?php echo $date; ?> <?php bloginfo( 'name' ); ?></p>
      <p class="credits">Site design by: <a href="http://sleepinggc.com">Sleeping Giant Creative</a></p>
    </div>
  </section>

  <a href="#page-top" class="scroll-button">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/arrow-up.svg" />
  </a>

</footer>

<?php wp_footer(); ?>

</body>
</html>
