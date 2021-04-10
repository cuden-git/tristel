<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateTriology extends Controller
{
  use Partials\Flexible;
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;
  use PostGrid;

  public function __construct() {
    $this->post_type = 'tristel-science';
  }
}
