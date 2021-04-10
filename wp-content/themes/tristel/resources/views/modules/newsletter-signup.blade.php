<section class="newsletter-signup">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 newsletter-signup__label">
        <h2 class="newsletter-signup__title">{{ $signup_cta['newsletter_cta_title'] }}</h2>
        @if($signup_cta['newsletter_tick_list'])
        <ul class="newsletter-signup__list">
          @foreach($signup_cta['newsletter_tick_list'] as $list_item)
          <li><i class="fas fa-check"></i>{{ $list_item['list_item'] }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="col-12 col-md-6">
        <span class="btn" data-modal-target="#signup-modal">{{ $signup_cta['newsletter_button_label'] }}</span>
      </div>
    </div>
  </div>
</section>
