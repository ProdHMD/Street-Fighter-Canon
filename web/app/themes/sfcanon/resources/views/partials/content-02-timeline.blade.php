<div class="container-fluid ps-0 pe-0" id="main-content">
  <div class="row" id="entry-row">
    <div class="col-xl-12">
      <div class="row" id="top-content">
        <div class="col-xl-12" id="entry-main">
          <div class="container-fluid ps-0 pe-0 d-flex align-items-center" id="entry-container">
            @php
              $args = array(
                'post_type' => 'entry',
                'order' => 'ASC'
              );
              $query = new WP_Query($args);
            @endphp

            @if ($query->have_posts())
              @while ($query->have_posts()) @php($query->the_post())
                @php($entry_slug = str_replace(' ', '-', strtolower(get_the_title())))
                <div class="entry entry-item row align-items-center" id="entry-year-{!! $entry_slug !!}">
                  <div class="col-xl-8" id="entry-text-main">
                    <h2 class="entry-title">{!! get_the_title() !!}</h2>
                    <div class="entry-text">@php(the_content())</div>
                  </div>
                  <div class="col-xl-4" id="image">{!! the_post_thumbnail('full', array('class' => 'img-fluid')) !!}</div>
                </div>
                @php(wp_reset_postdata())
              @endwhile
            @endif
            </div>
        </div>

        <div class="col-xl-1" id="game-list">
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
                'image' => $image
              );
            }

            ksort($games, SORT_NUMERIC);
          ?>
          
          <ul class="row list-unstyled mb-0">
            <?php foreach($games as $game) : ?>
              <li class="game pt-1 pb-1" id="{!! $game->slug !!}"><img src="{!! $game->image['url'] !!}" class="img-fluid" /></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="row" id="bottom-content">
        <div class="col-xl-4 offset-xl-4" id="scroll-bar">
          <div class="scroll-thumb"></div>
        </div>
      </div>
    </div>
  </div>
</div>
