<h2><?= esc($title) ?></h2>

<!-- 1. Used to get session object 
     2. getFlashdata('error'): Used to display error related to
        csrf protection -->
<?= session()->getFlashdata('error') ?>

<!-- Used to report error related with form validation -->
<?= validation_list_errors() ?>

<form action="/news" method="post">

  <!-- 1. Create hidden input with csrf token
       2. Protect against common attacks -->
  <?= csrf_field() ?>

  <label for="title">Title</label>
  <input type="input" name="title" value="<?= set_value('title') ?>">
  <br>

  <label for="body">Text</label>
  <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
  <br>

  <input type="submit" name="submit" value="Create news item">
</form>