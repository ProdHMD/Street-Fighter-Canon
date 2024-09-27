<div class="container-fluid" id="main-content">
  <div class="row" id="entry-row">
    <div class="carousel-scroll-cover active"></div>
    <div class="col-xl-12 carousel slide carousel-fade" id="timeline-carousel">
      <div class="row" id="top-content">
        <div class="col-xl-12" id="entry-main">
          <div class="container-fluid ps-0 pe-0 carousel-inner" id="entry-container">
            <div class="row align-items-center" id="entry-row">
              @php
                $args = array(
                  'post_type' => 'entry',
                  'order' => 'ASC'
                );
                $query = new WP_Query($args);
              @endphp

              @if ($query->have_posts())
                @while ($query->have_posts()) @php($query->the_post())
                  <?php
                    $entry_slug = str_replace(' ', '-', strtolower(get_the_title()));
                    $terms = get_the_terms(get_the_ID(), 'game');
                    $game_terms = array();
                    foreach ( $terms as $term ) {
                      $game_terms[] = $term->slug;
                    }
                    $game_term = join( ", ", $game_terms );
                  ?>
                  <div class="col-xl-12 carousel-item entry-item" id="entry-year-{!! $entry_slug !!}" data-game="{!! $game_term !!}">
                    <div class="entry row align-items-center">
                      <div class="col-xl-8" id="entry-text-main">
                        <h2 class="entry-title">{!! get_the_title() !!}</h2>
                        <div class="entry-text">@php(the_content())</div>
                      </div>
                      <div class="col-xl-4" id="image">{!! the_post_thumbnail('full', array('class' => 'img-fluid')) !!}</div>
                    </div>
                  </div>
                  @php(wp_reset_postdata())
                @endwhile
              @endif
            </div>
          </div>
        </div>

        <div class="col-xl-1 col-lg-1 d-none d-md-block" id="game-list">
          <?php
            $args = array('hide_empty' => false);
            $terms = get_terms('game', $args);
            
            $games = array();
            
            foreach($terms as $term) {
              $order = get_field('order', $term);
              $image = get_field('image', $term);
              $games[$order] = (object) array(
                'name' => $term->name,
                'slug' => $term->slug,
                'term_id' => $term->term_id,
                'image' => $image,
                'order' => $order - 1,
              );
            }

            ksort($games, SORT_NUMERIC);
          ?>
          
          <ul class="row list-unstyled mb-0">
            <?php foreach($games as $game) : ?>
              <li class="game indicator pt-1 pb-1" id="{!! $game->slug !!}" data-bs-target="#timeline-carousel" data-bs-slide-to="{!! $game->order !!}"><img src="{!! $game->image['url'] !!}" class="img-fluid" /></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="row" id="bottom-content">
        <div class="col-xl-4 offset-xl-4 carousel-indicators" id="scroll-bar">
          <?php foreach($games as $game) : ?>
            <div class="scroll-thumb indicator" id="thumb-{!! $game->order !!}" data-bs-target="#timeline-carousel" data-bs-slide-to="{!! $game->order !!}"></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
