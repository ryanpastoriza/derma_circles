<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Derma Circles - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/plugins/adminlte/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/plugins/iCheck/square/blue.css">
   <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets' ?>/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style type="text/css">
    
    .login-page{
      background-color: #fff;
    }

  </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url('assets'); ?>/img/logo.jpg" style="width: 200px;">
    <!-- <a href="../../index2.html" style="font-family: sans-serif; font-weight: bold;">Derma Circles</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    <div class="alert alert-danger alert-dismissible hidden">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-warning"></i> Invalid User Credentials!
      <!-- Warning alert preview. This alert is dismissable. -->
    </div>
    <?= form_open(base_url().'login/user_login', [ 'id' => 'frm-login' ]); ?>
    <!-- <form> -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control bottom-bordered-textfield" placeholder="Username" name="username" required>
        <i class="fa fa-user form-control-feedback base-color-blue"></i>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control bottom-bordered-textfield" placeholder="Password" name="password" required>
       <i class="fa fa-lock form-control-feedback base-color-blue"></i>
      </div>
      <div class="form-group">
        <select class="form-control" required name="branch_id">
          <option value="" disabled selected>Select Clinic</option>
          <?php foreach($branches as $key => $value) :?>
          <option value="<?= $value->branch_id; ?>"><?= ucwords($value->branch_name); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <!-- col-xs-offset-8 -->
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>
  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets' ?>/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets' ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'assets' ?>/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    // $('input').iCheck({
    //   checkboxClass: 'icheckbox_square-blue',
    //   radioClass: 'iradio_square-blue',
    //   increaseArea: '20%' /* optional */
    // });


    $(document).on('submit', '#frm-login', function(event){
      event.preventDefault();

      var form = $(this);
      var url = form.attr('action');

      var posting = $.post( url, form.serializeArray() );
      posting.done(function( response ){

        // console.log(response);
        if( response > 0 ){
          window.location.href = '<?php echo base_url(); ?>dashboard';
        }else{
          $('.alert').removeClass('hidden');
        }
       

      });


    });



  });
</script>
</body>
</html>
