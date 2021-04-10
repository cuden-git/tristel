<div class="site-header__lang country-choice-select" data-country-choice>
  <h6 class="country-choice-select__chosen" style="background-image: url({{ $all_sites['current']['flag_img']['url'] }})"><span class="country-choice-select__country">{{ $all_sites['current']['country'] }}</span> - <span class="country-choice-select__lang">{{ $all_sites['current']['lang']['label'] }}</span></h6>
  <ul>
      @foreach (array_keys($all_sites['all']) as $key)
        @foreach ($all_sites['all'][$key]['sites']['language'] as $language)        
          <li value="{{ $all_sites['all'][$key]['sites']['url'][$loop->index] }}" style="background-image: url({{ $all_sites['all'][$key]['flag_img']['url'] }})">
            <a href="{{ $all_sites['all'][$key]['sites']['url'][$loop->index] }}" 
            {{-- data-country-path="{{ $all_sites['all'][$key]['sites']['url'][$loop->index] }}" 
            data-country-code="{{ $key }}" 
            data-country-blog-id="{{ $all_sites['all'][$key]['sites']['blog_id'][$loop->index] }}" --}}
            ><span class="country-choice-select__country">{{ $key }}</span> - <span class="country-choice-select__lang">{{ $language['label'] }}</span></a>
          </li>
        @endforeach
      @endforeach
  </ul>
</div>
