<?php
  $email = get_field('contact_email','option');
  if($email) { ?>
    <a href="mailto: <?= $email ?>"><?= $email ?></a>
<?php }
