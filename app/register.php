<?php
  include '../bootstrapper.php'; 
  if (isset($_SESSION['userid'])){
    header("Location: ./views/dashboard.php");
  } 
  $this_controller = "student_controller.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo SITENAME; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT; ?>/public/static/favicon.ico">
    <!-- CSS files -->
    <link href="<?php echo URLROOT; ?>/public/dist/css/tabler.min.css" rel="stylesheet"/> 
    <link href="<?php echo URLROOT; ?>/public/dist/css/demo.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/public/dist/css/font.css" rel="stylesheet"> 
    <!-- fontawesome -->
    <link href="<?php echo URLROOT; ?>/public/dist/libs/feather-icons-web/feather.css" rel="stylesheet"/>
    <!-- jquery --> 
    <script src="<?php echo URLROOT; ?>/public/dist/libs/jquery/js/jquery-3.6.1.min.js"></script>
    <!-- confirm js -->
    <link href="<?php echo URLROOT; ?>/public/dist/libs/confirm/css/jquery-confirm.min.css" rel="stylesheet">
    <script src="<?php echo URLROOT; ?>/public/dist/libs/confirm/js/jquery-confirm.min.js"></script>
    
    <link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/public/static/favico-16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/public/static/favico-48.png" sizes="48x48">
  </head>
</head>
<body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container py-4"> 
        <div class="card card-md">
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?php echo URLROOT; ?>/public/static/book_dark.png" class="img-fluid" alt="logo" /></a> 
            </div>
            <h2 class="text-center mb-4">Create an account</h2>
        <form method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=register'; ?>">
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
          <button type="submit" id="btn_submit" class="float-right btn btn-primary w-100">Register</button>
        </form>
      </div>
        </div>
        <!-- <form class="card card-md"action="<?php echo URLROOT.'/app/controller/usercontroller.php?action=register'; ?>" method="post">
        <?php csrf(); ?>
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Create new account</h2>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Full name" name="fullname">
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"> 
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Retype Password</label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" placeholder="Retype password" name="password2" autocomplete="off">
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"> 
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-check">
              <input type="checkbox" class="form-check-input">
              <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Create new account</button>
          </div>
        </div> 
      </form>   -->
        <div class="text-center text-muted mt-3">
          Already have account?  <a href="./login.php" tabindex="-1">Login</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?php echo URLROOT; ?>/public/dist/js/tabler.min.js"></script>
    <script src="<?php echo URLROOT; ?>/public/dist/js/demo.min.js"></script>

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
  </body>
</html>
