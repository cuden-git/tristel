<section class="page-section team-grid">
  <div class="container">
    <div class="row">
  @foreach($team_grid as $member)
      <div class="col-12 col-md-3 team-grid__cell">
        <a href={{ $member['link'] }} class="team-grid__cell-inner">
          <div class="team-grid__img">
            <div>
            {!! get_the_post_thumbnail($member['id'], 'full') !!}
            </div>
          </div>
          <h5 class="team-grid__title">{{ $member['title'] }}</h5>
          <h6 class="team-grid__position">{{ $member['position'] }}</h6>
        </a>
      </div>
  @endforeach
    </div>
  </div>
</section>
