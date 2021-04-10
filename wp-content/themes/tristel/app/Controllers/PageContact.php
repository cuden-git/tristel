<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageContact extends Controller
{
  use Partials\Flexible;
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function ContactForm() {
    $data = [];
    $data['intro'] = get_field('form_intro'); 
    $data['form'] = do_shortcode(get_field('form_shortcode'));
    $data['footer'] = get_field('form_footer');

    return $data;
  }

  public function ContactContent() {
    $data = [];
    $data = get_field('contact_main_content');

    return $data;   
  }
}
