<?php $user = new User($db); $user->getUser($_SESSION['userid']) ?>

<header class="navbar navbar-expand-md navbar-light d-print-none">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
      <a href="" class="d-flex align-items-center gap-2">
        <img src="<?php echo ASSETS ?>/static/favico.png" width="40" height="40" alt="Tabler" class="">
        <span id="appname" class="d-none d-md-inline-block h2 mb-0 text-reset "><?php echo APPNAME ?></span>
      </a>
    </h1>
    <div class="navbar-nav flex-row order-md-last">
      <div class="d-none d-md-flex">
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M7 12h14l-3 -3m0 6l3 -3"></path></svg></span>
          <div class="d-none d-md-block ps-2">
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
      <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT ?>" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</header>