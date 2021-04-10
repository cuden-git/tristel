@component('components.modal',['id' => 'signup-modal'])
  <h2 class="modal__content-title modal__content-title--left">{{ $signup_modal['title'] }}</h2>
  <div class="signup-modal__intro">{{ $signup_modal['intro'] }}</div>
  <div class="signup-modal__form">{!! do_shortcode($signup_modal['form_shortcode']) !!}</div>
@endcomponent
