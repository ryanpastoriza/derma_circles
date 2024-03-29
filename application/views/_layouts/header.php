<?php  
date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $title; ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/fullcalendar/dist/fullcalendar.print.min.css" media="print">
   <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/adminlte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/adminlte/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/jquery-ui-1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins'); ?>/x-editable/bootstrap-editable.css">

  <!-- Custom css -->
 <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/plugins'); ?>/jquery/jquery.min.js"></script>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/plugins'); ?>/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <!-- <script src="<?php echo base_url('assets/plugins'); ?>/jquery-ui/jquery-ui.min.js"></script> -->
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 <!-- top bar -->
<?php $this->load->view('_layouts/topbar'); ?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<?php $this->load->view('_layouts/sidebar'); ?>

<!-- =============================================== -->

