<section class="editor-content{{ ($editor_content['width'] == 'narrow'? ' editor-content--'.$editor_content['width'] : NULL ) }}">
  <div class="container">
    {!! $editor_content['editor'] !!}
  </div>
</section>
