<div class="container">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
        <?php echo $pagetitle ? $pagetitle : 'SET TITLE'?>
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="<?php echo URLROOT ?>/app/views/students" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/students" class="btn d-sm-none btn-icon" aria-label="Create new report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M13 14l-4 -4l4 -4"></path>
               <path d="M8 14l-4 -4l4 -4"></path>
               <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New Student Form</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=add'; ?>">
          <?php csrf(); ?>
          <div class="row">
            <div class="form-group mb-3 col-lg-3">
              <label class="form-label">LRN No.</label>
              <input type="text" class="form-control" id="lrn_no" minlength="0" maxlength="12" name="lrn_no" placeholder="Enter LRN" required>
              <div id="lrn_feedback" class='invalid-feedback'>LRN already exist</div>
            </div>
            <div class="form-group mb-3 col-lg-3">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" placeholder="Enter first name..." required>
            </div>
            <div class="form-group mb-3 col-lg-3">
              <label class="form-label">Middle Name</label>
              <input type="text" class="form-control" name="middle_name" placeholder="Enter middle name..." required>
            </div>
            <div class="form-group mb-3 col-lg-3">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" placeholder="Enter last name..." required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-lg-4">
              <label class="form-label">Grade Level</label>
              <select name="grade_level" class="form-select" required>
                <!-- <option>Select Grade Level</option>  -->
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
            <div class="mb-3 col-lg-4">
              <label class="form-label">Strand</label>
              <select name="strand" class="form-select" required>
                <!-- <option>Select Strand</option> -->
                <option>HUMMS</option>
                <option>ABM</option>
                <option>SMAW</option>
                <option>STEM</option>
                <option>Cookery </option>
                <option>Comprog</option>
                <option>EIM</option>
                <option>Performing Arts </option>
                <option>Hairdressing</option>
                <option>Sports Science</option>
                <option>Agri-Fishery Arts</option>
              </select>
            </div>
            <div class="mb-3 col-lg-4">
              <label class="form-label">Section</label>
              <input type="text" class="form-control" name="section" placeholder="Enter section name..." required>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-3 col-lg-4">
              <label class="form-label">Mobile</label>
              <input type="number" class="form-control" name="mobile" placeholder="Enter mobile number..." required>
            </div>
            <div class="form-group mb-3 col-lg-4">
              <label class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" placeholder="Enter E-mail..." required>
            </div>
            <div class="mb-3 col-lg-4">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                <span class="input-group-text">
                  <a href="javascript:void(0)" id="showPassword" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
              </div>
            </div> 
          </div> 
          <button type="submit" id="btn_submit" class="float-right btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
      $(document).ready(function() {

        function containsNonNumeric(string) {
          return /\D/.test(string);
        }

        // toggle show password

        $('#showPassword').on('click', function() {
          var passwordInput = $('#password');
          
          if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
          } else {
            passwordInput.attr('type', 'password');
          }
        });



        $('#lrn_no').on('keyup', function(){

          let lrn = $(this);  
          if (lrn.val() != "") {
            if (containsNonNumeric(lrn.val())) {
              lrn.addClass('is-invalid'); 
              $("#lrn_feedback").text('Invalid LRN');
            }else{
              $.ajax({
                url: '<?php echo URLROOT.'/app/controller/ajax_controller.php?action=check_lrn'; ?>',
                type: 'POST',
                dataType: 'json',
                data: {lrn_no: lrn.val()}, 
              })
              .done(function(response) { 
                 if (response.length > 0) {
                    lrn.addClass('is-invalid');
                    $("#lrn_feedback").text('LRN already exist');
                    $('#btn_submit').prop('disabled', true);
                 }else{
                    lrn.removeClass('is-invalid'); 
                    $('#btn_submit').prop('disabled', false);
                    // lrn.addClass('is-valid');  
                 }
              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });
            } 
          }else{
            lrn.removeClass('is-invalid'); 
            $('#btn_submit').prop('disabled', false);
            // lrn.removeClass('is-valid'); 
          }
        })
      });  
    </script>