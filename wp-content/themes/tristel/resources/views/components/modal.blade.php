<div{!! (isset($id)? ' id='.$id : null ) !!} class="modal{!! (isset($classes)? ' '.implode( ' ', $classes ) : null) !!}">
  <div class="modal__content">
    <img src="@asset('images/tristel-logo-white.svg')" class="modal__logo" alt="{{ get_bloginfo('name', 'display') }}">
    @if(!isset($hide_close))
    <i class="fas fa-times modal__close"></i>
    @endif
    {{ $slot }}
  </div>
</div>
