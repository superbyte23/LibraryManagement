<?php include '../bootstrapper.php'; if (isset($_SESSION['userid'])){ header("Location: ./views/dashboard.php"); } ?>
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
    <style type="text/css">
    .input-password{ 
      -webkit-text-security: disc;
    }
    .bg-login{
      background-image: url('<?php echo ASSETS ?>/static/img/bg.png'); 
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    #logon > canvas{
      width: 50%;
    }
    </style> 
  </head>
</head>
<body class="overflow-hidden d-flex flex-column ">
  <div class="page page-center bg-dark text-dark">
      <div class="container-tight py-4">
        <form class="card card-md" style="background: rgb(255 255 255 / 90%);" action="<?php echo URLROOT.'/app/controller/usercontroller.php?action=login'; ?>" method="post" autocomplete="off">
          <div class="card-body">
            <div class="mb-3 text-center">
              <div id="logon"></div>
            </div>
            <div class="d-flex justify-content-center">
              <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?php echo URLROOT; ?>/public/static/book_dark.png" class="img-fluid" alt="logo" /></a> 
            </div>
            <!-- <h1 class="text-center text-uppercase"><?php echo APPNAME ?></h1> -->
            <h2 class="text-center mb-4">Login your account</h2>
            <?php if (isset($_SESSION['success_register'])): ?>
              <div class="toast align-items-center show bg-success mb-3 border-0 w-100">
                <div class="d-flex">
                  <div class="toast-body">
                    <?php echo $_SESSION['success_register']; ?>
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>  
            <?php unset($_SESSION['success_register']); ?>
            <?php endif ?> 

            <?php if (isset($_SESSION['error_login'])): ?>
              <div class="toast align-items-center show bg-danger mb-3 border-0 w-100">
                <div class="d-flex">
                  <div class="toast-body">
                    Invalid Username and Password
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>  
            <?php unset($_SESSION['error_login']); ?>

            <?php endif ?> 
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" placeholder="Enter username" name="username" autocomplete="off">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control input-password"  placeholder="Password"  autocomplete="off" name="password" autocomplete="off">
              </div>
            </div>
            <div class="form-footer mb-3">
              <button type="submit" class="btn btn-primary w-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M20 12h-13l3 -3m0 6l-3 -3"></path></svg>Login</button>
            </div>
            <div class="text-center text-muted mt-3">
              Don't have account yet? <a href="./register.php" tabindex="-1">Sign up</a>
            </div> 
          </div>
        </form>
      </div>
    </div>
  <div class="toast-container position-fixed top-20 start-30 p-3">
    <div id="liveToast" class="toast bg-danger " role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Alert</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Invalid Username or Password
      </div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->

  <script src="<?php echo URLROOT; ?>/public/dist/js/tabler.min.js"></script>
  <script src="<?php echo URLROOT; ?>/public/dist/js/demo.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
  <script> 
    function generate_qrcode(text, el) {
      const qrCode = new QRious({
        value: text,
        size: 120
      });
      const qrCanvas = document.createElement('canvas');
      qrCanvas.width = 120;
      qrCanvas.height = 120;
      qrCanvas.getContext('2d').drawImage(qrCode.canvas, 0, 0);
      el.appendChild(qrCanvas);
    }
  </script>
  <script type="text/javascript">
    // generate logon qr link
    generate_qrcode('<?php echo SERVERADDRESS ?>', document.getElementById('logon'));
    const toastLiveExample = document.getElementById('liveToast');
    const toast = new bootstrap.Toast(toastLiveExample);  
    
      // toast.show();
   
   
    // $.confirm({
    //   icon: 'fa-regular fa-thumbs-up',
    //   theme: 'modern',
    //   closeIcon: true,
    //   closeIconClass: 'fa fa-close',
    //   animation: 'scale',
    //   closeAnimation: 'zoom',
    //   animationSpeed: 200, // 0.2 seconds
    //   type: 'green',
    //   title: 'Hi!',
    //   content: 'modern',
    //   buttons: {
    //     tryAgain: {
    //       text: 'Close',
    //       btnClass: 'btn-green',
    //       action: function(){
    //         const toastLiveExample = document.getElementById('liveToast')
    //          const toast = new bootstrap.Toast(toastLiveExample)
    //     toast.show()
    //       }
    //     } 
    //   }
    // });
  </script>
</body>
</html>