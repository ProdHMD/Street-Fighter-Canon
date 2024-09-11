<header class="banner d-flex flex-wrap justify-content-center align-items-center" id="header">
  <a class="brand align-items-center me-auto" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills', 'walker' => new \App\wp_bootstrap5_navwalker(), 'echo' => false]) !!}
  </nav>
</header>
