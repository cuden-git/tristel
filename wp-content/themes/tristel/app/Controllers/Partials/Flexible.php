<?php
namespace App\Controllers\Partials;

trait Flexible {

  private $layouts;
  private $layout_indexes;
  private $page_layouts;

  public function __construct() {
   // $this->layouts = get_field('layout_modules');
    $this->page_layouts = [];
    $this->SetupLayouts();
  }

  private function PageHeaders($layout_data) {

    return $layout_data;
  }

  private function EditorContent($layout_data) {

    $layout_count = 0;
    $data = [];
    $data['editor'] = $layout_data['editor'];
    $data['width'] = $layout_data['column_width'];

    return $data;
  }

  private function HeroSlides($layout_data) {

    return $layout_data['slides'];
  }

  private function ArticleSlides($layout_data) {

      $data = [];
      $data['title'] = $layout_data['title'];
      $data['hero_title'] = $layout_data['hero_title'];
      $data['btn'] = $layout_data['button'];

      foreach($layout_data['slides'] as $post) {
        $data['slides'][] = $post;
      }

      return $data;
  }

  private function ProductSlides($layout_data) {

    $data = [];
    $data['title'] = $layout_data['slider_title'];
    $data['hero_title'] = $layout_data['hero_title'];
    $data['btn'] = $layout_data['button'];
    $data['slides'] = [];
    $count = 0;

    foreach($layout_data['slides'] as $cat_id) {
      $data['slides'][$count] = [];
      $term_object = get_term_by( 'id', $cat_id, 'product_cat' );
      $thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true ); 
      $data['slides'][$count]['url'] = wp_get_attachment_url( $thumbnail_id );
      $data['slides'][$count]['name'] = $term_object->name;

      ++$count;
    }

    return $data;
  }

  private function ImgTextBlocks($layout_data) {

    $data = [];
    $data['title'] = $layout_data['title'];
    $data['hero_title'] = $layout_data['hero_title'];
    $data['text'] = $layout_data['text'];
    $data['img'] = $layout_data['image'];
    $data['btn'] = $layout_data['button'];

    return $data;
  }

  private function ImgTextBlocksFw($layout_data) {

      $data = [];
      $data['hero_title'] = $layout_data['hero_title'];
      $data['img'] = $layout_data['image'];

      return $data;
  }

  private function HeroSection($layout_data) {
  
    return $layout_data;
  }

  private function StandardCarousel($layout_data) {
    return $layout_data['slider'];
  }

  private function TeamCarousel($layout_data) {
    
    $data = [];
    $data['sub_title'] = $layout_data['sub_title'];
    $data['hero_title'] = $layout_data['hero_title'];
    $data['btn'] = $layout_data['button'];
    $data['slides'] = [];
    $count = 0;

    foreach($layout_data['slides'] as $slide) {
      $data['slides'][$count]['id'] = $slide->ID;
      $data['slides'][$count]['title'] = $slide->post_title;
      $data['slides'][$count]['position'] = get_field('team_position',$slide->ID);
      $data['slides'][$count]['url'] = get_permalink($slide->ID);

      ++$count;
    }

    return $data;
  }

  private function LocationMap($layout_data) {

    return $layout_data['map'];
  }

  private function GridPanels($layout_data) {

    return $layout_data['cells'];
  }

  private function TeamGrid($layout_data) {

      $data = [];
      $count = 0;

      foreach($layout_data['team_members'] as $member) {
        $data[$count]['id'] = $member->ID;
        $data[$count]['title'] = $member->post_title;
        $data[$count]['link'] = get_permalink($member->ID);
        $data[$count]['position'] = get_field('team_position',$member->ID);
        ++$count;
      }

      return $data;
  }

  private function SetupLayouts() {

    if($this->layouts) {
      foreach($this->layouts as $layout) {
        switch ($layout['acf_fc_layout']) {
          case 'page_headers':
            
            array_push($this->page_layouts, $this->PageHeaders($layout));
            break;
          case 'wysiwyg_editor':

            array_push($this->page_layouts, $this->EditorContent($layout));
            break;
          case 'hero_slider':

            array_push($this->page_layouts, $this->HeroSlides($layout));
            break;

          case 'articles_slider':

            array_push($this->page_layouts, $this->ArticleSlides($layout));
            break;

          case 'products_slider':

            array_push($this->page_layouts, $this->ProductSlides($layout));
            break;

          case 'text_img_blocks':

            array_push($this->page_layouts, $this->ImgTextBlocks($layout));
            break;

          case 'text_img_blocks_fw':

            array_push($this->page_layouts, $this->ImgTextBlocksFw($layout));
            break;

          case 'hero_section':

            array_push($this->page_layouts, $this->HeroSection($layout));
            break;

          case 'standard_slider':

            array_push($this->page_layouts, $this->StandardCarousel($layout));
            break;

          case 'team_carousel':

            array_push($this->page_layouts, $this->TeamCarousel($layout));
            break;

          case 'location_map':

            array_push($this->page_layouts,$this->LocationMap($layout));
            break;

          case 'grid_panels':

            array_push($this->page_layouts, $this->GridPanels($layout));
            break;

          case 'team_grid':

            array_push($this->page_layouts, $this->TeamGrid($layout));
            break;
        }
      }
    }
  }

  public function PageLayouts() {
    return $this->page_layouts;
  }
}
