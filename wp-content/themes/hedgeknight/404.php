<?php get_header(); ?>

<main class="site-main subpage" role="main">
  <div class="padding-wrapper">

    <div class="text-wrapper">

      <div class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.' ); ?></h1>
      </div>

      <div class="page-content">
        <p>It looks like nothing was found at this location. Maybe try going back to the homepage and find the page from there? Or try searching for it.</p>

        <?php get_search_form(); ?>

      </div>

    </div>

  </div>
</main>

<?php get_footer(); ?>
