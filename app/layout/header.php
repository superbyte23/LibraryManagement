<?php
  
  if (!isset($_SESSION['userid'])) {
    header('location: '.URLROOT.'/app/login.php');
  }else{
    $user->getUser($_SESSION['userid']); 
  }
?>
<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
  <div class="container">
    <button aria-label="nav-button" title="Navigation button"  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">  
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row order-md-last">
      <div class="d-none d-md-flex">
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm bg-transtarent" style="background-image: url('<?php echo URLROOT; ?>/public/static/avatar.png')"></span>
          <div class="d-none d-xl-block ps-2">
            <div><?php echo ucwords($user->getUser($_SESSION['userid'])->fullname) ?></div>
            <div class="mt-1 small text-muted"><?php echo ucwords($user->getUser($_SESSION['userid'])->usertype) ?></div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"> 
          <a href="<?php echo URLROOT.'/app/controller/usercontroller.php?action=logout'; ?>" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div>
        <form action="./" method="get" autocomplete="off" novalidate="">
          <div class="input-icon">
            <span class="input-icon-addon">
              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
            </span>
            <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
          </div>
        </form>
      </div>
    </div>
  </div>
</header>