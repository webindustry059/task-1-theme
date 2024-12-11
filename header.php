 <?php wp_head(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">Your Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
      wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
          'fallback_cb' => '__return_false',
          'depth' => 2,
          'walker' => new Bootstrap_Nav_Walker(),
      ));
      ?>
    </div>
  </div>
</nav>
