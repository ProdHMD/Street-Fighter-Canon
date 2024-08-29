<div class="container-fluid ps-0 pe-0" id="main-content">
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
            @php($chara_slug = str_replace(' ', '-', strtolower(get_the_title())))
            <div class="col-xl-2 chara transition" id="chara-{!! $chara_slug !!}" data-name="{!! get_the_title() !!}" data-canon-debut="street-fighter-alpha-2" data-game-debut="street-fighter-ii">
              <a href="{!! get_permalink() !!}">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 175 250">
                  <defs>
                    <clipPath id="clip-path">
                      <path id="Main" d="M161.249,2459.444H282.523l25.943,29.507-27.995,220.493H160.158l-26.692-31.172Z" transform="translate(-33.466 -1190.444)" fill="none" stroke="#fff" stroke-width="1"/>
                    </clipPath>
                    <pattern id="pattern" width="1" height="1" viewBox="260 0 400 540">
                      <image preserveAspectRatio="xMidYMid slice" width="960" height="540" xlink:href="{!! get_the_post_thumbnail_url(get_the_ID(), 'thumb') !!}"/>
                    </pattern>
                  </defs>
                  <g id="Image" transform="translate(-100 -1269)" clip-path="url(#clip-path)">
                    <rect id="Image" data-name="Image" width="500" height="450" transform="translate(100 1200)" fill="url(#pattern)"/>
                    <path id="Inner_Border" data-name="Inner Border" d="M158.439,2459.444H267.447l23.319,27.873L265.6,2695.6H157.458l-23.992-29.446Z" transform="translate(-23.51 -1183.523)" fill="none" stroke="#fff" stroke-width="1"/>
                  </g>
                </svg>
              </a>
            </div>
            @php(wp_reset_postdata())
          @endwhile
        @endif
      </div>
    </div>
  </div>
</div>
