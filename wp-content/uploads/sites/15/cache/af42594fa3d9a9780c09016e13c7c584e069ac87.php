<div class="container contact-us">
  <div class="row">
    <div class="col-12 col-md-6 contact-us__content">
        <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $contact_content['content']; ?>

    </div>
    <div class="col-12 col-md-6 contact-us__form">
      <h3 class="contact-us__form-title"><?php echo e($contact_form['intro']['intro_title']); ?></h3>
      <?php echo $contact_form['intro']['intro_text']; ?>

      <?php echo $contact_form['form']; ?>

    </div>
    <footer class="col-12 col-md-6 offset-md-6 contact-us__footer">
      <?php echo $contact_form['footer']; ?>

    </footer>
  </div>
</div>
