  <ul class="resources__list resources__list--"files">
    <?php foreach($downloads as $file) { ?>
    <li>
      <a href="<?= $file['file']['url'] ?>" target="_blank" title="<?= $file['title'] ?>"><?= $file['title'] ?><span class="resources__list-info"><?= $file['file']['subtype'].' '.readable_bytes($file['file']['filesize']) ?></span><i class="fas fa-download"></i></a>
    </li>
    <?php } ?>
  </ul>
