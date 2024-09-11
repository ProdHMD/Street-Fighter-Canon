<article @php(post_class('container-fluid')) id="main-content">
  <div class="row">
    <div class="col-xl-8 mt-5" id="biography-content">
      <header class="container-fluid ps-0 pe-0" id="top-content">
        <div class="row" id="details">
          <div class="col-xl-8">
            <h1 class="title">{!! $title !!}</h1>

            <div class="row" id="chara-info">
              <div class="col-xl-6" id="bio-text">
                @php(the_content())
              </div>

              @if (have_rows('details'))
                <div class="col-xl-6" id="stats-text">
                  <ul class="list-unstyled mb-0">
                    @while (have_rows('details')) @php(the_row())
                      <li class="list-item"><strong>Height:</strong> {!! get_sub_field('height') !!}</li>
                      <li class="list-item"><strong>Weight:</strong> {!! get_sub_field('weight') !!}</li>
                      <li class="list-item"><strong>Fighting Style:</strong> {!! get_sub_field('fighting_style') !!}</li>
                      <li class="list-item"><strong>Occupation:</strong> {!! get_sub_field('occupation') !!}</li>
                      <li class="list-item"><strong>Alignment:</strong> {!! get_sub_field('alignment') !!}</li>
                      <li class="list-item"><strong>Likes:</strong> {!! get_sub_field('likes') !!}</li>
                      <li class="list-item"><strong>Dislikes:</strong> {!! get_sub_field('dislikes') !!}</li>
                      <li class="list-item"><strong>Skills:</strong> {!! get_sub_field('skills') !!}</li>
                    @endwhile
                  </ul>
                </div>
              @endif
          </div>
        </div>

        <ul class="row align-items-center list-unstyled mb-0 mt-4" id="games">
          <?php
            $args = array('hide_empty' => true);
            $terms = get_the_terms(get_the_ID(), 'game');

            $games = array();
            
            foreach($terms as $term) {
              $order = get_field('order', $term);
              $image = get_field('image', $term);
              $games[$order] = (object) array(
                'name' => $term->name,
                'slug' => $term->slug,
                'term_id' => $term->term_id,
                'image' => $image
              );
            }

            ksort($games, SORT_NUMERIC);
          ?>
            <?php foreach($games as $game) : ?>
              <li class="game col-xl-1 ps-1 pe-1" id="{!! $game->slug !!}"><img src="{!! $game->image['url'] !!}" class="img-fluid" /></li>
            <?php endforeach; ?>
          </ul>
      </header>

      
      <div class="container-fluid ps-0 pe-0 mt-5" id="bottom-content">
        @if (have_rows('biography'))
          @while (have_rows('biography')) @php(the_row())
            <div class="row" id="biography">
              @if (have_rows('entry'))
                @while (have_rows('entry')) @php(the_row())
                  <div class="col-xl-11 mb-4">
                    <h3 class="title">{!! get_sub_field('title') !!}</h3>
                    <div class="content">{!! get_sub_field('content') !!}</div>

                    @if (have_rows('fights'))
                    <div class="fight mt-4">
                      @while (have_rows('fights')) @php(the_row())
                        <h4 class="title">{!! get_sub_field('title') !!}</h4>
                        <div class="content">{!! get_sub_field('content') !!}</div>
                      @endwhile
                    </div>
                    @endif
                  </div>
                @endwhile
              @endif
            </div>
          @endwhile
        @endif
      </div>
    </div>
  </div>
</article>

<div class="fixed-top container-fluid p-0" id="biography-image">
  <div class="row">
    <div class="col-xl-6 offset-xl-6 d-flex justify-content-end">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="814.737" height="1080" viewBox="0 0 814.737 1080">
        <defs>
          <clipPath id="clip-path">
            <path id="Image_Block" data-name="Image Block" d="M1105.263,6200v268.947L1534.737,7280H1920V6200Z" transform="translate(0 -6200)" fill="#fff"/>
          </clipPath>
          <linearGradient id="linear-gradient" x2="0.954" y2="0.986" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#4169b2"/>
            <stop offset="1" stop-color="#b93461"/>
          </linearGradient>
        </defs>
        <g id="Image" transform="translate(-1105.263)" clip-path="url(#clip-path)">
          <rect id="Rectangle_1" data-name="Rectangle 1" width="815" height="1080" transform="translate(1105)" fill="url(#linear-gradient)"/>
          <image id="Image_1" data-name="Image 1" width="1920" height="1080" transform="translate(974)" xlink:href="{!! get_the_post_thumbnail_url(get_the_ID(), 'thumb') !!}" style="mix-blend-mode: overlay;isolation: isolate"/>
          <path id="Inner_Border" data-name="Inner Border" d="M1099.263,6207v235.986L1512.109,7234H1854V6207Z" transform="translate(39.474 -6180)" fill="none" stroke="#fff" stroke-width="1"/>
        </g>
      </svg>
    </div>
  </div>
</div>
