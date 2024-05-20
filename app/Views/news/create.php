<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
     <div class="container-fluid">
          <h1><?= esc($title) ?></h1>
     </div> <!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="content">
<div class="card col-md-6">
<div class="card-body">
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
  <div class="form-group col-md-12">
     <label for="title" class="card-title">Title</label>
     <input class="form-control" type="text" id="title" value="<?= set_value('title') ?>">
     <br> 
  </div>
  <div class="form-group col-md-12">
     <label for="newsDetail" class="card-title">Text</label>
     <textarea id="newsDetail" cols="45" rows="4" class="form-control"><?= set_value('body') ?></textarea>
     <br>
  </div>
  <div class="form-group col-md-2">
     <input type="submit" name="submit" value="Create news item" class="btn btn-primary">
  </div>
</form>
</div> <!-- End card -->
</div> <!-- End card body -->
</div>
<!-- End main content -->
</div> <!-- End content wrapper -->