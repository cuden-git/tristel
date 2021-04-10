@if(have_rows('layout_modules'))
  @php $module_count = 0; @endphp

  @while (have_rows('layout_modules')) <?php (the_row()) ?>

    @if (get_row_layout() == 'hero_slider')

     @include('partials.flexible-content.hero-carousel', ['hero_slides' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'articles_slider')

     @include('partials.flexible-content.article-carousel', ['article_slides' => $page_layouts[$module_count]])
     @php ++$module_count @endphp

    @elseif (get_row_layout() == 'products_slider')

     @include('partials.flexible-content.product-carousel', ['product_slides' => $page_layouts[$module_count]])
     @php ++$module_count @endphp

    @elseif (get_row_layout() == 'text_img_blocks')

     @include('partials.flexible-content.text-img-blocks', ['img_text_blocks' => $page_layouts[$module_count]])
     @php ++$module_count @endphp

    @elseif (get_row_layout() == 'hero_section')

     @include('partials.flexible-content.hero-section', ['hero_section' => $page_layouts[$module_count]])
     @php ++$module_count @endphp

    @elseif (get_row_layout() == 'standard_slider')

      @include('partials.flexible-content.standard-carousel', ['standard_carousel' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'location_map')

      @include('partials.flexible-content.location-map', ['location_map' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'grid_panels')

      @include('partials.flexible-content.grid-panels', ['grid_panels' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'team_carousel')

      @include('partials.flexible-content.team-carousel', ['team_carousel' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'wysiwyg_editor')

      @include('partials.flexible-content.editor-content',['editor_content' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'text_img_blocks_fw')

      @include('partials.flexible-content.text-img-blocks-fw', ['img_text_blocks_fw' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'page_headers')

      @include('partials.flexible-content.page-headers',['page_headers' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @elseif (get_row_layout() == 'team_grid')

      @include('partials.flexible-content.team-grid',['team_grid' => $page_layouts[$module_count]])
      @php ++$module_count @endphp

    @endif
  @endwhile
@endif
