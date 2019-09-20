<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      
  <div class="row">
      
      <div class="col-sm-3">
        
        <div class="col-sm-12">
          <button class="btn btn-block btn-primary btn-sm">Add Patient to Queue</button>
        </div>

        <div class="col-sm-12 spacer-sm">
            <?php $this->load->view('queueing/patient_queue'); ?>
        </div>

      </div>

  </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">

  $(function(){


      var oTable = $('#tbl-queued-patient').DataTable({

        

      });

  });
  


</script>
