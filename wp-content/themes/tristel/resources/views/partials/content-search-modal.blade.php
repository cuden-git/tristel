@component('components.modal',['id' => 'search-modal'])
  <h2 class="modal__content-title modal__content-title--left">{{ __('Search', 'tristel') }}</h2>
  {!! get_search_form() !!}
@endcomponent
