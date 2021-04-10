<div class="team-members">
  <?php
  $team_members = get_field('team_member_posts'); ?>
  <div class="row">
<?php
  foreach($team_members as $member) {
    $team_position = get_field('team_position', $member->ID);    
?>
    <div class="col-12 col-md-3 team-members__member">
      <div class="team-members__member-img">
        <?= get_the_post_thumbnail($member->ID) ?>
      </div>
      <h5 class="team-members__member-title"><?= $member->post_title ?></h5>
      <h6 class="team-members__member-subtitle"><?= $team_position ?></h6>
    </div>
  <?php 
  } ?>
  </div>
</div>
