<?php
namespace App\Controllers\Components;

trait Newsletter {
  public function SignupCta() {
    $fields = get_field('newsletter_module', 'option');

    return $fields;
  }

  public function SignupModal() {
    $fields = get_field('newsletter_modal', 'option');

    return $fields;
  }
}
