<style type="text/css">
  
    #tbl-queued-patient tbody tr {
    cursor: pointer;
   }

   #tbl-queued-patient tbody tr:hover {
    background-color: #337ab7;
    color: #FFF;
   }

   .clicked {
    background-color: #337ab7;
    color: #FFF;
   }


</style>

<div class="box box-solid">

  <div class="box-header with-border text-center">
    <h3 class="box-title"><i class="fa fa-th-list"></i> Patients on Queue</h3>
    <div class="pull-right box-tools">
      <span id="patient-data-count" class="label bg-red"></span>
    </div>
  </div>

  <div class="box-body">
    
    <div class="row">
      
      <div class="col-sm-12">
        <table id="tbl-queued-patient" class="table table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
            </tr>
          </thead>
        </table>
      </div>

    </div>

  </div>
  <!-- /.box-body -->
</div>