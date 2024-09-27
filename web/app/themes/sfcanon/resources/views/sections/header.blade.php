<header class="banner navbar-expand-xl d-flex flex-wrap justify-content-center align-items-center" id="header">
  <a class="brand align-items-center me-auto" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    <div class="collapse navbar-collapse" id="collapsable">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills', 'walker' => new \App\wp_bootstrap5_navwalker(), 'echo' => false]) !!}
    </div>
  </nav>

  <nav class="nav-secondary" aria-label="{{ wp_get_nav_menu_name('secondary_navigation') }}">
    <div class="collapse navbar-collapse" id="collapsable">
      {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills', 'walker' => new \App\wp_bootstrap5_navwalker(), 'echo' => false]) !!}
    </div>
  </nav>

  <button class="navbar-toggler position-absolute top-0 end-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsable" aria-controls="collapsable" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <span class="bar top"></span>
      <span class="bar middle"></span>
      <span class="bar bottom"></span>
    </span>
  </button>
</header>

<div class="progress-bar">
  <div class="pb-outer">
    <div class="inner-pb"></div>
  </div>
</div>
