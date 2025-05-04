<div class="container-fluid" id="main-content">
  <div class="row" id="top-content">
    <div class="col-xl-12 d-flex flex-wrap justify-content-between align-items-center">
      <h2 class="title ms-0 mb-0 me-auto">Choose Your Fighter</h2>

      <ul class="list-unstyled list-group list-group-horizontal btn-group">
        <li class="button"><button class="btn" data-sort-by="canon">Canon Debut</button></li>
        <li class="button"><button class="btn" data-sort-by="game">Realtime Debut</button></li>
        <li class="button"><button class="btn" data-sort-by="name">A-Z</button></li>
      </ul>
    </div>
  </div>

  <div class="row" id="bottom-content">
    <div class="col-xl-12">
      <div class="row" id="character-group">
        @php
          $args = array(
            'post_type' => 'character',
            'order' => 'DESC'
          );
          $query = new WP_Query($args);
        @endphp

        @if ($query->have_posts())
          @while ($query->have_posts()) @php($query->the_post())

            {{-- Post Info --}}
            @php($post_id = get_the_ID())
            @php($chara_slug = str_replace(' ', '-', strtolower(get_the_title())))
            @php($clip_id = 'clip-path-' . $post_id)
            @php($pattern_id = 'pattern-' . $post_id)
            @php($game_debut = get_field('game_debut'))
            @php($canon_debut = get_field('canon_debut'))

            {{-- Viewbox --}}
            @if (have_rows('custom_viewbox_position'))
              @while (have_rows('custom_viewbox_position')) @php(the_row())
                @php($viewbox_custom = get_sub_field('viewbox'))
                @php($default_viewbox = '260 0 400 540')
                @php($viewbox = $viewbox_custom ? $viewbox_custom : $default_viewbox)
              @endwhile
            @endif            

            <div class="col-xl-2 col-md-3 col-sm-4 col-6 chara transition" id="chara-{!! $chara_slug !!}" data-name="{!! get_the_title() !!}" data-canon-debut="{!! $canon_debut !!}" data-game-debut="{!! $game_debut !!}">
              <a href="{!! get_permalink() !!}">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 175 250">
                  <defs>
                    <clipPath id="{{ $clip_id }}">
                      <path id="Main" d="M161.249,2459.444H282.523l25.943,29.507-27.995,220.493H160.158l-26.692-31.172Z" transform="translate(-33.466 -1190.444)" fill="none" stroke="#fff" stroke-width="1"/>
                    </clipPath>
                    <pattern id="{{ $pattern_id }}" width="1" height="1" viewBox="{!! $viewbox !!}">
                      <image preserveAspectRatio="xMidYMid slice" width="960" height="540" xlink:href="{!! get_the_post_thumbnail_url(get_the_ID(), 'thumb') !!}"/>
                    </pattern>
                  </defs>
                  <g id="Image" transform="translate(-100 -1269)" clip-path="url(#{{ $clip_id }})">
                    <rect id="Image" data-name="Image" width="500" height="450" transform="translate(100 1200)" fill="url(#{{ $pattern_id }})"/>
                    <path id="Inner_Border" data-name="Inner Border" d="M158.439,2459.444H267.447l23.319,27.873L265.6,2695.6H157.458l-23.992-29.446Z" transform="translate(-23.51 -1183.523)" fill="none" stroke="#fff" stroke-width="1"/>
                  </g>
                </svg>
              </a>
            </div>
          @endwhile @php(wp_reset_postdata())
        @endif
      </div>
    </div>
  </div>
</div>
