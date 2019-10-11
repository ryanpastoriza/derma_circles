<!DOCTYPE html>
<html>
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
</head>

<style type="text/css">
	
	#print {
		margin: 0 auto;
		border: 1px solid #000;
		padding: 96px;
		font-family: arial;
		font-size: 12px;
	}

	.heading {
		text-align: center;
	}

	.heading span {
		display: block;
	}

	.title {
		text-align: center;
		font-family: arial;
		font-weight: bold;
		font-size: 3em;
		margin: 50px;
	}

	.date {
		text-align: right;
	}

	.salutation {
		font-weight: bold;
		margin-top: 20px;
	}

	.body {
		word-wrap: break-word;
	}

	.body p.indent {
		text-indent: 70px;
	}
	
	.remarks {
		margin-top: 100px;
		text-align: right;
	}

	/*@media print {
	    .no-print {
	        display: none;
	    }
	}*/

</style>
<body>
	
	<?php
		// echo '<pre>';
		// var_export($_SESSION);
		// echo '</pre>';

	?>


	<div id="print">
		
		<div class="heading">
			<span>Republic of the Philippines</span>
			<span>Province of Agusan Del Norte</span>
			<span>Derma Circles</span>
			<span>Butuan City</span>
		</div>
		<div class="title">Medical Certificate</div>
		<div class="date"><?= date('F d, Y'); ?></div>
		<div class="salutation">To Whom It May Concern: </div>
		<div class="body">
			<p class="indent">THIS IS TO CERTIFY that 
				<span style="font-weight: bold;"><?php echo $_SESSION['patient']; ?> 
				</span> 
				of
				<span style="font-weight: bold;"><?php echo $_SESSION['address']; ?> 
				</span> 
			</p>
			<p>Was examined and treated at the 
				<span>
					<input type="text" style="border: none; border-bottom: 1px solid #000;" />
				</span> 
				on 
				<span>
					<input type="text" style="border: none; border-bottom: 1px solid #000;" />
				</span>
				.<?php echo date('Y'); ?> with the following diagnosis: </p>
			<p><input type="text" style="width: 100%; border: none; border-bottom: 1px solid #000;" /></p>
			<p><input type="text" style="width: 100%; border: none; border-bottom: 1px solid #000;" /></p>
			<p><input type="text" style="width: 100%; border: none; border-bottom: 1px solid #000;" /></p>

			<p> And would need medical attention for _______________________________________ days barring complication </p>

		</div>
		<div class="remarks">
			<input type="text" name="" style="border: none; border-bottom: 1px solid #000;">
			<span class="help-block">Attending Physician</span>
		</div>
		
	
	</div>


</body>
</html>
