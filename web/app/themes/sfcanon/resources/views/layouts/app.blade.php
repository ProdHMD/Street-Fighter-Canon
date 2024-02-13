<?php
  global $post;
  if ($post) {
    $post_id = $post->ID;

    if (is_singular('characters')) {
      $post_slug = 'bio';
    } else {
      $post_slug = $post->post_name; 
    }
  } else {
    $post_id = '';
    $post_slug = '';
  }
?>

<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
      <a class="sr-only sr-only-focusable visually-hidden" href="#content">
        {{ __('Skip to content') }}
      </a>

      @include('sections.header')

      <main id="<?php echo $post_slug; ?>" class="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.background')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
