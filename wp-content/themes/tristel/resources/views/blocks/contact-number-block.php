<?php
  $tel_number = get_field('contact_tel','option');
  if($tel_number) { ?>
    <a href="tel: <?= $tel_number ?>"><?= $tel_number ?></a>
<?php }
