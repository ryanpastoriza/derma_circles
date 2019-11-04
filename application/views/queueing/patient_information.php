 <div class="row">
  <div class="col-sm-12 spacer-sm">
      <div class="col-sm-3 form-group">
          <label for="">Last Name*:</label>
          <input type="text" class="form-control" id="patient-lastname"  name="lastname" required>
      </div>
      <div class="col-sm-3 form-group">
        <label for="">First Name*:</label>
        <input type="text" class="form-control" id="patient-firstname" name="firstname" required>
      </div>
      <div class="col-sm-3 form-group">
          <label for="">Middle Name*:</label>
         <input type="text" class="form-control" id="patient-middlename" name="middlename" required>
      </div>
      <div class="col-sm-3 form-group">
         <label for="">Suffix:</label>
         <input type="text" class="form-control" id="patient-suffix" name="suffix">
      </div>
  </div>

  <div class="col-sm-9">
    <div class="col-sm-5 form-group">
      <label for="">Birthdate*:</label>
      <input type="date" class="form-control" id="patient-birthdate" name="birthdate" required>
    </div>
    <div class="col-sm-3 form-group">
      <label for="">Age:</label>
      <input type="text" class="form-control" id="patient-age" disabled>
    </div>
    <div class="col-sm-4 form-group">
      <label for="">Gender:</label>
      <select class="form-control" id="patient-gender" name="gender">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
     <div class="col-sm-4 form-group">
      <label for="">Height:</label>
      <input type="text" class="form-control" id="patient-height" name="height">
    </div>
     <div class="col-sm-4 form-group">
      <label for="">Weight:</label>
      <input type="text" class="form-control" id="patient-weight" name="weight">
    </div>
     <div class="col-sm-4 form-group">
      <label for="">Blood Type:</label>
      <select class="form-control" id="patient-blood-type" name="blood_type">
        <option value="">Select Blood Type</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="AB">AB</option>
        <option value="O">O</option>
      </select>
      <!-- <input type="text" class="form-control" id="patient-blood-type" > -->
    </div>

    <div class="col-sm-4 form-group">
      <label for="">Civil Status:</label>
      <select class="form-control" id="patient-civil-status" name="civil_status">
        <option value="">Select Civil Status</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="separated">Separated</option>
        <option value="divorced">Divorced</option>
        <option value="single">Single</option>
      </select>
    </div>
    <div class="col-sm-4 form-group">
       <label for="">Email:</label>
       <input type="email" id="patient-email" class="form-control" name="email_address">
    </div>
    <div class="col-sm-4 form-group">
       <label for="">Citizenship:</label>
       <input type="text" id="patient-citizenship" class="form-control" name="citizenship">
    </div>
    <div class="col-sm-4 form-group">
       <label for="">Contact No*:</label>
       <input type="text" class="form-control" id="patient-contact-number" name="contact_number" required>
    </div>

    <div class="col-sm-8 form-group">
        <label for="">Address:</label>
        <textarea class="form-control" id="patient-address" name="address" rows="1" style="resize: none;"></textarea>
    </div>
  </div>

  <div class="col-sm-3 col-md-3 text-center">
    <div class="col-sm-12">
      <img src="<?php echo base_url().'assets' ?>/img/avatar.png" id="patient-photo" class="img-thumbnail" style="width: 150px;">
    </div>
    <div class="col-sm-3 col-md-12">
      <button id="btn-take-photo" disabled class="btn btn-sm btn-default spacer-sm">Take Photo</button>
    </div>
    <div class="col-sm-12 text-center spacer-sm">
      <div class="col-sm-12">
        <label>Patient Number</label> 
      </div>
      <div class="col-sm-12">
        <span id="patient-patient-number" class="label bg-blue">000</span>
        <input type="hidden" id="patient-number-input" name="patient_id">
      </div>
    </div>
  </div>

  <div class="col-sm-12">
    
    <a class="btn btn-app" id="btn-clear">
      <i class="fa fa-times text-danger"></i> Clear
    </a>

    <a class="btn btn-app" id="btn-done">
      <i class="fa fa-check text-green"></i> Done
    </a>

  </div>

</div>