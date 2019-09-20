 <style type="text/css">
   
   div.dataTables_wrapper div.dataTables_filter{
    text-align: left;
   }

   #tbl-patient-list tbody tr {
    cursor: pointer;
   }

   #tbl-patient-list tbody tr:hover {
    background-color: #337ab7;
    color: #FFF;
   }

   .clicked {
      background-color: #337ab7;
      color: #FFF;
   }

 </style>

<div class="box box-primary">

  <div class="box-header with-border">
    <h3 class="box-title">Patient List</h3>
    <div class="pull-right box-tools">
      <span id="patient-data-count" class="label bg-red"></span>
    </div>
  </div>

  <div class="box-body">
    
    <div class="row">
      
      <div class="col-sm-12">
        <table id="tbl-patient-list" class="table table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>Name</th>
              <th>Patient Number</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Suffix</th>
              <th>Birthdate</th>
              <th>Gender</th>
              <th>Height</th>
              <th>Weight</th>
              <th>Blood Type</th>
              <th>Civil Status</th>
              <th>Email Address</th>
              <th>Citizenship</th>
              <th>Contact Number</th>
              <th>Address</th>
            </tr>
          </thead>
        </table>
      </div>

    </div>

  </div>
  <!-- /.box-body -->
</div>