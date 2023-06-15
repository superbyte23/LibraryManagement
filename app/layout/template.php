<!doctype html> 
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
  <body class="theme-light"> 
    <div class="page">
      <div class="drawing position-fixed d-none" style="z-index: 1;" id="loading">
        <div class="loading-dot"></div>
      </div>
      <?php //require_once APPROOT.'/layout/header-condensed.php'; ?>
      <?php require_once APPROOT.'/layout/admin-sidebar.php'; ?>  
      <?php require_once APPROOT.'/layout/header.php'; ?>

      <div class="page-wrapper">
        <!-- <div class="container-xl"> -->
          <?php if (!file_exists($content)): ?>
            <?php $content = "../404.php"; ?>
          <?php endif ?>
          <?php require_once $content; ?>
        <?php require_once APPROOT.'/layout/footer.php'; ?>
        <!-- </div> -->
      </div>
    </div>
    
    <div class="toast-container position-fixed top-0 end-0">
      <div id="toast_success" class="toast bg-green " data-bs-delay="2000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Success!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast_message">
         <?php echo (isset($_SESSION['msg_success'])) ? $_SESSION['msg_success'] : ""; ?>
        </div>
      </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0">
      <div id="toast_error" class="toast bg-danger " data-bs-delay="2000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"> 
          <strong class="me-auto">Alert</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast_message">
          Invalid Username or Password
        </div>
      </div>
    </div>
    
    <!-- Libs JS -->
    <!-- <script src="<?php echo URLROOT; ?>/public/dist/libs/apexcharts/dist/apexcharts.min.js"></script> -->
    <!-- <script src="<?php echo URLROOT; ?>/public/dist/libs/jsvectormap/dist/js/jsvectormap.min.js"></script> -->
    <!-- <script src="<?php echo URLROOT; ?>/public/dist/libs/jsvectormap/dist/maps/world.js"></script> -->
    <!-- Tabler Core -->
    <script src="<?php echo URLROOT; ?>/public/dist/js/tabler.min.js"></script>
    <script src="<?php echo URLROOT; ?>/public/dist/js/demo.min.js"></script>

    <!-- Jquery -->

    
    <script type="text/javascript">
    
      function showMessage(msg='Demo', msgtheme='green', msgtype='Success!'){
        event.preventDefault();
        $.confirm({ 
            theme: 'material', 
            animation: 'zoom',
            closeAnimation: 'zoom',
            animationSpeed: 300,
            // type: msgtheme,
            title: false,
            content: `<p class="mb-0">${msg}</p>`,
            buttons: {
              tryAgain: {
                text: 'Close',
                btnClass: 'btn-'+msgtheme,
                action: function(){
                  
                }
              } 
            }, 
        });
      }

      function find_trans_alert(msg='Demo', msgtheme='green', msgtype='Success!', redirect=null){ 
        $.confirm({ 
            theme: 'material', 
            animation: 'zoom',
            closeAnimation: 'zoom',
            animationSpeed: 300,
            type: msgtheme,
            title: false,
            content: `<p class="mb-0">${msg}</p>`,
            buttons: {
              tryAgain: {
                text: 'Proceed',
                btnClass: 'btn-'+msgtheme,
                action: function(){
                  if (redirect != null) {
                    window.location = redirect;
                  }
                }
              } 
            }, 
        });
      }



      function popQr(msg='Demo', msgtheme='green', msgtype='Success!'){
        event.preventDefault();
        $.confirm({ 
            theme: 'modern', 
            animation: 'zoom',
            closeAnimation: 'zoom',
            animationSpeed: 300,
            // type: msgtheme,
            title: false,
            content: ` 
            ${msg}
            <div class="mb-3"></div>
            <p class="mb-0 text-black">Kindly Take a picture of your transaction code</p>`,
            buttons: {
              tryAgain: {
                text: 'Close',
                btnClass: 'btn-'+msgtheme,
                action: function(){
                  // location.reload();
                }
              } 
            }, 
        });
      }

      function showConfirm(msg='Demo', msgtheme='green', msgtype='Success!'){
        event.preventDefault();
        let frm = event.target; 
        $.confirm({ 
            theme: 'material', 
            animation: 'zoom',
            closeAnimation: 'zoom',
            animationSpeed: 300,
            // type: msgtheme,
            title: false,
            content: `<p class="mb-0">${msg}</p>`,
            buttons: {
              formSubmit: {
                text: 'Proceed',
                btnClass: 'btn-red',
                action: function() {
                  frm.submit(); 
                }
              },
              cancel: function() {
                //close
              },
            }, 
        });
      } 

      const toast_error = document.getElementById('toast_error');
      const toasterror = new bootstrap.Toast(toast_error);

      const toast_success = document.getElementById('toast_success');
      const toastsuccess = new bootstrap.Toast(toast_success); 
      
      function toastsuccess_function(msg_type, message) {
        console.log(message) 
        $('#toast_message').html(message);
          toastsuccess.show();
          // location.reload(); 
        }

      <?php if (isset($_SESSION['error_login'])): ?>
        toasterror.show();
      <?php unset($_SESSION['error_login']); ?>
      <?php endif ?>

      <?php if (isset($_SESSION['msg_success'])): ?>
        toastsuccess.show();
      <?php unset($_SESSION['msg_success']); ?>
      <?php endif ?>

      // simple confirm message
      function handleClick(event) { 
        showMessage();
      } 

    </script> 
  </body>
</html>