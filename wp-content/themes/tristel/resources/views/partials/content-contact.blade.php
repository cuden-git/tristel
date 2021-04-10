<div class="container contact-us">
  <div class="row">
    <div class="col-12 col-md-6 contact-us__content">
        @include('partials.page-header')
        {!! $contact_content['content'] !!}
    </div>
    <div class="col-12 col-md-6 contact-us__form">
      <h3 class="contact-us__form-title">{{ $contact_form['intro']['intro_title'] }}</h3>
      {!! $contact_form['intro']['intro_text'] !!}
      {!! $contact_form['form'] !!}
    </div>
    <footer class="col-12 col-md-6 offset-md-6 contact-us__footer">
      {!! $contact_form['footer'] !!}
    </footer>
  </div>
</div>
