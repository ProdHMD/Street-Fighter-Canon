<div class="page-header">
  <div class="container-fluid ps-0 pe-0" id="header-content">
    <div class="row">
      <div class="col-xl-8">
        @if (get_field('title'))
          <h1>{{ esc_html(the_field('title')) }}</h1>
        @else
          <h1>{!! $title !!}</h1>
        @endif

        @if (get_field('content'))
          {{ the_field('content') }}
        @endif

        @if (get_field('button_text'))
          <a class="scroll-down-btn" href="#">{{ esc_html(the_field('button_text')) }}</a>
        @endif
      </div>
    </div>
  </div>
</div>
