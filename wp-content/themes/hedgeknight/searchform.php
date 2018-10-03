<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <label for="<?php echo $unique_id; ?>">
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'hedgeknight' ); ?></span>
  </label>

  <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'hedgeknight' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

  <button type="submit" class="search-submit button button-primary">

    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
      <circle cx="11" cy="11" r="8"></circle>
      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>

    <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'hedgeknight' ); ?></span></button>

</form>