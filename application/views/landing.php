<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <?php
    if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
      }
    ?>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url();?>user/login" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email');?>" placeholder="Email Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger"><?php echo  form_error('user_email');?></span>

        <div class="input-group mb-3">
          <input type="password" name= "user_password" class="form-control" value="<?php echo set_value('user_password');?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger"><?php echo  form_error('user_password');?></span>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="<?php base_url();?>user/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
