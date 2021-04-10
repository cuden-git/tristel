<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FourZeroFour extends Controller
{
   use Partials\Flexible;
   use Layouts\Footer;
   use Components\Social;
   use Components\Newsletter;
   
   protected $template = '404';
}
