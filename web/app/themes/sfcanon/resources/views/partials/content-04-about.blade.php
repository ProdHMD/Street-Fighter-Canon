<div class="container-fluid" id="main-content">
  <div class="row" id="top-content">
    <div class="col-xl-5" id="credits-section">
      <h2 class="title">Credits</h2>
      
      <div class="row" id="credits">
        <div class="col-xl-5 d-xl-block d-none">
          <ul class="list-unstyled mb-0">
            <li class="list-item"><strong>Design, Development</strong></li>
            <li class="list-item"><strong>Research, Curation</strong></li>
            <li class="list-item"><strong>Server Host</strong></li>
          </ul>
        </div>

        <div class="col-xl-7 d-xl-block d-none">
          @if (have_rows('developer'))
            @while (have_rows('developer')) @php(the_row())
              <ul class="list-unstyled mb-0">
                @if (have_rows('member'))
                  @while (have_rows('member')) @php(the_row())
                    <li class="list-item">
                      {!! get_sub_field('name') !!}, <strong>{!! get_sub_field('nickname') !!}</strong>
                    </li>
                  @endwhile
                @endif
              </ul>
            @endwhile
          @endif

          @if (have_rows('research'))
            @while (have_rows('research')) @php(the_row())
              <ul class="list-unstyled mb-0">
                @if (have_rows('member'))
                  @while (have_rows('member')) @php(the_row())
                    <li class="list-item">
                      {!! get_sub_field('name') !!}, <strong>{!! get_sub_field('nickname') !!}</strong>
                    </li>
                  @endwhile
                @endif
              </ul>
            @endwhile
          @endif

          @if (get_field('server_host'))
            <ul class="list-unstyled mb-0">
              <li class="list-item"><strong>{!! get_field('server_host') !!}</strong></li>
            </ul>
          @endif
        </div>

        <div class="col-lg-12 col-12 d-xl-none" id="mobile-credits">
          @if (have_rows('developer'))
            @while (have_rows('developer')) @php(the_row())
              <ul class="list-unstyled mb-2">
                @if (have_rows('member'))
                  @while (have_rows('member')) @php(the_row())
                    <li class="list-item">
                      <strong>Design, Development</strong><br>
                      {!! get_sub_field('name') !!}, <strong>{!! get_sub_field('nickname') !!}</strong>
                    </li>
                  @endwhile
                @endif
              </ul>
            @endwhile
          @endif

          @if (have_rows('research'))
            @while (have_rows('research')) @php(the_row())
              <ul class="list-unstyled mb-2">
                @if (have_rows('member'))
                  @while (have_rows('member')) @php(the_row())
                    <li class="list-item">
                      <strong>Research, Curation</strong><br>
                      {!! get_sub_field('name') !!}, <strong>{!! get_sub_field('nickname') !!}</strong>
                    </li>
                  @endwhile
                @endif
              </ul>
            @endwhile
          @endif

          @if (get_field('server_host'))
            <ul class="list-unstyled mb-2">
              <li class="list-item">
                <strong>Server Host</strong><br>
                <strong>{!! get_field('server_host') !!}</strong>
              </li>
            </ul>
          @endif
        </div>
      </div>

      @if (get_field('copyright'))
        <div class="row mt-5" id="copyrights">
          <div class="col-xl-12">
            {!! get_field('copyright') !!}
          </div>
        </div>
      @endif
    </div>

    <div class="col-xl-6 offset-xl-1" id="sources-section">
      <h2 class="title">Sources</h2>

      @if (have_rows('source'))
        <ul class="list-unstyled mb-0">
          @while (have_rows('source')) @php(the_row())
            <li class="list-item mb-4">
              {!! get_sub_field('author') !!} ({!! get_sub_field('year') !!}). {!! get_sub_field('name') !!}
              @if (get_sub_field('retrieved')) Retrived from <a href="{!! get_sub_field('retrieved') !!}" target="_blank">{!! get_sub_field('retrieved') !!}</a>. @endif
            </li>
          @endwhile
        </ul>
      @endif
    </div>
  </div>
</div>
