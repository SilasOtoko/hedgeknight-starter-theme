<?php if( function_exists( 'get_field' ) ): ?>

  <?php
    $banner = wp_get_attachment_image_src( get_field( 'page_banner' ), 'banner' );
    $posts_page_id = get_option( 'page_for_posts' ); 
    $posts_page = get_post( $posts_page_id );
    global $post;
  ?>

  <?php if( get_field( 'page_banner' ) ): ?>

    <div class="page-banner subpage-banner" style="background-image: url(<?php echo $banner[0]; ?>);"></div>

  <?php elseif( has_post_thumbnail($post->ID) ): ?>

    <?php 
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium'); 
    ?>

    <div class="page-banner subpage-banner" style="background-image: url(<?php echo $url; ?>)"></div>

  <?php else: ?>

     <div class="page-banner subpage-banner page-banner--no-image"></div>

  <?php endif; ?>

<?php endif; ?>